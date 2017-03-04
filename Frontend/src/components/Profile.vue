<template>
    <div class="row">
        <h1>User Profile</h1>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">My Reservations</div>

            <!-- Table -->
            <table class="table">
                <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Hotel Name</th>
                    <th>Name of Reservation</th>
                    <td>Options</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="reservation in reservations">
                    <td>{{ reservation.id }}</td>
                    <td>{{ reservation.hotel_name }}</td>
                    <td>{{ reservation.name }}</td>
                    <td><button class="btn btn-danger" 
                        @click="cancelReservation(reservation.id)">Delete</button></td>
                    <td><button class="btn btn-success" 
                        @click="setId(reservation.id)"
                        >Edit</button></td>
                </tr>
             
                </tbody>
            </table>
        </div>

    <modal v-if="showModal" 
        @editDone="editDone" 
        :id="this.id"
        @cancelEdit="showModal = false">
        <div class="modal-header">
            <h3>
                Hello Vue.JS
            </h3>
        </div>
    </modal>
    </div>
</template>

<script>
    import swal from 'sweetalert'
    import ReservationModal from './apartman/ReservationModal.vue'

    export default {
        data () {
            return {
                reservations: [],
                showModal: false,
                currentId: ''
           }
        },
        computed: {
            id () {
                return this.currentId
            }
        },

        created() {
            console.log(this.$auth.getAuthenticatedUser().id)
            this.$http.get('api/reservation/' + this.$auth.getAuthenticatedUser().id)
                .then(res => {
                    this.reservations = res.body
                    console.log(res)
                })
        },

        methods: {
            cancelReservation (id) {
                swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this reservation!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){

                    this.$http.delete('api/cancel/' + id)
                        .then(res => {
                            let index = this.reservations.indexOf(id)

                            this.reservations.splice(index, 1)

                            swal("Deleted!", "Your reservation has been deleted.", "success");
                            console.log(res)
                        }, res => {
                            swal("Cancelled", res.body.error , "error");
                        })
                }.bind(this)
                );
            },

            editDone(id, data) {
                console.log(data)
                this.reservations[id-1].name = data.name 
                this.showModal = false
            },

            setId(id) {
                this.currentId = id
                this.showModal = true
            }

        },
        components: {
            modal: ReservationModal
        }
    }

</script>

<style>

</style>
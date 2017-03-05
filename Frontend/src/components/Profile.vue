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
                <tr v-for="(reservation, index) in reservations">
                    <td>{{ reservation.id }}</td>
                    <td>{{ reservation.hotel_name }}</td>
                    <td>{{ reservation.name }}</td>
                    <td><button class="btn btn-danger" 
                        @click="cancelReservation(index,reservation.id)">Delete</button></td>
                    <td><button class="btn btn-success" 
                        @click="setId(index,reservation.id)"
                        >Edit</button></td>
                </tr>
             
                </tbody>
            </table>
        </div>

        <div class="well" v-if="showToken">
            <div class="panel panel-default">
                <div class="panel-heading">Token</div>
                <div class="panel-body" id="token">
                    {{ token }}
                </div>
            </div>
        </div>
        <button class="btn btn-warning" @click="showToken = !showToken">Get Token</button>

    <modal v-if="showModal" 
        @editDone="editDone" 
        :id="this.id"
        :resId="resId"
        @cancelEdit="showModal = false">
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
                currentId: '',
                reservationId: '',
                token: '',
                showToken: false
           }
        },
        computed: {
            id () {
                return this.currentId
            },
            resId () {
                return this.reservationId
            }
        },

        mounted() {
            console.log(this.$auth.getAuthenticatedUser().id)
            this.$http.get('api/reservation/' + this.$auth.getAuthenticatedUser().id)
                .then(res => {
                    this.reservations = res.body
                    console.log(res)
                })
            this.token = localStorage.getItem('token')
        },

        methods: {
            cancelReservation (index,id) {
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
                            //let index = this.reservations.indexOf(id)
                            console.log(index)

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
                this.reservations[id].name = data.name 
                this.showModal = false
            },

            setId(id,resId) {
                this.currentId = id
                this.reservationId = resId
                this.showModal = true
            },
            

        },
        components: {
            modal: ReservationModal
        }
    }

</script>

<style>

#token {
    word-wrap: break-word;
}

</style>
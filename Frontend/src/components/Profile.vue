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
                    <td><button class="btn btn-danger" @click="cancelReservation(reservation.id)">Delete</button></td>
                    <td><button class="btn btn-success" @click="editReservation">Delete</button></td>
                </tr>
             
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert'

    export default {
        data () {
            return {
                reservations: []
           }
        },

        created() {
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
                        })
                }.bind(this)
                );
            },
            editReservation () {

            }
        }
    }

</script>

<style>

</style>
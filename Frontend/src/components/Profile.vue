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
                </tr>
                </thead>
                <tbody>
                <tr v-for="reservation in reservations">
                    <td>{{ reservation.id }}</td>
                    <td>{{ reservation.hotel_name }}</td>
                    <td>{{ reservation.name }}</td>
                </tr>
             
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

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
        }
    }

</script>

<style>

</style>
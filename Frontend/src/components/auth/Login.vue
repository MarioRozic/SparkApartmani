<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input type="email" v-model="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" v-model="password" class="form-control" placeholder="Password">
                    </div>
                    <button class="btn btn-success pull-right" @click="login">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    export default {
        data () {
            return {
                email: '',
                password: ''
            }
        },

        methods: {
            login () {
                var data = {
                    client_id: 2,
                    client_secret: 'EPzHAWEOGdAvdrE4biDvYgQ4csI3EKAbiK6kfJHU',
                    grant_type: 'password',
                    username: this.email,
                    password: this.password
                }


                this.$http.post('http://localhost:8000/oauth/token', data)
                    .then( res => {
                        console.log(res.body);
                    })
            }
        }
    }

</script>
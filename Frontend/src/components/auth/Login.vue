<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger" v-if="error">{{ error }}</div>
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
    import {ClientID, ClientSecret} from '../../.env.js'
    export default {
        data () {
            return {
                email: '',
                password: '',
                error: ''
            }
        },

        methods: {
            login () {
                var data = {
                    client_id: ClientID,
                    client_secret: ClientSecret,
                    grant_type: 'password',
                    username: this.email,
                    password: this.password
                }


                this.$http.post('oauth/token', data)
                    .then( res => {
                        console.log(res.body)
                        this.$auth.setToken(res.body.access_token, res.body.expires_in + Date.now())
                            this.$http.get('api/user')
                                .then(res => {
                                    this.$auth.setAuthenticatedUser(res.body)
                                    console.log(this.$auth.getAuthenticatedUser())
                                    this.$router.push("/profile")
                                })
                    }, res => {
                        this.error = res.body.message
                        console.log(res)
                    })
            }
        }
    }

</script>
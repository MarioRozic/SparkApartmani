<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger" role="alert" 
                    v-if="error">
                        {{ error }}
                </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" v-model="user.name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" v-model="user.email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" v-model="user.password" class="form-control" placeholder="Password">
                    </div>
                    <button class="btn btn-success pull-right"
                        v-show="user.name && user.email && user.password"
                        @click="register">Register</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                user: {
                    name: '',
                    email: '',
                    password: ''
                },
                error: ''
            }
        },
        methods: {
            register () {
                
                this.$http.post('api/register', this.user)
                    .then(res => {
                        console.log(res)
                        this.$router.push('/login')
                    }, res => {
                        this.error = res.body.error
                        console.log(res)
                    })
            }
        }
    }

</script>

<style>

</style>
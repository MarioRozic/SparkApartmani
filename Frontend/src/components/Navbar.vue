<template>
     <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <router-link tag="li" to="/login" v-if="!test"><a>Login</a></router-link>
            <router-link tag="li" to="/register" v-if="!test"><a>Register</a></router-link>

            <router-link tag="li" to="/profile" v-if="test"><a>User profile</a></router-link>
            <!--<router-link tag="li" v-if="test" @click="logout"><a>Logout</a></router-link>-->
            <li @click="logout"  v-if="test"><a>Logout</a></li>

          </ul>
        </nav>
        <!--<h3 class="text-muted"><router-link tag="h3" to="/"><a>Apartmani</a></router-link></h3>-->
        <router-link to="/"><h3 class="text-muted">Apartmani</h3></router-link>
      </div>
</template>

<script>

export default {
    data () {
      return {
          isAuth: null
      }
    },
    created () {
      this.isAuth = this.test
      this.setAuthenticatedUser()
    },

    computed: {
      test () {
        return this.$auth.isAuthenticated()
      }
    },

    methods: {
      setAuthenticatedUser () {
        this.$http.get('api/user')
          .then(res => {
            this.$auth.setAuthenticatedUser(res.body)
            console.log(this.$auth.getAuthenticatedUser())
          })
      },
      logout() {
        this.$auth.destroyToken()
        this.$router.push('/')
      }
    }


}

</script>

<style>

</style>
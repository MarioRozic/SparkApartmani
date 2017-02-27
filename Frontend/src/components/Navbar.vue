<template>
     <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <router-link tag="li" to="/login" v-if="!isAuth"><a>Login</a></router-link>
            <router-link tag="li" to="/register" v-if="!isAuth"><a>Register</a></router-link>

            <router-link tag="li" to="/profile" v-if="isAuth"><a>User profile</a></router-link>
            <router-link tag="li" to="/logout" v-if="isAuth"><a>Logout</a></router-link>

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
      this.isAuth = this.$auth.isAuthenticated()
    }


}

</script>

<style>

</style>
<template>
     <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <router-link tag="li" to="/login" v-if="!auth"><a>Login</a></router-link>
            <router-link tag="li" to="/register" v-if="!auth"><a>Register</a></router-link>

            <router-link tag="li" to="/profile" v-if="auth"><a>User profile</a></router-link>
            <li @click="logout"  v-if="auth"><a>Logout</a></li>

          </ul>
        </nav>
        <router-link to="/"><h3 class="text-muted">Apartmani</h3></router-link>
      </div>
</template>

<script>

export default {
    props: ['auth'],
    methods: {
      logout() {
        this.$auth.destroyToken()
        this.$router.push('/login')
      }
    }


}

</script>

<style>

</style>
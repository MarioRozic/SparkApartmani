<template>
     <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <router-link tag="li" to="/login"><a>Login</a></router-link>
            <router-link tag="li" to="/register"><a>Register</a></router-link>

          </ul>
        </nav>
        <h3 class="text-muted"><router-link tag="h3" to="/"><a>Apartmani</a></router-link></h3>
      </div>
</template>

<script>

export default {
    data () {
      return {
          
      }
    }


}

</script>

<style>

</style>
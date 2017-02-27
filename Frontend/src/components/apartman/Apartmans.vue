<template>
    <div>
        <my-apartman
            v-for="apartman in apartmans"
            :apartman="apartman"
            ></my-apartman>
    </div>
</template>

<script>
    import Apartman from './Apartman.vue'
    export default {
        data () {
            return {
               apartmans: []
            }
        }, 
        created () {
            this.$http.get('api/')
                .then (res => {
                    this.apartmans = res.body
                })
        },
        components: {
            'my-apartman': Apartman
        }
    }

</script>

<style>

</style>
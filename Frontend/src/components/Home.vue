<template>
    <div class="row">
        <h1>Home</h1>
        <my-apartmans></my-apartmans>
    </div>
</template>

<script>
    import Apartmans from './apartman/Apartmans.vue'
    export default {
        components: {
            'my-apartmans': Apartmans
        }
        
    }

</script>

<style>

</style>
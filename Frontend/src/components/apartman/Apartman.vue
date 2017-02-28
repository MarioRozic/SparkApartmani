<template>
    <div class="col-md-4">
        <div class="thumbnail">
            <img src="https://exp.cdn-hotels.com/hotels/6000000/5450000/5448700/5448602/5448602_52_z.jpg" alt="">
            <div class="caption">
                <h3>{{ apartman.name }}</h3>
                <h4><strong>{{ apartman.city }}</strong></h4>
                {{ apartman.address }}
                <!--<hr>
                <p>
                    {{ apartman.description }}
                </p>-->
                <hr>
                <p>
                    <a class="btn btn-default" @click="details">View details</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['apartman'],

        methods: {
            details () {
                this.$router.push('/details/' + this.apartman.id)
            }
        }
        

    }

</script>

<style>

</style>
<template>
    <div class="col-md-4">
        <div class="thumbnail">
            <img src="https://exp.cdn-hotels.com/hotels/6000000/5450000/5448700/5448602/5448602_52_z.jpg" alt="">
            <div class="caption">
                <h3>{{ apartman.name }}</h3>
                <h2>{{ apartman.city }}</h2>
                {{ apartman.address }}
                <hr>
                <p>
                    <a href="#" class="btn btn-default">View details</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['apartman']

    }

</script>

<style>

</style>
<template>
    <div class="row">
        <div class="jumbotron">
            <!--<img src="https://texasstation.sclv.com/~/media/Images/Page-Background-Images/Texas/TS_Hotel_King_lowrez.jpg?h=630&la=en&w=1080" alt="">-->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                    <img src="https://miamitouristguide.com/wp-content/uploads/meatmarket-1080x630.jpg" alt="Flower">
                    </div>

                    <div class="item">
                    <img src="https://texasstation.sclv.com/~/media/Images/Page-Background-Images/Texas/TS_Hotel_King_lowrez.jpg?h=630&la=en&w=1080" alt="Flower">
                    </div>
                    <div class="item">
                    <img src="https://miamitouristguide.com/wp-content/uploads/meatmarket-1080x630.jpg" alt="Flower">
                    </div>

                    <div class="item">
                    <img src="https://texasstation.sclv.com/~/media/Images/Page-Background-Images/Texas/TS_Hotel_King_lowrez.jpg?h=630&la=en&w=1080" alt="Flower">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
            
            
            <h1>{{ apartman.name }}</h1>
            <p>City: <strong>{{ apartman.city }} </strong><br>Address: {{ apartman.address }}</p>

            <div class="panel panel-default">
                <div class="panel-body">
                    {{ apartman.description }}
                </div>
            </div>
            <div class='input-group name' id='name'>
                <input type='text' class="form-control" v-model="name"
                    placeholder="Name"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-font"></span>
                </span>
            </div><br>

            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" v-model="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div><br>

                <div class='input-group days' id='days'>
                    <input type='number' class="form-control" v-model="days"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-hourglass"></span>
                    </span>
                </div>
            </div>
            <p><a class="btn btn-primary btn-lg" 
                    role="button" 
                    :class="{disabled: !filled}"
                    @click="reserve">Reserve NOW!</a></p>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert'

    export default {
        data () {
            return {
                apartman: [],
                date: '',
                name: '',
                days: 1,
            }
        },
        created () {
            
                this.$http.get(`api/details/${this.$route.params.id}`)
                    .then(res => {
                        this.apartman = res.body
                        // console.log(res);
                    })

                    
        },
        methods: {
            reserve () {
                let data = {
                    user_id: this.$auth.getAuthenticatedUser().id,
                    apartman_id: this.apartman.id,
                    name: this.name,
                    hotel_name: this.apartman.name,
                    date: this.date,
                    days: this.days
                }

                // console.log(data);

                this.$http.post('api/reserve', data)
                    .then(res => {
                        console.log(res)
                        this.$router.push('/')
                    }, res => {
                        console.log(res.body.error);
                        swal("Cancelled", res.body.error , "error");

                    })
            }
        },
        computed: {
            filled () {
                return this.name && this.date && this.days
            }
        }

    }

</script>

<style>

</style>
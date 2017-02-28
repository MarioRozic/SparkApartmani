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
      <img src="http://discoverindonesia.co.id/wp-content/uploads/2016/03/Day-2-Stay-at-a-Ritz-Carlton-Reserve--1080x630.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="https://texasstation.sclv.com/~/media/Images/Page-Background-Images/Texas/TS_Hotel_King_lowrez.jpg?h=630&la=en&w=1080" alt="Flower">
    </div>
    <div class="item">
      <img src="http://discoverindonesia.co.id/wp-content/uploads/2016/03/Day-2-Stay-at-a-Ritz-Carlton-Reserve--1080x630.jpg" alt="Flower">
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
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Reserve NOW!</a></p>
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                apartman: []
            }
        },
        created () {
            
                this.$http.get(`api/details/${this.$route.params.id}`)
                    .then(res => {
                        this.apartman = res.body
                        console.log(res);
                    })
        }      

    }

</script>

<style>

</style>
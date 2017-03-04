<template id="modal-template">
  <div class="modal">
    <div class="modal-wrapper">
      <div class="modal-container">
          <div class="modal-header">
            <h3>
              Edit Reservation
            </h3>
          </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer uk-clearfix">
            <button class="btn btn-danger" @click="cancelEdit">Cancel</button>
          
            <button class="btn btn-success" @click="editReservation">Edit</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import swal from 'sweetalert'

    export default {
        data () {
            return {
                date: '',
                name: '',
                days: ''
                
            }
        },
        props: ['id'],

        methods: {
          editReservation () {
                let data = {
                  name: this.name,
                  date: this.date,
                  days: this.days
                }
        
                this.$http.put('api/reservation/details/' + this.id, data)
                  .then(res => {
                    this.$emit('editDone',this.id,data)

                    console.log(res);
                  }, res => {
                    swal("Cancelled", res.body.error , "error");
                    this.$emit('cancelEdit')

                  })

          },
          cancelEdit () {
                    this.$emit('cancelEdit')
            
          }
        },
        created() {
            this.$http.get('api/reservation/details/' + this.id)
              .then(res => {
                console.log(res.body);
                this.date = res.body.date
                this.name = res.body.name
                this.days = res.body.days
              })
        }
    }


</script>



<style>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: table;
  transition: opacity .3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-container {
  background: #fff;
  width: 450px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all .3s ease;
  margin: 0 auto;
  padding: 20px 30px;
}
.modal-footer {
  margin-top: 15px;
}
.modal-enter, .modal-leave {
  opacity: 0;
}
.modal-enter .modal-container, .modal-leave .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>
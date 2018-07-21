<template>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">تغيير كلمة السر</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">

        <div class="row">
          <div class="col-md-12" >
            <fg-input type="password"
                      label="كلمة السر الحالية"
                      placeholder="كلمة السر الحالية"
                      v-model="user.currentpassword"
                      >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" >
            <label  style="float:right;font-size:medium"> كلمة السر الجديدة</label>
            <input id="password" type="password"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl" placeholder=" كلمة السر الجديدة">
          </div>

        </div>
        <div class="row">
          <div class="col-md-12" >

            <label  style="float:right;font-size:medium">أعد كتابة كلمة السر الجديدة</label>
            <input id="confirm_password" type="password" v-on:keyup = "showinputvalue" style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl" placeholder="أعد كتابة كلمة السر الجديدة">
            <span id='message' style="float: right"></span>
          </div>

        </div>







        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
            تغيير كلمة السر
          </button>
        </div>

      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        user: {

          usernumber: 'SF-XX-XXX',
          username: 'مويات براء عبد الاله',
          email: 'mouyet.19@gmail.com',
            rank: 'قائد الفوج',
          lastName: 'براء عبد الاله',
            place_of_birth: 'Sétif,Algeria',
            Date_of_Birth: '06/12/1996',
            currentpassword:'',
            newpassword:'showinputvalue',
            retype_newpassword:'',

        }
      }
    },
    methods: {
        showinputvalue : function(event) {

            $('#password, #confirm_password').on('keyup', function () {
                if(!($('#password').val()=="" && $('#confirm_password').val()=="")){
                    if ($('#password').val() == $('#confirm_password').val()) {
                        $('#message').html(' كلمة السر الجديدة  متطابقة').css('color', 'green');
                    } else
                        $('#message').html('يرجى التأكد من كلمة السر الجديدة فهي غير متطابقة').css('color', 'red');
                }else{
                    $('#message').html('');
                }

            });
        }
    }
  }


</script>
<style>
  .header{
    background-color: rgb(51, 181, 229);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  .title{
    color:white
  }

</style>

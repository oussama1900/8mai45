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
                                                                             padding: 5px" dir="rtl" placeholder=" كلمة السر الجديدة" v-model="user.newpassword">
          </div>

        </div>
        <div class="row">
          <div class="col-md-12" >

            <label  style="float:right;font-size:medium">أعد كتابة كلمة السر الجديدة</label>
            <input id="confirm_password" type="password" v-on:keyup = "showinputvalue" style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl" v-model="user.retype_newpassword" placeholder="أعد كتابة كلمة السر الجديدة">
            <span id='message' style="float: right"></span>
          </div>

        </div>







        <div class="text-center">
          <button type="button" class="btn btn-info btn-fill btn-wd"  @click="ChangePassword">
            تغيير كلمة السر
          </button>
        </div>

      </form>
    </div>
    <sweet-modal icon="error" ref="password_error">
      <h3>كلمة السر خاطئة</h3>
    </sweet-modal>
    <sweet-modal icon="success" ref="success">
      <h3>تم تغيير كلمة السر  بنجاح</h3>
      <h4 style="text-align: right">ملاحظة : تسجيل الدخول القادم لا يمكن أن يتم بكلمة السر  القديمة</h4>
    </sweet-modal>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        user: {


            currentpassword:'',
            newpassword:'',
            retype_newpassword:'',

        }
      }
    },
    methods: {
        showinputvalue : function(event) {

            $('#password, #confirm_password').on('keyup', function () {
                if(!($('#password').val()=="" && $('#confirm_password').val()=="") ){
                    if ($('#password').val() == $('#confirm_password').val()) {

                        $('#message').html(' كلمة السر الجديدة  متطابقة').css('color', 'green');
                    } else
                        $('#message').html('يرجى التأكد من كلمة السر الجديدة فهي غير متطابقة').css('color', 'red');
                }else{
                    $('#message').html('');
                }

            });
        },
        ChangePassword(){

            if(($('#password').val()=="" || $('#confirm_password').val()=="") || this.user.currentpassword.localeCompare("")===0){
                $('#message').html('يرجى التاكد من ادخال جميع المعلومات').css('color', 'red');

            }else {
                if ($('#password').val() == $('#confirm_password').val()){
                    var vm = this;
                    axios.put('/api/newpassword',vm.user).then(function (response) {

                        if(!response.data.password){
                            vm.$refs.password_error.open();


                        }else{
                            vm.$refs.success.open();

                        }


                    });

                }else{
                    $('#message').html('يرجى التأكد من كلمة السر الجديدة فهي غير متطابقة').css('color', 'red');
                }
            }


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
    color:white;
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

  }
  h4,h3,fg-input,button{
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

  }

</style>

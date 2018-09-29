<template>
    <div>


    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

        <div class="header">

            <h4 class="title">تغيير البريد الالكتروني  </h4>
        </div>
        <div style="margin: 20px;margin-right: 30px">
            <div class="row">
                <div class="col-md-12" >

                    <label  style="float:right;font-size:medium"> البريد الإلكتروني</label>
                    <input id="email" type="email"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  v-model="User.email" v-on:keyup="emptyemail" placeholder=" البريد الإلكتروني">
                    <span id='emailmessage' style="float: right"></span>
                </div>
            </div>




            <div class="text-center">
                <button type="submit" class="btn btn-info btn-fill btn-wd"  @click="changeemail">

                    حفظ
                </button>
            </div>
        </div>

    </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">تغيير كلمة السر  </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">





                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium">كلمة السر الجديدة</label>
                        <input id="newpassword" type="password" v-on:keyup = "matchpassword" style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"   v-model="User.newpassword" placeholder="  كلمة السر الجديدة">

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> اعادة كتابة كلمة السر الجديدة </label>
                        <input id="confirm_newpassword" type="password" v-on:keyup = "matchpassword" style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl" v-model="User.confirm_newpassword" placeholder=" اعادة كتابة كلمة السر الجديدة">

                        <span id='message' style="float: right"></span>
                    </div>

                </div>



                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd"  @click="changepassword">

                        حفظ
                    </button>
                </div>

            </div>
        </div>
				<sweet-modal ref="email_success" icon="success">
					<h3>تم تغيير البريد الالكتروني بنجاح </h3>
					<h3 style="text-align:right">ملاحظة : لايمكن استخدام البريد الإلكتروني القديم في تسجيل الدخول</h3>


				</sweet-modal>
				<sweet-modal ref="email_error" icon="error">
					<h3>البريد الإلكتروني موجود مسبقا</h3>

				</sweet-modal>
				<sweet-modal ref="password_success" icon="success">
					<h3>تم تغير كلمة السر بنجاج</h3>
					<h3 style="text-align:right">ملاحظة : لا يمكن استعمال كلمة السر القديمة في تسجيل الدخول القادم </h3>

				</sweet-modal>
				<sweet-modal ref="password_error" icon="error">
					<h3>كلمة السر ليست متطابقة</h3>

				</sweet-modal>

    </div>
</template>

<script>



    export default {
        name: "EditAccountInfo",
        data(){
            return{
                User:{
                    email:'',
                    newpassword:'',
                    confirm_newpassword:'',
                }
            }
        },
        created:function () {
            var vm = this;

            axios.get('/api/getuseremail/'+this.$route.params.id).then(function (response) {


          vm.User = response.data;

            });

        },
        methods:{
            emptyemail(){
                $('#email').on('keyup', function () {

                    if($('#email').val()==""){
                        $('#emailmessage').html('');

                    }else{
                        $('#emailmessage').html('');
                    }

                });
            },
            changeemail(){
                if(this.User.email.localeCompare("")===0){
                    $('#emailmessage').html('يرجى التاكد من ادخال جميع البيانات').css('color','red');
                }else{
                    var vm =this;
                    axios.put('/api/changeemail/'+this.$route.params.id,vm.User).then(function (response) {


                        if(response.data.emailchanged){
                          vm.$refs.email_success.open();

                        }else{


                          vm.$refs.email_error.open();
                            $('#emailmessage').html('هذا البريد الإلكتروني موجود مسبقا').css('color','red');
                            $('#email').keyup(function (event) {
                                $('#emailmessage').html('');
                            });
                        }
                    });
                }

            },
            changepassword() {
							var vm = this;
                if (($('#newpassword').val() == "" || $('#confirm_newpassword').val() == "") ) {
                    $('#message').html('يرجى التاكد من ادخال جميع المعلومات').css('color', 'red');

                } else {
                    if ($('#newpassword').val() == $('#confirm_newpassword').val()) {
                        
                        axios.put('/api/changepassword/' + this.$route.params.id, vm.User).then(function (response) {

                            if (response.data.password) {
                              vm.$refs.password_success.open();


                            } else {

                            }


                        });

                    }else{
											  vm.$refs.password_error.open();
										}
                }
            },
            matchpassword : function(event) {

                $('#newpassword, #confirm_newpassword').on('keyup', function () {
                    if(!($('#newpassword').val()=="" && $('#confirm_newpassword').val()=="") ){
                        if ($('#newpassword').val() == $('#confirm_newpassword').val()) {

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

<style scoped>
    .header{
        background-color: rgb(51, 181, 229);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    .header .title{
        color:white;
    }
    .text-center > button {
        background-color: rgb(51, 181, 229);
    }
</style>

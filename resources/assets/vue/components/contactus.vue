<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
        <div class="header">
            <h2 class="title">رسائل الصفحة</h2>
        </div>
        <div class="row">

            <div class="col-md-4 card text-center report-card " style="margin-left:15px;padding-right:0px;padding-left:0px;" v-for="contact in ContactUs" >
                <div class="card-block"   style="cursor: pointer">
                    <img src="/images/contactus.jpg" style="width:100%" height="100px"/>
                </div>
                <div class="card-footer">

                   <p style="text-align: right" dir="rtl"> <span>الاسم : </span> <span>{{contact.name}}</span></p>
                   <p style="text-align: right" dir="rtl"><span>اللقب : </span> <span>{{contact.surname}}</span></p>
                    <button class="btn btn-primary pull-right" @click="viewmessage(contact)">اقرأ</button>
                    <button class="btn btn-danger pull-left" @click="delete_message(contact)">حذف</button>
                </div>
            </div>

    </div>
        <sweet-modal ref="message">
            <div>
                <p style="text-align: right" dir="rtl"> <span>الاسم : </span> <span>{{name}}</span></p>
                <p style="text-align: right" dir="rtl"><span>اللقب : </span> <span>{{surname}}</span>ا</p>
                <p style="text-align: right" dir="rtl">{{content}}</p>
            </div>

        </sweet-modal>
        <sweet-modal ref="confirmation">
          <h3>هل أنت متأكد</h3>
            <button class="btn btn-primary " id="ok">نعم</button>
            <button class="btn btn-danger " id="cancel" >لا</button>
        </sweet-modal>
        <loading
                :show="show"
                :label="label">
        </loading>
    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    export default {
        components:{
          loading
        },
        name: "contactus",
       created:function(){
            var vm =this;
           axios.get('/api/getContactUs').then(function(response){
               vm.ContactUs = response.data.contactus;
           })
       },
        data(){
            return{
                show: false,
                label: '....الرجاء الإنتظار',
                name:'',
                surname:'',
                content:'',
                ContactUs:'',
            }
        },
        methods:{
            viewmessage(message){
                this.name = message.name;
                this.surname = message.surname;
                this.content = message.message;
                this.$refs.message.open();

            },
            delete_message(contact){
                this.$refs.confirmation.open();
                var vm = this;
                $('#ok').unbind().click(function(){

                    vm.$refs.confirmation.close();
                    vm.show=true;
                    axios.delete('/api/deletecontactmessage/'+contact.id).then(function(response){
                        var position = vm.ContactUs.indexOf(contact);
                        vm.ContactUs.splice(position,1);
                        vm.show=false;
                    });
                });
                $('#cancel').unbind().click(function(){
                    vm.$refs.confirmation.close();

                });

            }
        }
    }
</script>

<style scoped>
    .card{
        margin-top:7%;
        margin-left: 65px;
        background-color: white;

    }
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
    }
*{
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
}
    .card{
        margin-top:6%;
        margin-left: 40px;


    }
    /*the small size*/
    @media (max-width: 480px) {
        .icon {
            width: 70px;
            height: 70px;
        }

        .card{
            margin-top: 17%;
            margin-left: 16px;
        }
    }

    /*the medium size*/
    @media (max-width: 720px) {
        .icon {
            width: 70px;
            height: 70px;
        }

        .card{
            margin-top: 25%;
            margin-left: 25px;
        }
    }
    @media (max-width: 981px) {
        .col-md-4{
            width:95% !important;
        }
    }
    @media (min-width: 982px) {
        .col-md-4{
            width:31.3333333333% !important;
        }
    }
    .row{
        padding:10px
    }
</style>
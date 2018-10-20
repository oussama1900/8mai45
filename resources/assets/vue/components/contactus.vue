<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
        <div class="header">
            <h2 class="title">رسائل الصفحة</h2>
        </div>
        <div class="row">

            <div class="col-md-4 card text-center report-card " style="margin-left:15px;padding-right:0px;padding-left:0px;height:165px" v-for="contact in ContactUs" >
                <div class="card-block"  @click="viewpdf(contact)" style="cursor: pointer">
                    <img src="/images/contactus.jpg" style="width:100%" height="100px"/>
                </div>
                <div class="card-footer">

                   <p style="text-align: right" dir="rtl"> <span>الاسم : </span> <span>{{contact.name}}</span></p>
                   <p style="text-align: right" dir="rtl"><span>اللقب : </span> <span>{{contact.surname}}</span></p>

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
    </div>
</template>

<script>
    export default {
        name: "contactus",
       created:function(){
            var vm =this;
           axios.get('/api/getContactUs').then(function(response){
               vm.ContactUs = response.data.contactus;
           })
       },
        data(){
            return{
                name:'',
                surname:'',
                content:'',
                ContactUs:'',
            }
        },
        methods:{
            viewpdf(message){
                this.name = message.name;
                this.surname = message.surname;
                this.content = message.message;
                this.$refs.message.open();

            },
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
</style>
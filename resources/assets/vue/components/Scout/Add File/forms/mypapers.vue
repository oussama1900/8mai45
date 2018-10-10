<template>
    <div>
    <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
        <div class="header">

            <h4 class="title">وثائق بدون ختم</h4>
        </div>
        <div  class="card-body" style="margin:10px;">
            <div class="row form-group">
                <div class="col-md-3" style="float:right">
                    <label style="float:right;font-size: medium" class="label_title">رقم البريد الصادر</label>
                    <select class="form-control label_title"  id="select_month" dir="rtl" v-model="outing_mail_not_appr">
                        <option :value="outing_mail.outing_mail_id" class="label_title" v-for="outing_mail in Correspondences_Not_Appr">{{outing_mail.outing_mail_id}}</option>

                    </select>
                </div>

                <div class="col-md-1" style="float:right;margin-top:25px">
                    <button type="button" class="btn btn-primary btn-fill btn-wd" @click="search()">
                       <span class="label_title" >بحث</span>
                        <i class="fa fa-search"></i>
                    </button>

                </div>
            </div>

            <div class="row">

                <div class="col-md-4 card text-center report-card " style="margin-left:15px;padding-right:0px;padding-left:0px;height:165px" v-for="correspondence in Correspondences_Not_Appr" :id="'correspondence_not_appr'+correspondence.outing_mail_id">

                    <div class="card-block"  @click="viewpdf(correspondence)" style="cursor: pointer">
                        <img src="/images/pdf_image.png" width="100px" height="100px"/>
                    </div>
                    <div class="card-footer">

                           <p style="text-align: right;margin-top:0px;margin-bottom:0px">
                               <span style="font-size: 17px" class="label_title" >  {{correspondence.subject}} </span>


                               <a :href="'/uploads/Correspondence/'+correspondence.file" class="btn btn-primary btn-circle btn-lg" style="padding-left: 6px; padding-top: 6px;padding-right:8px" download>
                                   <span class="glyphicon glyphicon-download" aria-hidden="true" style="font-size:2rem" ></span>
                               </a>



                           </p>



                    </div>

                </div >
<div v-if="Correspondences_Not_Appr.length===0">
    <h3 class="label_title" > لا يوجد وثائق </h3>
</div>
            </div>
            <sweet-modal ref="pdfviewer">
                <iframe :src=location   width="640px" height="570px" style="margin-left: -32px;margin-top: -65px;margin-bottom: -75px;"></iframe>

            </sweet-modal>

            <loading
                    :show="show"
                    :label="label">
            </loading>
    </div>

        <sweet-modal ref="delete_warning" icon="warning">
            <h3>هل تريد حقا حذف هذه الوثيقة</h3>
            <button id="delete_cancel_button" class="btn btn-danger" style="margin:10px;margin-top:20px">لا</button>
            <button id="delete_confirmation_button" class="btn btn-primary" style="margin: 10px;margin-top:20px" >نعم</button>

        </sweet-modal>
</div>
 <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
        <div class="header">

            <h4 class="title">وثائق مختومة </h4>
        </div>
        <div  class="card-body" style="margin:10px;">

            <div class="row form-group">
                <div class="col-md-3" style="float:right">
                    <label style="float:right;font-size: medium" class="label_title">رقم البريد الصادر</label>
                    <select class="form-control label_title"  id="select_month2" dir="rtl" v-model="outing_mail_appr">
                        <option  class="label_title" v-for="outing_mail_appr in Correspondences_Appr" :value="outing_mail_appr.outing_mail_id">{{outing_mail_appr.outing_mail_id}}</option>

                    </select>
                </div>

                <div class="col-md-1" style="float:right;margin-top:25px">
                    <button type="button" class="btn btn-primary btn-fill btn-wd" @click="search_appr()">
                        <span class="label_title" >بحث</span>
                        <i class="fa fa-search"></i>
                    </button>

                </div>
            </div>
            <div class="row">

                <div class="col-md-4 card text-center report-card " style="margin-left:15px;padding-right:0px;padding-left:0px;height:165px" v-for="correspondence_appr in Correspondences_Appr" :id="'correspondence_appr'+correspondence_appr.outing_mail_id">

                    <div class="card-block"  @click="viewpdf(report)" style="cursor: pointer">
                        <img src="/images/pdf_image.png" width="100px" height="100px"/>
                    </div>
                    <div class="card-footer">

                        <p style="text-align: right;margin-top:0px;margin-bottom:0px">
                            <span style="font-size: 17px" class="label_title" >  {{correspondence_appr.subject}} </span>

                            <a :href="'/uploads/Correspondence/'+correspondence_appr.file" class="btn btn-primary btn-circle btn-lg" style="padding-left: 6px; padding-top: 6px;padding-right:8px" download>
                                <span class="glyphicon glyphicon-download" aria-hidden="true"  style="font-size:2rem"></span>
                            </a>




                        </p>


                    </div>

                </div >
                <div v-if="Correspondences_Appr.length===0">
                    <h3 class="label_title" > لا يوجد وثائق </h3>
                </div>
            </div>
            <sweet-modal ref="pdfviewer">
                <iframe :src=location   width="640px" height="570px" style="margin-left: -32px;margin-top: -65px;margin-bottom: -75px;"></iframe>

            </sweet-modal>

            <loading
                    :show="show"
                    :label="label">
            </loading>
        </div>
    </div>
    </div>
</template>
<script>
    import loading from 'vue-full-loading';
    export default {
        components:{

            loading
        },
        data(){
          return{
              show: false,
              label: '....الرجاء الإنتظار',
              Correspondences_Appr:[],

              Correspondences_Not_Appr:[],

              public_path:'',
              location:'',
              outing_mail_not_appr:'',
              outing_mail_appr:'',

          }
        },
        created:function () {

            var vm  =this;
            axios.get('/api/GetMyCorrespondences').then(function (response) {

                vm.Correspondences_Not_Appr = response.data.Correspondences_Not_Appr;
                vm.Correspondences_Appr = response.data.Correspondences_Appr;

                vm.public_path = response.data.public_path;


            });
        },
        methods:{
            viewpdf(correspondence){
                this.location ='/uploads/Correspondence/'+correspondence.file;
                this.$refs.pdfviewer.open();

            },
            search(){

               var outing_mail  =this.outing_mail_not_appr,
                   i=0;
               for(i=0;i<this.Correspondences_Not_Appr.length;i++){

                  if(outing_mail ===this.Correspondences_Not_Appr[i].outing_mail_id ){
                     $('#correspondence_not_appr'+this.Correspondences_Not_Appr[i].outing_mail_id).show();

                  }else{
                      $('#correspondence_not_appr'+this.Correspondences_Not_Appr[i].outing_mail_id).hide();
                  }

               }




            },
            search_appr(){

                var outing_mail  =this.outing_mail_appr,
                    i=0;

                for(i=0;i<this.Correspondences_Appr.length;i++){

                    if(outing_mail === this.Correspondences_Appr[i].outing_mail_id ){
                        $('#correspondence_appr'+this.Correspondences_Appr[i].outing_mail_id).show();

                    }else{
                        $('#correspondence_appr'+this.Correspondences_Appr[i].outing_mail_id).hide();
                    }

                }




            },
        }
    }

</script>

<style scoped>
    #select_month,#select_year,#select_month2,#select_year2{
        border-radius: 4px;
        border: 1px solid #C9C9C9;
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
    a.btn:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
    }
    a.btn {
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
    .btn-lg{
        width: 35px;
        height: 35px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 25px;
    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }


</style>
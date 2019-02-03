<template>
    <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
        <div class="header">

            <h4 class="title">التقارير الشهرية</h4>
        </div>
        <div  class="card-body" style="margin:10px;">
            <div class="row form-group">
                <div class="col-md-3" style="float:right">
                    <label style="float:right;font-size: medium" class="label_title">الشهر</label>
                    <select class="form-control label_title"  id="select_month" dir="rtl" v-model="month">
                        <option value="1" class="label_title">جانفي</option>
                        <option value="2" class="label_title">فيفري</option>
                        <option value="3" class="label_title">مارس</option>
                        <option value="4" class="label_title"> أفريل</option>
                        <option value="5" class="label_title">ماي</option>
                        <option value="6" class="label_title">جوان</option>
                        <option value="7" class="label_title">جويلية</option>
                        <option value="8" class="label_title">أوت</option>
                        <option value="9" class="label_title">سبتمبر</option>
                        <option value="10" class="label_title">أكتوبر</option>
                        <option value="11" class="label_title">نوفمبر</option>
                        <option value="12" class="label_title">ديسمبر</option>
                    </select>
                </div>
                <div class="col-md-3" style="float:right">
                    <label style="float:right;font-size: medium">السنة</label>
                    <select class="form-control label_title" id="select_year" dir="rtl" v-model="year">
                        <option :value="2000" class="label_title">2000</option>
                        <option :value="2001" class="label_title">2001</option>
                        <option :value="2002" class="label_title">2002</option>
                        <option :value="2003" class="label_title">2003</option>
                        <option :value="2004" class="label_title">2004</option>
                        <option :value="2005" class="label_title">2005</option>
                        <option :value="2006" class="label_title">2006</option>
                        <option :value="2007" class="label_title">2007</option>
                        <option :value="2008" class="label_title">2008</option>
                        <option :value="2009" class="label_title">2009</option>
                        <option :value="2010" class="label_title">2010</option>
                        <option :value="2011" class="label_title">2011</option>
                        <option :value="2012" class="label_title">2012</option>
                        <option :value="2013" class="label_title">2013</option>
                        <option :value="2014" class="label_title">2014</option>
                        <option :value="2015" class="label_title">2015</option>
                        <option :value="2016" class="label_title">2016</option>
                        <option :value="2017" class="label_title">2017</option>
                        <option :value="2018" class="label_title">2018</option>
                        <option :value="2019" class="label_title">2019</option>
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

                <div class="col-md-4 card text-center report-card " style="margin-left:15px;padding-right:0px;padding-left:0px;height:165px" v-for="report in Reports">

                    <div class="card-block"  @click="viewpdf(report)" style="cursor: pointer">
                        <img src="/images/pdf_image.png" width="100px" height="100px"/>
                    </div>
                    <div class="card-footer">

                           <p style="text-align: right;margin-top:0px;margin-bottom:0px">
                              <span style="font-size: 17px" class="label_title" >  {{report.description.split('.')[0]}} </span>
                               <a :href="'/uploads/Units_Report/'+report.file_name" class="btn btn-primary btn-circle btn-lg" style="padding-left: 7px;padding-top:7px" :download="report.description.split('.')[0]">
                                   <span class="glyphicon glyphicon-download" aria-hidden="true" ></span>
                               </a>


                           </p>
                        <p style="text-align: left;margin-top:0px;margin-bottom: 0px;color:	#B9B9B9"><strong class="label_title" >وحدة {{report.unit}} </strong></p>


                    </div>

                </div >
<div v-if="Reports.length===0">
    <h3 class="label_title" > لا يوجد تقارير </h3>
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
              Reports:[],
              public_path:'',
              location:'',
              year:'',
              month:''
          }
        },
        created:function () {
            this.year = new Date().getFullYear();
            this.month = new Date().getMonth()+1;
            var vm  =this;
            axios.put('/api/GetReport',{month:vm.month,year:vm.year}).then(function (response) {
                vm.Reports = response.data.reports;
                vm.public_path = response.data.public_path;


            });
        },
        methods:{
            viewpdf(report){
                this.location ='/uploads/Units_Report/'+report.file_name;
                this.$refs.pdfviewer.open();

            },
            search(){
                this.show = true;
                var vm  =this;
                axios.put('/api/GetReport',{month:vm.month,year:vm.year}).then(function (response) {
                    vm.Reports = response.data.reports;
                    vm.public_path = response.data.public_path;
                vm.show = false;

                });
            }
        }
    }

</script>

<style scoped>
    #select_month,#select_year{
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
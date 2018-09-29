<template>
    <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
        <div class="header">

            <h4 class="title">التقارير الواردة للشهر الحالي</h4>
        </div>
        <div  class="card-body" style="margin:10px;">
            <div class="row">

                <div class="col-md-4 card text-center report-card " style="margin-left:15px;padding-right:0px;padding-left:0px;height:165px" v-for="report in Reports">

                    <div class="card-block"  @click="viewpdf(report)" style="cursor: pointer">
                        <img src="/images/pdf_image.png" width="100px" height="100px"/>
                    </div>
                    <div class="card-footer">

                           <p style="text-align: right;margin-top:0px;margin-bottom:0px">
                              <span style="font-size: 17px">  {{report.description.split('.')[0]}} </span>
                               <a :href="'/uploads/Units_Report/'+report.file_name" class="btn btn-primary btn-circle btn-lg" style="padding-left: 7px;padding-top:7px" download>
                                   <span class="glyphicon glyphicon-download" aria-hidden="true" ></span>
                               </a>


                           </p>
                        <p style="text-align: left;margin-top:0px;margin-bottom: 0px;color:	#B9B9B9"><strong>وحدة {{report.unit}} </strong></p>


                    </div>

                </div >

            </div>
            <sweet-modal ref="pdfviewer">
                <iframe :src=location   width="640px" height="570px" style="margin-left: -32px;margin-top: -65px;margin-bottom: -75px;"></iframe>

            </sweet-modal>


    </div>
</div>
</template>
<script>

    export default {
        data(){
          return{
              Reports:[],
              public_path:'',
              location:'',
          }
        },
        created:function () {
             var vm = this;
            axios.get('/api/GetMonthlyReport').then(function (response) {
                vm.Reports = response.data.reports;
                vm.public_path = response.data.public_path;


            });
        },
        methods:{
            viewpdf(report){
                this.location ='/uploads/Units_Report/'+report.file_name;
                this.$refs.pdfviewer.open();

            }
        }
    }

</script>

<style scoped>
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


</style>
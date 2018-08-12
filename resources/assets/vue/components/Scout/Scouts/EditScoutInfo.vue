<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 20px;padding-bottom:20px">
     <header>
         <h3 >تعديل معلومات الكشاف</h3>

     </header>
        <div class="card-body" style="padding: 0px;">
            <div class="card-body">

                <ul>
                    <li>
                    <div class="row">
                        <div class="col-md-6">
                            <input id="first_name" type="text" placeholder="الاسم" dir="rtl" v-model="ScoutInfo.first_name"/>
                        </div>
                        <div class="col-md-6">
                            <input id="last_name"    type="text" placeholder="اللقب" dir="rtl" v-model="ScoutInfo.last_name"/>
                        </div>
                    </div>

                </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="date_of_birth" class="input-style"  type="text" placeholder="تاريخ الازدياد" dir="rtl" v-model="ScoutInfo.date_of_birth"/>
                            </div>
                            <div class="col-md-6">
                                <input   id="place_of_birth" type="text" placeholder="مكان الازدياد" dir="rtl" v-model="ScoutInfo.phone"/>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <input  id="membership_date"  type="text" placeholder="تاريخ الانضمام" dir="rtl" v-model="ScoutInfo.membership_date"/>
                            </div>
                            <div class="col-md-6">

                                <select class="form-control" id="scout_unit" >
                                    <option>شبل</option>
                                    <option>كشاف</option>
                                    <option>كشاف متقدم</option>
                                    <option>جوال</option>
                                    <option>قائد متربص</option>
                                    <option>قائد </option>
                                </select>
                            </div>
                        </div>

                    </li>
                    <li style="margin-top: 30px">
                        <div v-if="addScout()">
                            <button class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="UpdateInfo()">

                                <span class="ladda-spinner"></span>
                                حفظ
                                <div class="ladda-progress" style="width: 0px;"></div>
                                <i class="fa fa-save"></i>

                            </button>
                        </div>
                        <div>
                            <button class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="UpdateInfo()">

                                <span class="ladda-spinner"></span>
                                حفظ
                                <div class="ladda-progress" style="width: 0px;"></div>
                                <i class="fa fa-save"></i>

                            </button>
                        </div>

                    </li>
                    <li style="margin-top: 30px">

                    </li>
                </ul>

            </div>
        </div>

    </div><!-- end container -->
</template>

<script>
    export default {
       data(){
           return{
               ScoutInfo:{


               },
           }

       },
        created: function () {

           this.getData();



        },
        methods:{

            getData(){
                var vm = this;
               axios.get("http://localhost:8000/api/getScout/"+this.$route.params.id).then(function(response){

                 vm.ScoutInfo = response.data.Scouts;

                });

            },
            UpdateInfo(){
                var vm = this;
                axios.put("http://localhost:8000/api/EditScoutInfo/"+this.$route.params.id,vm.ScoutInfo).then(function(response){

                    vm.$router.push('/scouts/cubs')

                });
            },


        }
    }
</script>

<style scoped>
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

    #first_name,#last_name,#date_of_birth,#place_of_birth,#membership_date{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    #scout_unit{
        border: 1px solid #9C9C9C;
        border-radius: 7px;

    }
  /** .sccout-card{
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.9);
        -o-transform: scale(1.5);
    }**/
</style>
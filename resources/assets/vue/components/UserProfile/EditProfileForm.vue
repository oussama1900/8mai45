<template>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >

    <div class="header">

      <h4 class="title">تعديل المعلومات الشخصية</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">
        <div class="row">
          <div class="col-md-6">
            <fg-input type="text"
                      label="اللقب"
                      placeholder="اللقب"
                      :disabled="true"
                      v-model="MyInfo.first_name"
                      >
            </fg-input>
          </div>
          <div class="col-md-6">
            <fg-input type="text"
                      label="الاسم"
                      placeholder="الاسم"
                      :disabled="true"
                       v-model="MyInfo.last_name"
                     >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">

            <fg-input type="text"
                      label="اسم المستخدم"
                      :disabled="true"
                      placeholder="اسم المستخدم"
                      v-model="MyInfo.full_name"
                     >
            </fg-input>
          </div>
          <div class="col-md-6">
            <fg-input type="text"
                      label="رقم المستخدم"
                      :disabled="true"
                      placeholder="رقم المستخدم"
                      v-model="MyInfo.scout_code"
                      >
            </fg-input>
          </div>


        </div>


        <div class="row">
          <div class="col-md-6" >
            <fg-input type="text"
                      label="تاريخ الانخراط"
                      placeholder="تاريخ الانخراط"
                      :disabled="true"
                      v-model="MyInfo.membership_date"
            >
            </fg-input>
          </div>
          <div class="col-md-6" >
            <fg-input type="date"
                      label="تاريخ الميلاد"
                      placeholder="تاريخ الميلاد"
                      :disabled="true"
                      v-model="MyInfo.date_of_birth"
                    >
            </fg-input>
          </div>

        </div>

        <div class="row">
          <div class="col-md-6" >
            <fg-input type="text"
                      label="الدور"
                      placeholder="الدور"
                      :disabled="true"
                      v-model="MyInfo.role"

            >
            </fg-input>
          </div>
          <div class="col-md-6" >

            <fg-input

                    type="text"
                      label="الوحدة"
                      placeholder="الوحدة"
                      :disabled="true"

                      v-model="MyInfo.unit"

            >
            </fg-input>
          </div>

        </div>
<div class="row">
  <div class="col-md-6" >
    <fg-input type="email"
              label="البريد الإلكتروني"
              placeholder="البريد الإلكتروني"
              v-model="MyInfo.email"
              >
    </fg-input>
  </div>
  <div class="col-md-6" >
    <fg-input type="text"
              label="رقم الهاتف"
              placeholder="رقم الهاتف"
              v-model="MyInfo.phone"
    >
    </fg-input>
  </div>
</div>






        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd"  @click="UpdateMyInfo">

            حفظ
          </button>
        </div>

      </form>
    </div>
  </div>
</template>
<script>
  export default {

     data(){
         return{
             MyInfo:{
               first_name:'',
               last_name:'',
               scout_code:'',
                 full_name:'',
                 date_of_birth:'',
                 membership_date:'',
                 unit:'',
                 role:'',
                 phone:'',
                 email:'',
                 scout_id:'',

             },


         }
     },
      created:function(){



      this.fetchdata();


      },
    methods: {

         fetchdata(){
             var vm = this;


             axios.get('/api/getUser').then(function (response) {
               vm.MyInfo = response.data.users[0];
               vm.MyInfo.full_name = response.data.users[1];
               vm.MyInfo.scout_code = response.data.users[2];
               if(response.data.users[3]===null){
                   vm.MyInfo.unit="القادة";
                   vm.MyInfo.role = response.data.users[4].role;
               }else{
                   vm.MyInfo.unit=response.data.users[3];
                   vm.MyInfo.unit="لا شيئ";
               }


             });


         },
        UpdateMyInfo(){
             var vm = this;
             axios.post('/api/UpdateMyInfo',vm.MyInfo).then(function (response) {

                 alert('تم التعديل بنجاح تام');

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
  .header .title{
    color:white;
  }
</style>

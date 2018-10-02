<template>
  <div>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">المعلومات الكشفية</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">




        <div class="row">
          <div class="col-md-12" >

              <vue-editor v-model="Scout_info"></vue-editor>
          </div>
        </div>



      </form>
    </div>
  </div>

  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">المعلومات الشخصية</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">






        <div class="row">
          <div class="col-md-12" >
          
            <vue-editor v-model="Personal_info"></vue-editor>
          </div>
        </div>


      </form>
   </div>
  </div>







  <div class="text-center">
    <button type="butto," class="btn btn-info btn-fill btn-wd" @click="updateProfile">
      تحديث السيرة الذاتية
    </button>
  </div>
    <sweet-modal ref="success" icon="success">
      <h3>
        تم تحديث السيرة الذاتية بنجاح تام
      </h3>
    </sweet-modal>
</div>
</template>
<script>

import { VueEditor } from 'vue2-editor'
  export default {
    components:{
      VueEditor
    },
    data () {
      return {

        Scout_info:'',
        Personal_info:'',
      }
    },
      created:function(){
          var vm = this;
      axios.get('/api/getCurriculumVitae').then(function (response) {
          vm.Scout_info = response.data.scout_info;
          vm.Personal_info = response.data.personal_info
      });
},
    methods: {
      updateProfile () {
          var vm = this;
       axios.post('/api/UpdateCurriculumVitae',{scout_info:vm.Scout_info,personal_info:vm.Personal_info}).then(function(response){
         vm.$refs.success.open();
       });
      }
    }
  }

</script>
<style>
  h4,h3,button{
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

  }
</style>

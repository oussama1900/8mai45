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
          
            <vue-editor v-model="Personnal_info"></vue-editor>
          </div>
        </div>


      </form>
    </div>
  </div>







  <div class="text-center">
    <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
      تحديث السيرة الذاتية
    </button>
  </div>
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
        Personnal_info:'',
      }
    },
    methods: {
      updateProfile () {
        alert('Your data: ' + JSON.stringify(this.user))
      }
    }
  }

</script>
<style>
</style>

<template>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">ربط الحساب</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">


        <div class="row">
          <div class="col-md-12" >
            <fg-input type="text"
                      label="فايسبوك"
                      placeholder="رابط الحساب"
                      v-model="social_media.facebook"
                     >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" >
            <fg-input type="text"
                      label="انستغرام"
                      placeholder="رابط الحساب"
                      v-model="social_media.instagram"
                     >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" >
            <fg-input type="text"
                      label="تويتر"
                      placeholder="رابط الحساب"
                      v-model="social_media.twitter"
                      >
            </fg-input>
          </div>
        </div>








        <div class="text-center">
          <button type="button" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
            حفظ
          </button>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
    <sweet-modal ref="success" icon="success">
      <h3>تمت العملية بنجاح</h3>
    </sweet-modal>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        social_media: {
          facebook: '',
          twitter: '',
          instagram: '',


        }
      }
    },
      created:function(){
        var vm = this;
          axios.get('/api/getsocial_media_accounts').then(function (response) {
             vm.social_media.facebook = response.data.facebook;
             vm.social_media.instagram = response.data.instagram;
             vm.social_media.twitter = response.data.twitter;
          })
      },
    methods: {
      updateProfile () {
          var vm = this;
       axios.post('/api/social_media_accounts',vm.social_media).then(function (response) {
           vm.$refs.success.open();
       })
      },

    }
  }

</script>
<style>
</style>

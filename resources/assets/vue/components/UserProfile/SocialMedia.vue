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
                     >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" >
            <fg-input type="text"
                      label="انستغرام"
                      placeholder="رابط الحساب"
                     >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" >
            <fg-input type="text"
                      label="تويتر"
                      placeholder="رابط الحساب"
                      >
            </fg-input>
          </div>
        </div>








        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
            حفظ
          </button>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        user: {
          facebook: '',
          twitter: '',
          instagram: '',


        }
      }
    },
    methods: {
      updateProfile () {
        alert('Your data: ' + JSON.stringify(this.user))
      },

    }
  }

</script>
<style>
</style>

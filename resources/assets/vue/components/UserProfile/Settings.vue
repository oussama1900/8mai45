<template>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">تغيير كلمة السر</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">

        <div class="row">
          <div class="col-md-12" >
            <fg-input type="password"
                      label="كلمة السر الحالية"
                      placeholder="كلمة السر الحالية"
                      v-model="user.currentpassword"
                      >
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" >
            <fg-input type="password"
                      id="password"
                      label=" كلمة السر الجديدة"
                      placeholder=" كلمة السر الجديدة"
                      v-model="user.newpassword"


            >
            </fg-input>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12" >
            <fg-input type="password"
                      id="confirm_password"
                      label="أعد كتابة كلمة السر الجديدة"
                      placeholder="أعد كتابة كلمة السر الجديدة"
                      v-model="user.retype_newpassword"

                      v-on:keyup="check"
                      >
            </fg-input>
            <span id='message'></span>
          </div>

        </div>







        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
            تغيير كلمة السر
          </button>
        </div>

      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        user: {

          usernumber: 'SF-XX-XXX',
          username: 'مويات براء عبد الاله',
          email: 'mouyet.19@gmail.com',
            rank: 'قائد الفوج',
          lastName: 'براء عبد الاله',
            place_of_birth: 'Sétif,Algeria',
            Date_of_Birth: '06/12/1996',
            currentpassword:'',
            newpassword:'',
            retype_newpassword:'',

        }
      }
    },
    methods: {

    }
  }


</script>
<style>
  .header{
    background-color: rgb(51, 181, 229);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  .title{
    color:white
  }

</style>

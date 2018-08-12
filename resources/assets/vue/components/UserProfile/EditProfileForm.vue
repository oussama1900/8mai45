<template>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">{{users.title}}</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">
        <div class="row">
          <div class="col-md-6">
            <fg-input type="text"
                      label="اللقب"
                      placeholder="اللقب"
                      v-model="users.last_name">
            </fg-input>
          </div>
          <div class="col-md-6">
            <fg-input type="text"
                      label="الاسم"
                      placeholder="الاسم"
                      v-model="users.first_name"
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
                      v-model="users.user_full_name">
            </fg-input>
          </div>
          <div class="col-md-6">
            <fg-input type="text"
                      label="رقم المستخدم"
                      :disabled="true"
                      placeholder="رقم المستخدم"
                      v-model="users.user_code">
            </fg-input>
          </div>


        </div>

        <div class="row">
          <div class="col-md-12" >
            <fg-input type="text"
                      label="الرتبة في الفوج"
                      placeholder="الرتبة في الفوج"
                      v-model="users.rank">
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6" >
            <fg-input type="date"
                      label="تاريخ الميلاد"
                      placeholder="تاريخ الميلاد"
                      v-model="users.date_of_Birth">
            </fg-input>
          </div>
          <div class="col-md-6" >
            <fg-input type="text"
                      label="مكان الميلاد"
                      placeholder="مكان الميلاد"
                      v-model="users.phone">
            </fg-input>
          </div>
        </div>
<div class="row">
  <div class="col-md-12" >
    <fg-input type="email"
              label="البريد الإلكتروني"
              placeholder="البريد الإلكتروني"
              v-model="users.email">
    </fg-input>
  </div>
</div>






        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
            {{users.button_title}}
          </button>
        </div>

      </form>
    </div>
  </div>
</template>
<script>
  export default {
     props:['users'],
    methods: {
      updateProfile () {
        alert('Your data: ' + JSON.stringify(this.user))
      }
    }
  }

</script>
<style>

</style>

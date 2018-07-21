<template>
  <div class="card" style="margin:10px;margin-top: 22px;border-radius: 5px" >
    <div class="header">
      <h4 class="title">تحديث السيرة الذاتية</h4>
    </div>
    <div class="content" style="margin: 10px">
      <form style="padding: 10px">
        <div class="row">

          <div class="col-md-4">
            <fg-input type="text"
                      label="الاسم الأوسط"
                      :disabled="true"
                      placeholder="الاسم الأوسط"
                      v-model="user.middlename"
            >
            </fg-input>
          </div>
          <div class="col-md-4">
            <fg-input type="text"
                      label="الاسم الاول"
                      :disabled="true"
                      placeholder="الاسم الاول"
                      v-model="user.firstname"
            >
            </fg-input>
          </div>

          <div class="col-md-4">
            <fg-input type="text"
                      label="اللقب"
                      :disabled="true"
                      placeholder="اللقب"
                      v-model="user.lastname">
            </fg-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <fg-input type="text"
                      label="تاريخ الميلاد"
                      :disabled="true"
                      placeholder="تاريخ الميلاد"
                      v-model="user.Date_of_Birth">
            </fg-input>
          </div>
          <div class="col-md-6">
            <fg-input type="text"
                      label="مكان الميلاد"
                      :disabled="true"
                      placeholder="مكان الميلاد"
                      v-model="user.place_of_birth"
            >
            </fg-input>
          </div>

        </div>
        <div class="row">
          <div class="col-md-6">

            <fg-input type="text"
                      label="الرتبة في الفوج"
                      :disabled="true"
                      placeholder="الرتبة في الفوج"
                      v-model="user.rank"
            >
            </fg-input>
          </div>
          <div class="col-md-6">

            <fg-input type="text"
                      label="تاريخ الانخراط"
                      :disabled="true"
                      placeholder="تاريخ الانخراط"
                      v-model="user.Date_of_Engagement"
            >
            </fg-input>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" >
           <label style="float: right;font-size: medium">المعلومات الكشفية</label>
            <textarea dir="rtl" style="height: 7rem"></textarea>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12" >
            <label style="float: right;font-size: medium">المعلومات الشخصية</label>
            <textarea dir="rtl" style="height: 7rem"></textarea>
          </div>
        </div>





        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" @click.prevent="updateProfile">
            تحديث السيرة الذاتية
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
            lastname:'مويات',
            firstname:'براء',
            middlename:'عبد الاله',
            username: 'مويات براء عبد الاله',
            email: 'mouyet.19@gmail.com',
            rank: 'قائد الفوج',
            lastName: 'براء عبد الاله',
            place_of_birth: 'Sétif,Algeria',
            Date_of_Birth: '06/12/1996',
            Date_of_Engagement: '06/03/2006',


        }
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

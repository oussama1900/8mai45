<template>
    <div id="container" class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px;background-color:white" >
        <div class="card-header">

            <h4 class="title">الكتب</h4>
        </div>
       <div class="card-body" >
           <router-link class="btn btn-primary" to='/dashboard/books/New'>
               <span> كتاب جديد</span>
           </router-link>

           <div class="row" dir="ltr">

               <div  class="example-2 card col-md-5 col-xs-11 book-card" style="padding-right: 0px;
    padding-left: 0px;
    margin: 10px;

    "  v-for="book in Books">
                   <div class="wrapper"  style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) , url(/images/book.jpg) center / cover no-repeat;" v-if="book.picture.localeCompare('')===0">

                       <div class="header">
                           <div class="date" dir="rtl">
                               <span class="day">{{getDay(book)}}</span>
                               <span class="month">{{getMonth(book)}}</span>

                               <span class="year">{{getYear(book)}}</span>

                           </div>
                           <ul class="menu-content">
                               <li><router-link :to="'/dashboard/books/edit/'+book.id" class="fa fa-edit" style="text-decoration: none"></router-link></li>
                               <li>
                                   <a  class="fa fa-remove" style="text-decoration: none;cursor:pointer" @click="removeBook(book)"></a>
                               </li>


                           </ul>
                       </div>
                       <div class="data">
                           <div class="content">

                               <h1 class="title"><a  style="text-decoration: none;text-align: right">{{book.title}}</a></h1>
                               <div class="text" style="text-align: right" v-html="book.description"></div>
                               <a :href="'/uploads/Books/PDF/'+book.file" class="button"  style="text-align: right" :download="''+book.title">تحميل</a>
                           </div>
                       </div>
                   </div>
                   <div class="wrapper"  v-bind:style="{ background: 'linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)) ,url(/uploads/Books/Images/' + book.picture + ') 20% 1% / cover no-repeat' }"   v-else>

                       <div class="header">
                           <div class="date" dir="rtl">
                               <span class="day">{{getDay(book)}}</span>
                               <span class="month">{{getMonth(book)}}</span>

                               <span class="year">{{getYear(book)}}</span>

                           </div>
                           <ul class="menu-content">
                               <li><router-link :to="'/dashboard/book/edit/'+book.id" class="fa fa-edit" style="text-decoration: none"></router-link></li>
                               <li>
                                   <a  class="fa fa-remove" style="text-decoration: none;cursor:pointer" @click="removeBook(book)"></a>
                               </li>


                           </ul>
                       </div>
                       <div class="data">
                           <div class="content">

                               <h1 class="title"><a  style="text-decoration: none;text-align: right">{{book.title}}</a></h1>
                               <div class="text" style="text-align: right" v-html="book.description"></div>
                               <a :href="'/uploads/Books/PDF/'+book.file" class="button"  style="text-align: right" :download="''+book.title">تحميل</a>
                           </div>
                       </div>
                   </div>
               </div>




             <div v-if="Books.length===0">
                   <h3 class="label_title" > لا توجد كتب </h3>
               </div>
           </div>


           <loading
                   class="label_title"
                   :show="show"
                   :label="label">
           </loading>
           <sweet-modal ref="confirmation" icon="warning">
               <h3>هل أنت متأكد من حذف هذا الكتاب</h3>
               <h4> ملاحظة : هذه العملية غير رجعية</h4>
               <button id="cancel_button" class="btn btn-danger" style="margin:10px;margin-top:20px">لا</button>
               <button id="confirmation_button" class="btn btn-primary" style="margin: 10px;margin-top:20px" >نعم</button>

           </sweet-modal>
        </div>

    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    export default {
        components:{
            loading
        },
         created:function(){
          var vm =this;
          axios.get('/api/getBooks').then(function(response){
              vm.Books = response.data.books;
          })
        },
        data() {
            return {
                show: false,
                label: '....الرجاء الإنتظار',
                location:'',
                Books:[]
            }
        },
        methods:{
            getMonth(book){
                var month=["جانفي","فيفري","مارس","أفريل","ماي","جوان","جويلية","أوت","سبتمبر","أكتوبر","نوفمبر","ديسمبر"];
                var month_number = new Date(book.created_at).getMonth();
                console.log(month_number);
                 return month[month_number];
            },
            getDay(book){
                return new Date(book.created_at).getDate();
            },
            getYear(book){
                return  new Date(book.created_at).getFullYear();
            },
            removeBook(book){
                this.$refs.confirmation.open();
                var vm =this;
                $("#confirmation_button").unbind().click(function () {
                    vm.$refs.confirmation.close();
                    vm.show =  true;

                    axios.delete('/api/deleteBook/'+book.id).then(function (response) {
                        var position = vm.Books.indexOf(book);
                        vm.Books.splice(position,1);
                        vm.show = false;

                    });
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.confirmation.close();

                });

            },

        }



    }
</script>
<style lang="scss">

    // Variables
    $regal-blue: #034378;
    $san-juan: #2d4e68;
    $bermuda: #77d7b9;
    $white: #fff;
    $black: #000;


    // clear-fix mixin
    @mixin cf {
        &::before,
        &::after {
            content: '';
            display: table;
        }
        &::after {
            clear: both;
        }
    }

    * {
        box-sizing: border-box;
    }



    a {
        text-decoration: none;
    }

    h1 {

        font-weight: 300;
    }

    .row {
       // max-width: 900px;
       // margin: 50px auto 0;
    }

    // Base styles
    .book-card {
        float: left;
        padding: 0 1.7rem;
        //width: 30%;
        .menu-content {
            @include cf;
            margin: 0;
            padding: 0;
            list-style-type: none;
            li {
                display: inline-block;
            }
            a {
                color: $white;
            }
            span {
                position: absolute;
                left: 50%;
                top: 0;
                font-size: 10px;
                font-weight: 700;
                font-family: 'Open Sans';
                transform: translate(-50%, 0);
            }
        }
        .wrapper {
            background-color: $white;

            min-height: 350px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 19px 38px rgba($black, 0.3), 0 15px 12px rgba($black, 0.2);
            &:hover {
                .data {
                    transform: translateY(0);
                }
            }
        }
        .data {
            position: absolute;
            bottom: 0;
            width: 100%;
            transform: translateY(calc(70px + 1em));
            transition: transform 0.3s;
            .content {
                padding: 1em;
                position: relative;
                z-index: 1;
            }
        }
        .author {
            font-size: 12px;
        }
        .title {
            margin-top: 10px;
        }
        .text {
            height: 70px;
            margin: 0;
        }
        .text * {
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

        }
        input[type='checkbox'] {
            display: none;
        }
        input[type='checkbox']:checked + .menu-content {
            transform: translateY(-60px);
        }
    }


    // First example styles
    .example-1 {
        .wrapper {
            background: url(https://images.unsplash.com/photo-1496979551903-46e46589a88b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cda12b505afa1beb06e49d89014cbd65&auto=format&fit=crop&w=634&q=80) 20% 1% / cover no-repeat;
        }
        .date {
            position: absolute;
            top: 0;
            left: 0;
            background-color: $bermuda;
            color: $white;
            padding: 0.8em;
            span {
                display: block;
                text-align: center;
            }
            .day {
                font-weight: 700;
                font-size: 24px;
                text-shadow: 2px 3px 2px rgba($black, 0.18);
            }
            .month {
                text-transform: uppercase;
            }
            .month,
            .year {
                font-size: 12px;
            }
        }
        .content {
            background-color: $white;
            box-shadow: 0 5px 30px 10px rgba($black, 0.3);
        }
        .title {
            a {
                color: lighten($black, 50%);
            }
        }
        .menu-button {
            position: absolute;
            z-index: 999;
            top: 16px;
            right: 16px;
            width: 25px;
            text-align: center;
            cursor: pointer;
            span {
                width: 5px;
                height: 5px;
                background-color: lighten($black, 50%);
                color: lighten($black, 50%);
                position: relative;
                display: inline-block;
                border-radius: 50%;
                &::after,
                &::before {
                    content: '';
                    display: block;
                    width: 5px;
                    height: 5px;
                    background-color: currentColor;
                    position: absolute;
                    border-radius: 50%;
                }
                &::before {
                    left: -10px;
                }
                &::after {
                    right: -10px;
                }
            }
        }
        .menu-content {
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: -1;
            transition: transform 0.3s;
            transform: translateY(0);
            li {
                width: 33.333333%;
                float: left;
                background-color: $bermuda;
                height: 60px;
                position: relative;
            }
            a {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 24px;
            }
            span {
                top: -10px;
            }
        }
    }

    // Second example styles
    .example-2 {
        .wrapper {
            background: url(https://tvseriescritic.files.wordpress.com/2016/10/stranger-things-bicycle-lights-children.jpg) center / cover no-repeat;
            &:hover {
                .menu-content {
                    span {
                        transform: translate(-50%, -10px);
                        opacity: 1;
                    }
                }
            }
        }
        .header {
            @include cf;
            color: $white;
            padding: 1em;
            .date {
                float: left;
                font-size: 12px;
            }
        }
        .menu-content {
            float: right;
            li {
                margin: 0 5px;
                position: relative;
            }
            span {
                transition: all 0.3s;
                opacity: 0;
            }
        }
        .data {
            color: $white;
            transform: translateY(calc(70px + 4em));
        }
        .title {
            a {
                color: $white;
            }
        }
        .button {
            display: block;
            width: 100px;
            margin: 2em auto 1em;
            text-align: center;
            font-size: 12px;
            color: $white;
            line-height: 1;
            text-decoration:none;
            cursor:pointer;
            position: relative;
            font-weight: 700;
            &::after {
                content: '\2190';
                opacity: 0;
                position: absolute;
                font-size: 25px;
                right: 60%;
                top: 50%;
                transform: translate(50%, 100%);
                transition: all 0.3s;
            }
            &:hover {
                &::after {
                    transform: translate(5px, -50%);
                    opacity: 1;
                }
            }
        }
    }

</style>

<style scoped>

      .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 0px 0;
        font-size: 16px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
    .input-group-btn{
        float:right;
    }
    .btn-file{
        margin-top:0px;
    }
    .btn-file{

        margin-right:60%;
        width:150px;
        height:150px
    }
    i{
        font-size: 95px;
    }
    .col-md-4{
        float:right;
    }
    .image-card{
        height:200px;
        width:100%
    }
    .image-dimensions{
        width:100%;
        height:100%
    }
    .card-header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .card-header .title{
        color:white;
    }
    @media (max-width: 480px) {
        .icon{
            margin-right:-20px !important;
        }
        .container{
            margin: 22px 10px 10px 20px !important;
        }
        .icon {
            width: 70px;
            height: 70px;
        }


    }

    /*the medium size*/
    @media (max-width: 720px) {
        .icon{
            margin-right:-20px !important;
        }
        .container{
            margin: 22px 10px 10px 20px !important;
        }
        .icon {
            width: 70px;
            height: 70px;
        }


    }
    input[type="text"]{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding:5px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        width:95%;
    }

      input[type='checkbox'] {
          display: none;
      }
      input[type='checkbox']:checked + .menu-content {
          transform: translateY(-60px);
      }

    @media (min-width: 992px){
        .book-card{
            margin: 10px 10px 10px 50px !important;
        }
    }
    .button{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        font-size: 25px;
    }
    .date>span{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        font-size: 20px;
    }
    h1>a,loading{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    li>a{
        font-size:20px
    }
  h4{
      font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
  }
    span{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    h3{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }


</style>
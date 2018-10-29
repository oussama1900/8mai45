<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >
        <div class="header">

            <h4 class="title">كتاب جديد</h4>
        </div>

        <div class="card-body" dir="rtl">
            <div class="row" v-if="add_category">

                <div class="col-md-4 col-xs-4" style="margin-top: 30px;">
                    <button class="btn btn-success" @click="affectNewCategory">
                        <span class="fa fa-check"></span>
                    </button>
                    <button class="btn btn-danger" @click="removeCategory">
                        <span class="fa fa-remove"></span>
                    </button>
                </div>
                <div class="col-md-8 col-xs-8">
                    <label style="float:right;font-size:medium" class="label-style">اسم الفئة</label>
                    <input type="text" placeholder="اسم الفئة" v-model="new_category"/>
                </div>
            </div>
            <div v-if="enable_all" style="padding-right:10px;padding-left: 15px">
                <div class="row">
                    <div class="col-md-2 col-xs-2">
                        <button class="btn btn-success" style="margin-top:28px" @click="Addnew_Category">
                            <span class="fa fa-plus"></span>
                        </button>
                    </div>
                    <div class="col-md-10 col-xs-10">
                        <label style="float:right;font-size:medium"  for="categories" class="label-style">فئة الكتاب</label>
                        <select id="categories" class="form-control select-font" v-model="book_category">
                            <option v-for="category in Categories">{{category.category_name}}</option>
                        </select>
                    </div>


                </div>
                <div class="row" style="margin-left:10px">
                    <label style="float:right;font-size:medium" class="label-style">اسم الكتاب</label>
                    <input type="text" placeholder="اسم الكتاب" v-model="book_name"/>
                </div>
                <div class="row" style="margin-left:10px">
                    <label style="float:right;font-size:medium" class="label-style">الاسم  الكامل للمؤلف</label>
                    <input type="text" placeholder="الاسم  الكامل للمؤلف" v-model="author_name"/>
                </div>
                <div class="row">
                    <vue-editor v-model="description"></vue-editor>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="margin-top:30px" v-if="add">


                        <div class="input-group input-group-file"  style="z-index:0;float:right">
                               <span class="input-group-btn">
                            <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"   accept="application/pdf"
                                                   @change="setBook($event)"

                                                   id="pdftitle"
                                                   ng-model="titleImage">
                                        </span>



                                    </span>
                            <input   class="form-control" name="image_name"
                                     readonly="true"
                                     placeholder="حمل الكتاب"

                                     dir="rtl" >
                        </div>

                        <span id="pdf" style="float: right"></span>

                    </div>
                    <div class="col-md-6 col-xs-12" style="margin-top:30px">

                        <div v-if="book_image.localeCompare('')===0">
                            <img src="/images/book.jpg" style="height:80%;width:100%"/>
                        </div>
                        <div v-else-if="book_image.includes('Book')">
                            <img :src="'/uploads/Books/PDF/'+book_image" style="height:80%;width:100%" />
                        </div>
                        <div v-else>
                           <img :src="book_image" style="height:80%;width:100%" />
                        </div>
                        <div class="input-group input-group-file"  style="z-index:0;float:right">
                             <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"   accept="image/*"
                                                   @change="setBookImage($event)"

                                                   id="titleImage"
                                                   ng-model="titleImage">
                                        </span>
                                    </span>
                            <input   class="form-control" name="image_name"
                                     readonly="true"
                                     placeholder="اختر صورة الكتاب"

                                     dir="rtl" >

                        </div>
                        <span id="image" style="float: right"></span>

                    </div>


                </div>
                <div class="row">
                    <button class="btn btn-primary" @click="uploadbook" v-if="add">

                    <span class="fa fa-upload">

                    </span>
                        <span>
                            رفع الكتاب
                        </span>
                    </button>
                    <button class="btn btn-primary" v-else @click="editBookInfo">

                    <span class="fa fa-edit">

                    </span>
                        <span>
                            تعديل
                        </span>
                    </button>
                </div>


            </div>


        </div>
        <sweet-modal icon="warning" ref="empty_category">
            <h3>الرجاء ادخال اسم الفئة</h3>
        </sweet-modal>
        <sweet-modal icon="warning" ref="empty">
            <h3>الكتاب و فئة الكتاب اجباريان</h3>
        </sweet-modal>
        <sweet-modal icon="warning" ref="already_exists">
            <h3>هذه الفئة موجودة مسبقا</h3>
        </sweet-modal>
        <loading
                class="label-style"
                :show="show"
                :label="label">
        </loading>
        <sweet-modal ref="imagesize" icon="error">
            <h3><span>حجم الصورة كبير </span></h3>
            <h3> 4 <span>Mo</span> <span>حجم الصورة يجب ان يكون اقل من </span>    </h3>
        </sweet-modal>
        <sweet-modal ref="pdfsize" icon="error">

            <h3> 8 <span>Mo</span> <span>حجم الملف يجب ان لا يتجاوز </span>    </h3>
        </sweet-modal>
    </div>
</template>

<script>
    import { VueEditor } from 'vue2-editor';
    import loading from 'vue-full-loading';
    export default {
        components:{
            VueEditor,
            loading
        },
        name: "AddNewBook",
        created:function(){
            var vm =this;
            axios.get('/api/getCategories').then(function (response) {
                vm.Categories = response.data.categories;
            });
            if(this.$route.name.localeCompare('edit_book')===0){
                this.add = false;
                var vm =this;
                axios.get('/api/getBook/'+vm.$route.params.id).then(function (response) {

                    vm.Book = response.data.book;
                    vm.book_name = vm.Book.title;
                    vm.author_name = vm.Book.author;
                    vm.description = vm.Book.description;
                    vm.book_image = vm.Book.picture;
                    vm.book_category = vm.Book.category;
                });
            }

        },
        data(){
            return{
                book_name:'',
                author_name:'',
                new_category:'',
                description:'',
                book_category:'',
                book_image:"",
                book_pdf:'',
                add_category:false,
                Categories:[],
                Categories_temp:[],
                enable_all:true,
                Book:[],
                add:true,
                show: false,
                label: '....الرجاء الإنتظار',
            }
        },
        methods:{
            Addnew_Category(){
                this.add_category = true;
                this.enable_all = false;
            },
            affectNewCategory(){
                if(this.new_category.localeCompare('')===0)
                    this.$refs.empty_category.open();
                else{
                    for(var i =0;i<this.Categories.length;i++){
                        if(this.Categories[i].category_name.localeCompare(this.new_category)===0)
                        {
                            this.$refs.already_exists.open();
                            return;
                        }

                    }
                    this.Categories.push({id:this.Categories.length,category_name:this.new_category});
                    this.Categories_temp.push({id:this.Categories.length,category_name:this.new_category});
                    this.new_category="";
                    this.add_category = false;
                    this.enable_all = true;
                }

            },
            removeCategory(){

                this.add_category = false;
                this.enable_all = true;
            },
            setBookImage(e){
                var imagesize =((e.target.files[0].size)/1024)/1024;
                if(Math.floor(imagesize)<4){
                    var vm = this;
                    var filereader = new FileReader();
                    var img = new Image();

                    filereader.readAsDataURL(e.target.files[0]);
                    filereader.onload =(e)=>{



                        img.src = e.target.result;
                        img.onload = function() {

                            vm.book_image= e.target.result;

                        };

                    };
                }else{
                    this.$refs.imagesize.open();
                }

            },
            setBook(e){
                var pdfsize =((e.target.files[0].size)/1024)/1024;
                if(Math.floor(pdfsize)<8){
                    var vm = this;
                    var filereader = new FileReader();

                    filereader.readAsDataURL(e.target.files[0]);
                    filereader.onload =(e)=>{

                        vm.book_pdf= e.target.result;


                    };
                }else{
                    this.$refs.pdfsize.open();
                }

            },
            uploadbook(){

              if(this.book_pdf.localeCompare('')===0 || this.book_category.localeCompare('')===0){
                  this.$refs.empty.open();

              }else{
                  this.show = true;
                  var vm =this;
                  axios.put('/api/UploadBook',{
                      book_name:vm.book_name,
                      book_pdf:vm.book_pdf,
                      author_name:vm.author_name,
                      description:vm.description,
                      book_image:vm.book_image,
                      book_category:vm.book_category,
                      new_category:vm.Categories_temp,
                  }).then(function(response){
                      vm.show = false;
                      vm.$router.go(-1);
                  })
              }
            },
            editBookInfo(){
                this.show = true;
                var vm =this;
                axios.put('/api/EditBookInfo/'+vm.$route.params.id,{
                    book_name:vm.book_name,
                    author_name:vm.author_name,
                    description:vm.description,
                    book_image:vm.book_image,
                    book_category:vm.book_category,
                    new_category:vm.Categories_temp,
                }).then(function(response){
                    vm.show = false;
                    vm.$router.go(-1);
                })
            }
        }
    }
</script>

<style scoped>
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
 .select-font{
     font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
 }
    .label-style{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }

    input[type="text"]{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding:5px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    select{
        border: 1px solid #9C9C9C;
        border-radius: 7px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    h3{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }


</style>
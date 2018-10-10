<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >
        <div class="header">

            <h4 class="title">صور الصفحة الرئيسية</h4>
        </div>
        <div class="card-body" dir="rtl">
            <div class="col-md-4" v-for="element in landing_page">
                <div class=" card image-card" >
                    <img :src="'/images/Carousel/'+element.image" class="image-dimensions" v-if="element.image.includes('Carousel_Image')"/>
                    <img :src="element.image" class="image-dimensions" v-else/>


                </div>
                <input type="text" placeholder="وصف الصورة"  v-model="element.description" />
         <button class="btn btn-success" :id="'button'+element.id" @click="affectimage(element)" v-if="!element.image.includes('Carousel_Image')">
             <span class="fa fa-check btn-circle">

             </span>
         </button>
         <button class="btn btn-danger" @click="removeImage(element)">
             <span class="fa fa-remove btn-circle">

             </span>
         </button>

            </div>


            <div class=" col-md-4" >

                <div class="input-group input-group-file" style="margin-top:15px">
                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="true"  accept="image/*"  id="titleImage"
                                                   @change="addimage($event)"
                                            >

                                        </span>
                                    </span>
                </div>





            </div>
        </div>
        <sweet-modal ref="success" icon="success">
            <h3>تمت العملية بنجاح</h3>

        </sweet-modal>
        <sweet-modal ref="warning_alert" icon="warning">
            <h3>هل أنت متأكد</h3>
            <button id="cancel_button" class="btn btn-danger" style="margin:10px;margin-top:20px">لا</button>
            <button id="confirmation_button" class="btn btn-primary" style="margin: 10px;margin-top:20px" >نعم</button>

        </sweet-modal>
    </div>
</template>

<script>
    export default {
        name: "Landing_page_photos",
        data(){
            return{
                landing_page:[{
                    image:'',
                    description:''
                }],
                new_landing_page_elements:[]
            }
        },
        created:function(){
            var vm  =this;
            axios.get('/api/Landing_page_images').then(function (response) {
                vm.landing_page = response.data.landing_page;
            });
        },
        methods:{
            addimage(e){
                var  image_count=  e.target.files.length;
                var filereader = new Array();

                for(var i = 0 ;i<image_count;i++){
                    filereader.push(new FileReader());

                    filereader[i].readAsDataURL(e.target.files[i]);
                    filereader[i].onload =(e)=>{
                        this.landing_page.push({id:this.landing_page.length,image:e.target.result,description:''});
                        this.new_landing_page_elements.push({image:e.target.result,description:''});
                    };
                }
            },
            affectimage(element){
                this.$refs.warning_alert.open();
                var vm = this;
                $("#confirmation_button").unbind().click(function () {
                    axios.put('/api/addNewCarouselImage',{new_images:vm.landing_page}).then(function (response) {
                        $('#button'+element.id).hide();
                        $('#button'+element.id).attr("disabled", true);
                        vm.$refs.warning_alert.close();
                        vm.$refs.success.open();

                    })
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.warning_alert.close();

                })
            },
            removeImage(element){
                this.$refs.warning_alert.open();
                var vm =this;
                $("#confirmation_button").unbind().click(function () {

                    if(element.image.includes('Carousel_Image')){
                        axios.delete('/api/deleteCarouselImage/'+element.id).then(function (response) {
                            var position = vm.landing_page.indexOf(element);
                            vm.landing_page.splice(position,1);
                            vm.$refs.warning_alert.close();
                            vm.$refs.success.open();
                        })

                    }else{
                        var position = vm.landing_page.indexOf(element);
                        vm.landing_page.splice(position,1);
                        position = vm.new_landing_page_elements.indexOf(element);
                        vm.new_landing_page_elements.splice(position,1);
                        vm.$refs.warning_alert.close();
                    }
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.warning_alert.close();

                })

            }
        }
    }
</script>

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
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
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

        .card{
            margin-top: 17%;
            margin-left: 16px;
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

        .card{
            margin-top: 25%;
            margin-left: 25px;
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
</style>
<template>
    <div class="card card-user">
        <div class="image">

            <img src="images/governor.jpg"  width=100% alt="الخلفية">
            <div class="overlay">
                <div class="inputWrapper">
                    <i class="glyphicon glyphicon-picture" aria-hidden="true" style=" font-size: 20px;float:right;color:white"></i>
                      <span style="float:right;font-size:medium;padding-right:5px;color:white">حمل صورة</span>


                    <input class="fileInput" type="file" name="file1"/>
                </div>

            </div>


        </div>
        <div class="content">
            <div class="profile-picture">

                    <img class="avatar border-white" id="avatar" src="images/governor.jpg"  height="100" width="100px" alt="الصورة الشخصية">

                <h4 >مويات براء عبد الاله
                    <br>

                        <small>قائد الفوج</small>

                </h4>
            </div>
            <div>
              <div>
                  <ul  style="margin-bottom: 0px">
                      <li  style="background: grey;">
                          <span style="text-align: center;padding-right:10px;color:white;margin-top:5px" >المعلومات الشخصية</span>
                          <span class ="  icon-container glyphicon glyphicon-user btn btn-grey" style="float: right;height:35px"></span>
                      </li>
                      <li  style="background: grey;">
                          <span style="text-align: center;padding-right:10px;color:white">الاعدادات</span>
                          <span class ="  icon-container glyphicon glyphicon-cog btn btn-grey" style="float: right;height:35px"></span>
                      </li>
                      <li  style="background: grey;">
                          <span style="text-align: center;padding-right:10px;color:white">تعديل السيرة الذاتية</span>
                          <span class ="  icon-container glyphicon glyphicon-file btn btn-grey" style="float: right;height:35px"></span>
                      </li>
                      <li  style="background: grey;">

                          <span style="text-align: center;padding-right:10px;color:white">ربط الحساب</span>
                          <span class ="  icon-container glyphicon glyphicon-cloud btn btn-grey" style="float: right;height:35px"></span>
                      </li>


                  </ul>

              </div>

            </div>
        </div>
        <hr style="margin-bottom: 0px;margin-top: 0px">
        <div class="text-center" style="  display:inline;padding-bottom:20px">
            <ul style="  display: flex;
    justify-content:space-around;
    list-style-type:none;">
                <li>
                    <div >
                        <a href="#" class="fa fa-facebook"></a>


                    </div>
                </li>
                <li>
                    <div >
                        <a href="#" class="fa fa-instagram"></a>


                    </div>
                </li>
                <li>
                    <div >
                        <a href="#" class="fa fa-twitter"></a>


                    </div>
                </li>
            </ul>



            </div>
        </div>

</template>

<script>
    export default {
        name: "UserCard",


    }

</script>

<style scoped>
    #avatar{
        border:5px solid white;
        margin-top:-45px;
        width: 100px
    }
    li{
        height:40px;

        border-bottom: 2px solid white;
        text-align: right;
        padding-left:10px;
    }


    li:hover{

        cursor: pointer;

        font-size:16px;
    }
    .icon-container{


        height:30px;
        width:30px;
        padding-top:8px;
        padding-right:0px;
        padding-left:0px;
        margin:0px;
    }
    .fa {
        padding-top:15px;
        font-size: 15px;
        height:50px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }
    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-instagram {
        background: #125688;
        color: white;
    }

    .overlay {
       position: absolute;
        top: 0%;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        opacity: 1;
        overflow: hidden;
        width: 100%;
        height:0;
        transition: .5s ease;

    }


    .image:hover .overlay {
        bottom: 0;
        height: 8%;
    }
    .inputWrapper {
        height: 32px;
        padding:10px;
        width: 100%;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        float: right;
        background-color: transparent;

    }
    .fileInput {
        cursor: pointer;
        height: 100%;
        position:absolute;
        top: 0;
        right: 0;
        z-index: 99;
        /*This makes the button huge. If you want a bigger button, increase the font size*/
        font-size:50px;
        /*Opacity settings for all browsers*/
        opacity: 0;
        -moz-opacity: 0;
        filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
    }


</style>
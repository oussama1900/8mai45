@php
    $card_color = '#2b53ce';
    $news_style = 'style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;"';

   if (Route::currentRouteNamed('cubs')){
       $card_color = '#ffd700';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #FDEB71, #F8D800); radius: 5px;"';
   }
   if (Route::currentRouteNamed('scout')){
       $card_color = '#00cc00';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #FFF720, #3CD500); radius: 5px;"';
   }

   if (Route::currentRouteNamed('advanced_scout')){
       $card_color = '#701700';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #F05F57, #360940); radius: 5px;"';
   }

   if (Route::currentRouteNamed('traveler')){
       $card_color = '#ee2c2c';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #FEB692, #EA5455); radius: 5px;"';
   }
@endphp
<style>
    .btn-light{
        position: absolute;
        bottom:0px;
        left:10%;
        background: #f2f2f2;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);

        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-description-container{
        text-align: right;
    }
    .post-content{
        padding-top:35px !important;
    }
    .post-header>h5>span:first-child{
        padding: 5px;
        border-radius: 4px;
        color:white;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-header>h5>span:nth-child(2){
        padding: 5px;
        margin-right: 5px;
        color:grey;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-image{
        width: 100%;
        height: 270px;
        margin-top: 25px;
        border-radius: 4px;
    }
    .post-title>h2{
        margin-top:20px;
        margin-bottom:20px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-summary{
        margin-top:10px;
        margin-bottom:10px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-summary>p{
        color: #444444;
        font-weight: 400;
        text-align: right;
        font-size: 12pt;
        margin: 0;
        margin-bottom: 15px;
        line-height: 29px;
        height: 87px;
        overflow: hidden;
    }

    .container{
        margin:0px;
        width:100%
    }
    .row{
        margin:20px
    }
    .col-md-4{
        display: table-cell;
        margin: 0 auto;
        padding-right:0px;
        padding-left:0px;
        padding-bottom:10px
    }
    #scout,#ascout{
        margin-right: 0px;
        margin-left: 20%;

    }
    h4{
        padding:10px;

    }
    h3{
        padding:10px
    }
    .card{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }
    .units-container{
        margin-left:-80px
    }

</style>
<!-- events Showcases -->
<div class="container units-container">
    <div class="row">

       <div id="scout" class="col-md-4 col-xs-12 card">
           <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/18835730_1701449486822767_2312127021052390335_n.jpg?_nc_cat=110&_nc_ht=scontent-cdg2-1.xx&oh=cd825a0c4d827b279c38b8729d706544&oe=5C4062E0" style="width:100%;height:70%"/>
           <div style="text-align: center;width:100%">
               <h3 class="title" style="text-align: center;color:grey">الأشبال </h3>
               <h4 class="title" style="text-align: center;color:grey">أشبال اليوم أسود الغد </h4>
           </div>
       </div>
        <div id="cubs" class="col-md-4 col-xs-12 card">
            <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/15317884_1217054235027380_884187988169612518_n.jpg?_nc_cat=111&_nc_ht=scontent-cdg2-1.xx&oh=84458fbead630c953723cf4a1ca8502e&oe=5C4EFB9A" style="width:100%;height:70%"/>
            <div style="text-align: center;width:100%">
                <h3 class="title" style="text-align: center;color:grey">الكشاف </h3>
                <h4 class="title" style="text-align: center;color:grey">رجولة قبل أوانها</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div id="ascout" class="col-md-4 col-xs-12 card">
            <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/15747853_365391677156731_3331841953863618503_n.jpg?_nc_cat=104&_nc_ht=scontent-cdg2-1.xx&oh=8c42be2bb026a9e72a6971e26b2c9b95&oe=5C605B15" style="width:100%;height:70%"/>
            <div style="text-align: center;width:100%">
                <h3 class="title" style="text-align: center;color:grey">المتقدم </h3>
                <h4 class="title" style="text-align: center;color:grey">عالم واحد وعد واحد </h4>
            </div>
        </div>
        <div id="traveler" class="col-md-4 col-xs-12 card">
            <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/29026162_1946830968966414_2509464539678900224_n.jpg?_nc_cat=104&_nc_ht=scontent-cdg2-1.xx&oh=51d562736240a7940bc2b8028857c7eb&oe=5C41A84C" style="width:100%;height:70%"/>
            <div style="text-align: center;width:100%">
                <h3 class="title" style="text-align: center;color:grey">الجوالة </h3>
                <h4 class="title" style="text-align: center;color:grey">مغامرون يعشقون العطاء </h4>
            </div>
        </div>
    </div>
</div>


<template>


  <li style="width:100%;color:black;margin-right:0px;padding-top:10px;padding-bottom:10px" ><!-- start message -->
      <hr style="margin: 0px;" v-if="index!=0">
         <a  style="background-color: white;text-decoration:none;padding-right:5px;padding-left:5px">

      <div class="pull-right">
<div v-if="fromDB(notification)" >
      <img :src="'/images/EventImages/'+ notification.data.data[1]" class="img-circle" width="50px" height="50px"alt="صورة الحدث" style="margin-left:5px;"  v-if="is_Event(notification)">
  <img :src="'/images/PostCover/'+ notification.data.data[1]" class="img-circle" width="50px" height="50px"alt="صورة الخبر" style="margin-left:5px;" v-else-if="notification.data.data[1].includes('PostCover')">
    <img :src="notification.data.data[1]" class="img-circle"  width="50px" height="50px"  style="margin-left:5px;" v-else/>
</div>
<div v-else>
      <img :src="'/images/EventImages/'+ notification.data[1]" class="img-circle" width="50px" height="50px"alt="صورة الحدث" style="margin-left:5px;"  v-if="is_Event(notification)">
  <img :src="'/images/PostCover/'+ notification.data[1]" class="img-circle" width="50px" height="50px"alt="صورة الحدث" style="margin-left:5px;" v-else-if="notification.data[1].includes('PostCover')">
    <img :src="notification.data[1]" class="img-circle"  width="50px" height="50px"  style="margin-left:5px;" v-else/>
</div>
	    </div>
      <h4 style="text-align:right">
         <span style="font-size:medium" v-if="fromDB(notification)" class="notification_title">{{notification.data.type}}</span>
                                     <span style="font-size:medium" v-else class="notification_title">{{notification.notificationtype}}</span>
           <small  class="pull-left" style="text-align:right;height:40px;margin-top: -20px;margin-right:0px"  v-if="fromDB(notification)">
               <i class="fa fa-clock-o"></i>
							 <small v-if="is_Event()" class="notification_title">    {{notification.data.data[2]}}</small>
 							<small v-else class="notification_title">    {{notification.data.data[2].date.slice(0, 19)}}</small>

             </small>
             <small  class="pull-left" style="text-align:right;height:40px;margin-top: -20px;margin-right:0px"  v-else>
                 <i class="fa fa-clock-o"></i>
              <small v-if="is_Event()" class="notification_title">    {{notification.data[2]}}</small>
							<small v-else class="notification_title">    {{notification.data[2].date.slice(0, 19)}}</small>
               </small>

          <p v-if="fromDB(notification)">
              <small style="text-align:right" class="notification_title">{{notification.data.data[0]}}</small>
          </p>
          <p v-else>
              <small style="text-align:right" class="notification_title">{{notification.data[0]}}  </small>
          </p>
             </h4>

                </a>

   </li>







              <!--end-->


</template>

<style scoped>
#not:hover{
background-color:white
}
    .notification_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
</style>


<script>
export default{
props:['notification','index'],

data(){
return{

}
},
methods:{
  fromDB(notification){
    if(this.notification.data[0]===undefined || this.notification.data[1]===undefined || this.notification.data[2]===undefined){

        return true;
    }else{


        return false;
    }


},
is_Event(notification){
	if(this.notification.data[0]===undefined){
		if(this.notification.data.data[1].includes('PostCover') || this.notification.data.data[1].includes('Report')){
			
			return false;
		}
		return true;
	}else{
		if(this.notification.data[1].includes('PostCover') || this.notification.data[1].includes('Report')){
			return false;
		}
		return true;
	}
	}

},
}

</script>

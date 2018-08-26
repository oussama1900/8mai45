<template>


  <li style="width:100%;color:black;margin-right:0px;padding-top:10px;padding-bottom:10px" ><!-- start message -->
      <hr style="margin: 0px;">
         <a  style="background-color: white;text-decoration:none">

      <div class="pull-right">

      <img :src="'/images/EventImages/'+ notification.data.data[1]"class="img-circle" width="50px" height="50px"alt="صورة الحدث" style="margin-left:5px;" v-if="fromDB(notification)">
  <img :src="'/images/EventImages/'+ notification.data[1]"class="img-circle" width="50px" height="50px"alt="صورة الحدث" style="margin-left:5px;" v-else>
      </div>
      <h4 style="text-align:right">
  (<span> حدث جديد(</span>         <span style="font-size:medium" v-if="fromDB(notification)">{{notification.data.type}}</span>
                                     <span style="font-size:medium" v-else>{{notification.notificationtype}}</span>
           <small  class="pull-left" style="text-align:right;height:40px;margin-top: -20px;margin-right:0px"  v-if="fromDB(notification)">
               <i class="fa fa-clock-o"></i>
                {{notification.data.data[2]}}
             </small>
             <small  class="pull-left" style="text-align:right;height:40px;margin-top: -20px;margin-right:0px"  v-else>
                 <i class="fa fa-clock-o"></i>
                  {{notification.data[2]}}
               </small>

          <p v-if="fromDB(notification)">
              <small style="text-align:right">{{notification.data.data[0]}}  </small>
          </p>
          <p v-else>
              <small style="text-align:right">{{notification.data[0]}}  </small>
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
</style>


<script>
export default{
props:['notification'],

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


}
},
}

</script>

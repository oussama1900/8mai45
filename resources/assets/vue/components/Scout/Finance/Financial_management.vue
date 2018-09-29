<template>
  <div class="container" style="background-color: #e6f2ff">
    <div class="container col-md-7 col-sm-11 col-xs-11 text-center card"  style="margin:10px;margin-top: 80px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

			<div class="header" style="margin-bottom:10px">
				<h4 style="text-align:center;	color:#fff;">
		حالة الصندوق لشهر 	{{getCurrent_month()}}
				</h4>
			</div>
             <monthly-line-chart></monthly-line-chart>

</div>
<div class="col-md-4 card" style="margin:10px;margin-top: 80px;border-radius: 5px;padding:0px">
  <div class="header" style="margin-bottom:10px">
    <h4 style="text-align:center;	color:#fff;">
    ادارة الأموال
    </h4>
  </div>
	<ul style="padding:10px;margin-bottom:10px;padding-right:15px;padding-left:15px" >
		<li>
			<label style="float:right;font-size:medium">كمية الأموال</label>
			<input type="text" id="money_in" placeholder="كمية الأموال" dir="rtl" style="padding-top:5px;padding-bottom:5px" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" v-model="money">
			<span id="money_quantity" ></span>
			<span></span>
		</li>
		<li>
			<div style="text-align:center">
				<button id="money_enter" class="btn btn-default" style="border-radius: 5px" @click="money_type('money_in')">أموال داخلة</button>
				<button id="money_out"  class="btn btn-default" style="border-radius: 5px" @click="money_type('money_out')">أموال خارجة</button>
			</div>






		</li>
		<li>
			<label style="float:right;font-size:medium">تاريخ المعاملة</label>

			<datetime type="date" v-model="date" format="yyyy-MM-dd" :placeholder="placeholder" :dir="direction" style="margin-right:-10px"></datetime>
			<span id="transaction_date" ></span>
			<span></span>
		</li>
		<li>
			<label style="float:right;font-size:medium">توضيحات</label>

			<input type="text" id="description" placeholder="توضيحات" dir="rtl" style="padding-top:5px;padding-bottom:5px" v-model="description">
			<span id="transaction_description" ></span>
			<span></span>
		</li>

	<li style="text-align:center">
   <button class="btn btn-primary" @click="update_money()">
		 حفظ
	 </button>
 </li>
</ul>
</div>
<div class="container col-md-11 col-sm-11 col-xs-11 text-center card"  style="margin:10px;margin-top: 80px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >
	<div class="header" style="margin-bottom:10px">
		<h4 style="text-align:center;	color:#fff;">
	{{getCurrent_year()}}		حالة الصندوق لعام
		</h4>
	</div>

		<year-line-chart></year-line-chart>

</div>

	  <sweet-modal ref="not_valid" icon="warning">
		  <h3>لم تقم بملئ جميع المعلومات اللازمة   </h3>  <h3> الرجاء التأكد من المعلومات التي قمت بادخالها  </h3>


	  </sweet-modal>
</div>

</template>
<script>

    import { Datetime } from 'vue-datetime';
    import 'vue-datetime/dist/vue-datetime.css'
  export default {
    data(){
			return{
			    direction:"rtl",
				placeholder:"تاريخ المعاملة",

				money:'',
				description:'',
				date:'',
				money_state:'',

			}
		},
		methods:{
        validate(){
          if(this.money.localeCompare("")===0 || this.description.localeCompare("")===0 || this.date.localeCompare("")===0){
             this.$refs.not_valid.open();
              if(this.money.localeCompare("")===0 ){
                  $('#money_quantity').html('كمية الأموال اجبارية').css('color', 'red');
			  }else{
                  $('#money_quantity').html('');
			  }
              if(this.description.localeCompare("")===0 ){
                  $('#transaction_description').html('عليك ملئ خانة الوصف ').css('color', 'red');
              }else{
                  $('#transaction_description').html('');
			  }
              if(this.date.localeCompare("")===0 ){
                  $('#transaction_date').html('تاريخ المعاملة اجباري ').css('color', 'red');
              }else{
                  $('#transaction_date').html('');
			  }
              return false;
		  }
		  return true
		},
			update_money(){
            if(this.validate()){
                var vm =this;
                axios.post('/api/update_money',{money:vm.money,description:vm.description,date:vm.date,money_state:vm.money_state}).then(function(response){
                    location.reload();
                });
			}


		 },
		 getCurrent_month(){
			 var date = new Date();
			 const monthNames = ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان",
					 "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
			 ];
			 return monthNames[date.getMonth()];

		 },
		 getCurrent_year(){
			 var date = new Date();

			  return date.getFullYear();
		 },
            money_type(state){
               if(state.localeCompare("money_in")===0){
                   $('#money_out').removeClass('btn-success');
               $('#money_enter').toggleClass('btn-success');
               this.money_state=true;

			   }else{
                   if(state.localeCompare("money_out")===0){
                       $('#money_enter').removeClass('btn-success');
                       $('#money_out').toggleClass('btn-success');
                       this.money_state=false;
				   }
			   }

			}
		}

  }
</script>

<style>

#money_quantity,#transaction_description,#transaction_date{
		width:100%;
		float:right;
		text-align:right;
		margin-top:-5px;
		margin-bottom:3px
	}
#money_in,#description{
  border-top: 1px solid #9C9C9C;
  border-right: 1px solid #9C9C9C;
  border-left: 1px solid #9C9C9C;
  border-radius: 7px;
  margin-right:5px;



	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 10px;
	padding-right: 10px;
	margin-left: -12px;
}
.header{
		background-color: rgb(51, 181, 229);
		backdrop-filter: blur(5px);
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;


}
</style>

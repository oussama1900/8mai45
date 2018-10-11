<template>
  <div class="container col-md-12 col-sm-11 col-xs-12" style="background-color: #e6f2ff">
    <div class="container col-md-7 col-sm-11 col-xs-12 text-center card"  style="margin:10px;margin-top: 80px;border-radius: 5px;margin-left: 10px;padding-left: 0px;padding-right: 0px" >

			<div class="header" style="margin-bottom:10px">
				<h4 style="text-align:center;	color:#fff;" class="label_title">
		حالة الصندوق لشهر 	{{getCurrent_month()}}
				</h4>
			</div>
		<div class ="row" style="width:100%">
			<div class="col-md-4 col-xs-11 card pull-right" style="display: inline-block">
				<p>
					<span class="label_title">القيمة الحالية</span>
                    <span class="label_title">{{current_price}}</span>
				</p>
			</div>
			<div class="col-md-4 col-xs-11 card pull-left" style="  display: inline-block;margin-left:20px">
				<p>
                    <span class="label_title">القيمة قبل اخر معاملة</span>
                    <span class="label_title">{{last_price}}</span>
                </p>
			</div>

		</div>
             <monthly-line-chart></monthly-line-chart>

</div>
<div class="col-md-4 col-xs-12 card" style="margin:10px;margin-top: 80px;border-radius: 5px;padding:0px">
  <div class="header" style="margin-bottom:10px">
    <h4 style="text-align:center;	color:#fff;" class="label_title">
    ادارة الأموال
    </h4>
  </div>
	<ul style="padding:10px;margin-bottom:10px;padding-right:15px;padding-left:15px" >
		<li>
			<label style="float:right;font-size:medium" class="label_title">كمية الأموال</label>
			<input class="label_title" type="text" id="money_in" placeholder="كمية الأموال" dir="rtl" style="padding-top:5px;padding-bottom:5px" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" v-model="money">
			<span id="money_quantity" class="label_title"></span>
			<span></span>
		</li>
		<li>
			<div style="text-align:center" class="label_title">
				<button id="money_enter" class="btn btn-default label_title" style="border-radius: 5px" @click="money_type('money_in')" >أموال داخلة</button>
				<button id="money_out"  class="btn btn-default label_title" style="border-radius: 5px" @click="money_type('money_out')">أموال خارجة</button>
			</div>






		</li>
		<li>
			<label style="float:right;font-size:medium" class="label_title">تاريخ المعاملة</label>

			<datetime class="label_title" type="date" v-model="date" format="yyyy-MM-dd" :placeholder="placeholder" :dir="direction" style="margin-right:-10px"></datetime>
			<span id="transaction_date" class="label_title"></span>
			<span></span>
		</li>
		<li>
			<label style="float:right;font-size:medium" class="label_title">توضيحات</label>

			<input class="label_title" type="text" id="description" placeholder="توضيحات" dir="rtl" style="padding-top:5px;padding-bottom:5px" v-model="description">
			<span id="transaction_description" class="label_title"></span>
			<span></span>
		</li>

	<li style="text-align:center">
   <button class="btn btn-primary" @click="update_money()">
		<span class="label_title">حفظ</span>
	 </button>
 </li>
</ul>
</div>




	  <div class="container col-md-12 col-sm-12 col-xs-12 text-center card"  style="margin:10px;margin-top: 80px;border-radius: 5px;margin-left: 10px;padding-left: 0px;padding-right: 0px" >
	<div class="header" style="margin-bottom:10px">
		<h4 style="text-align:center;	color:#fff;" class="label_title">
	{{getCurrent_year()}}		حالة الصندوق لعام
		</h4>
	</div>

		<year-line-chart></year-line-chart>

</div>

	  <sweet-modal ref="not_valid" icon="warning">
		  <h3 class="label_title">لم تقم بملئ جميع المعلومات اللازمة   </h3>  <h3 class="label_title"> الرجاء التأكد من المعلومات التي قمت بادخالها  </h3>


	  </sweet-modal >
	  <sweet-modal icon="success" ref="success">
		  <h3 class="label_title">تمت العملية بنجاح</h3>
	  </sweet-modal>
	  <loading
			  class="label_title"
			  :show="show"
			  :label="label">
	  </loading>
</div>

</template>
<script>

    import { Datetime } from 'vue-datetime';
    import 'vue-datetime/dist/vue-datetime.css'
    import loading from 'vue-full-loading';
  export default {
      components:{
          loading
	  },
    data(){
			return{
                show: false,
                label: '....الرجاء الإنتظار',
			    direction:"rtl",
				placeholder:"تاريخ المعاملة",
                 clicked:false,
				money:'',
				description:'',
				date:'',
				money_state:'',
				current_price:'',
				last_price:'',

			}
		},
      created:function(){
          var vm = this;
        axios.get('/api/GetMoneyFundInfo').then(function (response) {
            vm.current_price = response.data.current_price;
            vm.last_price = response.data.last_price;
        });
      },
		methods:{
        validate(){
          if(this.money.localeCompare("")===0 || this.description.localeCompare("")===0 || this.date.localeCompare("")===0 || this.clicked===false){
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
                this.show =true;
                this.clicked = false;
                axios.post('/api/update_money',{money:vm.money,description:vm.description,date:vm.date,money_state:vm.money_state}).then(function(response){
                    $('#money_enter').removeClass('btn-success');
                    $('#money_out').removeClass('btn-success');
                    vm.money ="";
                    vm.description="";
                    vm.date="";
                    vm.show = false;

                  vm.$refs.success.open();
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
                this.clicked = true;
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
.title{
	font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

}
	.label_title{
		font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

	}
</style>

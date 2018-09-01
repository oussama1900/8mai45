<template>
	<div class="page-content padding-20 container-fluid" style="background-color: #e6f2ff">
		<div class="row" data-plugin="matchHeight" data-by-row="true" style="margin-top:20px">
			<!-- First Row -->
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel " style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable">
           <div class="row">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa-calendar-minus-o " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد الأحداث</span>
					 </div>


					   <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >200</p>
	             <p class="text-center" >حدث</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa fa-upload " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد المنشورات</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >15</p>
							 <p class="text-center" >منشور</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa fa-eye " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد الزوار</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >30644565255525</p>
							 <p class="text-center" >زائر</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa fa-user " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد الحسابات</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >12</p>
							 <p class="text-center" >حساب</p>
						 </div>
					</div>
				</div>
			</div>
			<!-- End First Row -->
		</div>
<div class="row">
	<div class="col-md-6 card" style="margin-left:10px;padding-right: 0px;padding-left: 0px;margin-left: 0px;margin-top: 25px;">

		<Calendar startDate="2018-08-01" :dateData="data">


		  <div

		    slot-scope="item"
				  :class="['calendar-item', { 'is-otherMonth': !item.isCurMonth }]"
		  >
		    <div
		      :class="['calendar-item-date']" style="text-align:right;padding-right:5px">
		      {{item.date.date}}
		    </div>
		    <div class="calendar-item-name " v-if="show(item)" style="text-align:center;background-color: rgb(51, 181, 229);
		    backdrop-filter: blur(5px);font-size:10px;" >{{item.data[0].title}}</div>
		  </div>
		</Calendar>
	</div>

	<div class=" col-md-6 " style=";padding-left: 0px;padding-right: 0px;margin-top: 25px;">

		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
	<center style="	padding-top: 25px;">
			<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="post_event">
				<i class="fa-calendar-minus-o " aria-hidden="true" ></i>
			</button>
		</center>
			 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold">
											 نشر حدث
										</p>
									</div>


			<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
		<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="post_news">
					<i class="fa fa-upload " aria-hidden="true" ></i>
				</button>
			</center>
				 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold">
									نشر خبر
											</p></div>
						 </div>
						 <div class=" col-md-6 " style=";padding-left: 0px;padding-right: 0px;">

					 		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
					 	<center style="	padding-top: 25px;">
					 			<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myprofile">
					 				<i class="fa fa-user " aria-hidden="true" ></i>
					 			</button>
					 		</center>
					 			 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold">
					 											ملفي الشخصي
					 										</p>
					 									</div>


					 			<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
					 		<center style="padding-top: 25px;">
					 				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="my_events">
					 					<i class="fa fa-calendar-minus-o " aria-hidden="true" ></i>
					 				</button>
					 			</center>
					 				 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold" >
					 								    أحداثي
					 											</p></div>
					 						 </div>
											 <div class=" col-md-6 " style=";padding-left: 0px;padding-right: 0px">

												<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
											<center style="	padding-top: 25px;">
													<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="agree_events">
														<i class="fas fa-check " aria-hidden="true" ></i>
													</button>
												</center>
													 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold" >
																					الموافقة على حدث
																				</p>
																			</div>


													<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
												<center style="padding-top: 25px;">
														<button type="button" class="btn btn-floating btn-sm btn-primary center">
															<i class="fas fa-binoculars " aria-hidden="true" ></i>
														</button>
													</center>
														 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold" @click="scouts">
																			الكشافين
																					</p></div>
																 </div>
																 <div class=" row " style=";padding-left: 0px;padding-right: 0px;">

																	<div  class="col-md-5 card" style="padding: 0px;height: 112px;margin-left: 30px;margin-top: 0px;text-align:center" >
																<center style="	padding-top: 25px;">
																		<button type="button" class="btn btn-floating btn-sm btn-primary center">
																			<i class="fas fa-bullhorn " aria-hidden="true" ></i>
																		</button>
																	</center>
																		 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;font-style:bold" >
																									المنتدى
																									</p>
																								</div>





																					 </div>


</div>




	<!--		<div class="col-xl-3 col-lg-6">
	                 <section class="card">
	                     <div class="twt-feed blue-bg" style="background-color:#58C9F5;padding:20px">


	                         <div class="media" >
	                             <a href="#">
	                                 <img class="align-self-center rounded-circle  img-circle mr-3" style="width:85px; height:85px; float:right" alt="" src="images/default.png">
	                             </a>
	                             <div class="media-body" style="padding-right:10px">
	                                 <h2 class="text-white display-6" style="color:white;text-align:right">مويات براء عبد الاله</h2>
	                                 <p class="text-light" style="color:white;text-align:right">محافظ الفوج</p>
	                             </div>
	                         </div>
	                     </div>
	                     <div class="weather-category twt-category" style="display: inline; ">
	                       <div class="row">
                         <div  class="col-md-3"  style="text-align:center">
                            تاريخ الميلاد
													 <h5>1998-03-14</h5>
												</div>
												 <div   class="col-md-3"  style="text-align:center">
													 رقم الهاتف
													 <h5>0668-15-41-45</h5>
													</div>
												 <div   class="col-md-3"  style="text-align:center">
                                رقم التأمين
													  <h5>35265</h5>
														</div>
														<div  class="col-md-3" style="text-align:center">
																	 الوضعي في الفوج
															 <h5>قائد</h5>
															 </div>
												 </div>
	                     </div>

	                 </section>
	             </div>-->
	</div>
</template>


<style scoped>



	.icon{
		max-width: 100px;
		width: 100px;
		height: 100px;
		margin: 1% auto;/*1% top to buttom auto to center it*/

	}
	.card{
		margin-top:7%;
		margin-left: 75px;
		background-color: white;
	}



	h2 {font-size: 1.7em;}

	h4{font-size: 1.0em}

	/*the small size*/
	@media (max-width: 480px) {
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
		.icon {
			width: 70px;
			height: 70px;
		}

		.card{
			margin-top: 25%;
			margin-left: 25px;
		}
	}

.calendar-item-name{
	padding:5px;
	border-radius: 10px;
/*	background-color: #1ee81e;*/
	background-color:#ff3dff;
	color:white
}
.body{
	font-size:12px
}

</style>

<script>
import Calendar from 'vue2-event-calendar/dist/calendar-nodep.js'
import data from 'vue2-event-calendar/dev/data.js'

import 'vue2-event-calendar/default.css';
	export default{
		data(){
			return{
				data:[],
			}
		},
created:function(){
	var vm =this;
axios.get('/api/getCalenderEvents').then(function(response){

	var calendar_event = response.data.CalenderEvents;
calendar_event.forEach(function(element) {
	var date = element.event_time.split(' ')[0];
vm.data.push({date:date,title:element.type});
});
});
},
		components:{
	Calendar
},
// ...
methods: {
	show(item){
		if(item.data[0]===undefined){
			return false;
		}else{

			return true
		}

	},
	renderHeader({ prev, next, selectedDate }) {
		const h = this.$createElement

		const prevButton = h('div', {
			on: {
				click: prev
			}
		}, ['prev'])

		const nextButton = h('div', {
			on: {
				click: next
			}
		}, ['next'])

		return h('div', [prevButton, selectedDate, nextButton])
	},
	post_event(){
		this.$router.push('/events/new');
	},
	post_news(){
		this.$router.push('/posts/new');
	},
	my_events(){
		this.$router.push('/Events/MyEvents');
	},
	myprofile(){
		this.$router.push('/myprofile');
	},
	agree_events(){
		this.$router.push('/Events/ApproveEvents');
	},
	scouts(){
		this.$router.push('/my_scout');
	}
}
	}
</script>

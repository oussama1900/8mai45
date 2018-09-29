<template>
	<div class="page-content padding-20 container-fluid" style="background-color: #e6f2ff">
		<div class="row" data-plugin="matchHeight" data-by-row="true" style="margin-top:20px" >
			<!-- First Row (for ucap,vucp,capa,trne) -->
			<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;">
				<div class=" widget widget-shadow ">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
					 <div class="row">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa-calendar-minus-o " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">أحداثي</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{nbr_of_events}}</p>
							 <p class="text-center" >حدث</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="show_my_post_number()">
			<div class=" widget widget-shadow ">
				<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
					<div class="row">
						<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							<i class="fa fa-upload " aria-hidden="true" ></i>
						</button>
						<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">منشوراتي</span>
					</div>


					<div class="row" style="margin-top:-10px">
						<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{nbr_of_posts}}</p>
						<p class="text-center" >خبر</p>
					</div>
				</div>
			</div>
		</div>

			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;"  v-if="has_unit()">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa fa-upload " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> منشورات الوحدة </span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{count_unit_post}}</p>
							 <p class="text-center" >منشور</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;" v-if="has_unit()">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="fa fa-user " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد {{unit_name}}</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{count_unit_scout}}</p>
							 <p class="text-center" >{{single}}</p>
						 </div>
					</div>
				</div>
			</div>
		<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
		<div class=" widget widget-shadow ">
			<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
				<div class="row">
					<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
						<i class="fa fa-upload " aria-hidden="true" ></i>
					</button>
					<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">منشورات اليوم</span>
				</div>


				<div class="row" style="margin-top:-10px">
					<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{today_posts}}</p>
					<p class="text-center" >منشور</p>
				</div>
			</div>
		</div>
	</div>

			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;" v-if="this.current_user.localeCompare('fin')===0 || this.current_user.localeCompare('gov')===0 ">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="	glyphicon glyphicon-usd" aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> الصندوق</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{money_fund}}</p>
							 <p class="text-center" >دينار جزائري</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('vgov')===0 || current_user.localeCompare('surv')===0">
				<div class=" widget widget-shadow ">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
						<div class="row">
							<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
								<i class="fa fa-wpforms " aria-hidden="true" ></i>
							</button>
							<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> التقارير الواردة </span>
						</div>


						<div class="row" style="margin-top:-10px">
							<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{nbr_of_reports}}</p>
							<p class="text-center" >تقرير</p>
						</div>
					</div>
				</div>
			</div>




			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;" v-if="current_user.localeCompare('gov')===0 ||  current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0 ">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
						<div class="row" style="margin-right:-10px">
							<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
								<i class="fa fa-eye " aria-hidden="true" ></i>
							</button>
							<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">عدد الزوار اليوم</span>
						</div>


						<div class="row" style="margin-top:-10px">
							<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{today_visitors}}</p>
							<p class="text-center" >زائر</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
			<div class=" widget widget-shadow ">
				<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
					<div class="row">
						<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							<i class="fa fa-upload " aria-hidden="true" ></i>
						</button>
						<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> منشورات هذا الأسبوع</span>
					</div>


					<div class="row" style="margin-top:-10px">
						<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
		white-space: nowrap;" >{{this_week_post}}</p>
						<p class="text-center" >منشور</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
		<div class=" widget widget-shadow ">
			<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
				<div class="row">
					<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
						<i class="fa fa-eye " aria-hidden="true" ></i>
					</button>
					<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">عدد الزوار هذا الأسبوع</span>
				</div>


				<div class="row" style="margin-top:-10px">
					<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
		white-space: nowrap;" >{{this_week_visitors}}</p>
					<p class="text-center" >زائر</p>
				</div>
			</div>
		</div>
		</div>
		<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
		<div class=" widget widget-shadow ">
			<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
				<div class="row">
					<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
						<i class="fa fa-upload " aria-hidden="true" ></i>
					</button>
					<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">منشورات هذا الشهر</span>
				</div>


				<div class="row" style="margin-top:-10px">
					<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
	white-space: nowrap;" >{{this_month_posts}}</p>
					<p class="text-center" >منشور</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
	<div class=" widget widget-shadow ">
		<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
			<div class="row">
				<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
					<i class="fa fa-eye " aria-hidden="true" ></i>
				</button>
				<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">عدد الزوار هذا الشهر</span>
			</div>


			<div class="row" style="margin-top:-10px">
				<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
	white-space: nowrap;" >{{this_month_visitors}}</p>
				<p class="text-center" >زائر</p>
			</div>
		</div>
	</div>
	</div>
			<div class="col-lg-3 col-sm-6 col-xs-12  info-panel " style="height: 187px;" v-if="current_user.localeCompare('vgov')===0">
				<div class=" widget widget-shadow ">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;"   >
						<div class="row">
							<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
								<i class="fa fa-users " aria-hidden="true" ></i>
							</button>
							<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد الكشافين  </span>
						</div>


						<div class="row" style="margin-top:-10px">
							<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{nbr_of_scouts}}</p>
							<p class="text-center" >كشاف</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;" v-if="finance()">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="glyphicon glyphicon-usd " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">الصندوق هذا الأسبوع </span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{this_week_money}}</p>
							 <p class="text-center" >دينار جزائري</p>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;" v-if="finance()">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
					 <div class="row" style="margin-right:-10px">
						 <button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							 <i class="glyphicon glyphicon-usd " aria-hidden="true" ></i>
						 </button>
						 <span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">الصندوق هذا الشهر</span>
					 </div>


						 <div class="row" style="margin-top:-10px">
							 <p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{this_month_money}}</p>
							 <p class="text-center" >دينار جزائري</p>
						 </div>
					</div>
				</div>
			</div>

		</div>
		<div class="row" data-plugin="matchHeight" data-by-row="true" style="margin-top:20px" v-if="has_unit()">
			<!-- First Row (for ucap,vucp,capa,trne) -->



		</div>
		<div class="row" data-plugin="matchHeight" data-by-row="true" style="margin-top:20px" v-if="current_user.localeCompare('gov')===0">
			<!-- First Row -->
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel " style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
						<div class="row">
							<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
								<i class="fa-calendar-minus-o " aria-hidden="true" ></i>
							</button>
							<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">جميع الأحداث</span>
						</div>


						<div class="row" style="margin-top:-10px">
							<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{nbr_of_events}}</p>
							<p class="text-center" >حدث</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
						<div class="row" style="margin-right:-10px">
							<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
								<i class="fa fa-upload " aria-hidden="true" ></i>
							</button>
							<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">جميع المنشورات</span>
						</div>


						<div class="row" style="margin-top:-10px">
							<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{nbr_of_posts}}</p>
							<p class="text-center" >منشور</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;">
			<div class="widget widget-shadow">
				<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
					<div class="row" style="margin-right:-10px">
						<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
							<i class="fa fa-lock " aria-hidden="true" ></i>
						</button>
						<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;"> عدد الحسابات</span>
					</div>


					<div class="row" style="margin-top:-10px">
						<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >{{account_nbr}}</p>
						<p class="text-center" >حساب</p>
					</div>
				</div>
			</div>
		</div>
			<div class="col-lg-3 col-sm-6 col-xs-12 info-panel" style="height: 187px;">
				<div class="widget widget-shadow">
					<div class="widget-content bg-white padding-20 hoverable card" style=" margin-left: 0px;margin-top: 0px;">
						<div class="row" style="margin-right:-10px">
							<button type="button" class="btn btn-floating btn-sm btn-primary" style="float:right">
								<i class="fa fa-users " aria-hidden="true" ></i>
							</button>
							<span class="margin-left-15 font-weight-400 example-title" style="float: right;margin-left: 0px;margin-right: 15px;margin-top: 15px;">عدد الكشافين</span>
						</div>


						<div class="row" style="margin-top:-10px">
							<p class="text-center" style="font-size: 40px; margin-bottom: 0px;overflow:hidden;text-overflow: ellipsis;
white-space: nowrap;" >306445</p>
							<p class="text-center" >كشاف</p>
						</div>
					</div>
				</div>
			</div>


			<!-- End First Row -->
		</div>
	<!-- End unit Row -->
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

		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 || current_user.localeCompare('ucap')===0 || current_user.localeCompare('vucp')===0 || current_user.localeCompare('capa')===0 || current_user.localeCompare('trne')===0 || current_user.localeCompare('fin')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0 || current_user.localeCompare('csd')===0 || current_user.localeCompare('surv')===0">
	<center style="	padding-top: 25px;">
			<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="post_event">
				<i class="fa-calendar-minus-o " aria-hidden="true" ></i>
			</button>
		</center>
			 <p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%;">
											 نشر حدث
										</p>
									</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 || current_user.localeCompare('ucap')===0 || current_user.localeCompare('vucp')===0 || current_user.localeCompare('capa')===0 || current_user.localeCompare('trne')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0 || current_user.localeCompare('csd')===0|| current_user.localeCompare('surv')===0">
			<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="post_news">
					<i class="fa fa-upload " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				نشر خبر
			</p></div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 ||current_user.localeCompare('ucap')===0 || current_user.localeCompare('vucp')===0 || current_user.localeCompare('capa')===0 || current_user.localeCompare('trne')===0|| current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0|| current_user.localeCompare('csd')===0|| current_user.localeCompare('surv')===0">
			<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="my_events">
					<i class="fa fa-calendar-minus-o " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				أحداثي
			</p></div>


		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0 ||current_user.localeCompare('vgov')===0 ||current_user.localeCompare('ucap')===0 || current_user.localeCompare('vucp')===0 || current_user.localeCompare('capa')===0 || current_user.localeCompare('trne')===0|| current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0|| current_user.localeCompare('csd')===0|| current_user.localeCompare('surv')===0">
			<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="my_events">
					<i class="fa fa-upload " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				منشوراتي
			</p></div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('ucap')===0 || current_user.localeCompare('vucp')===0 || current_user.localeCompare('capa')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="agree_events">
					<i class="fas fa-check " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				الموافقة على حدث
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('ucap')===0 || current_user.localeCompare('vucp')===0 || current_user.localeCompare('capa')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="agree_posts">
					<i class="fas fa-check " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				الموافقة على خبر
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('trne')===0 ">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myApproved_Events">
					<i class="glyphicon glyphicon-check " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				الأحداث الموافق عليها
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('trne')===0 ">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myApproved_Posts">
					<i class="glyphicon glyphicon-check " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				المنشورات الموافق عليها
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myprofile">
					<i class="fa fa-user " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				ملفي الشخصي
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('vgov')===0 || current_user.localeCompare('surv')===0">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="reports_received">
					<i class="fa fa-files-o" aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				التقارير الواردة
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('vgov')===0">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myprofile">
					<i class="fa fa-wpforms" aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				استمارة
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('vgov')===0">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myprofile">
					<i class="fas fa-male" aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				القادة
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('ucap')===0">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="myprofile">
					<i class="fa fa fa-file " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				تقرير
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0 || current_user.localeCompare('fin')===0 ">
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="finance_management">
					<i class="fa fa-money " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				الإدارة المالية
			</p>
		</div>


		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('fin')===0" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="finance_report">
					<i class="fa fa-user " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%">
				التقرير الشهري
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 122px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('trne')===0">
			<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center">
					<i class="fas fa-users " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" @click="scouts" >
				{{unit_name}}
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 112px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0">
			<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="users">
					<i class="fas fa-users " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%"  >
				حسابات المستخدمين
			</p>
		</div>
		<div  class="col-md-5 card" style="padding: 0px;height: 112px;margin-left: 25px;margin-top: 0px;text-align:center" v-if="current_user.localeCompare('gov')===0">
			<center style="padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="newuser">
					<i class="fa fa-lock" aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%"  >
				أضف حساب جديد
			</p>
		</div>

		</div>
	<div class="col-md-12 group-width" v-if="current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0">
		<div  class="col-md-3 card card-width first_card" style="padding: 0px;height: 112px;margin-left:10px;margin-top: 0px;text-align:center" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="cubs">
					<i class="fa fa-child  " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				الأشبال
			</p>
		</div>
		<div  class="col-md-3 card card-width" style="padding: 0px;height: 112px;margin-left:10px;margin-top: 0px;text-align:center"  >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center" @click="scout">
					<i class="fas fa-male " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				الكشاف
			</p>
		</div>
		<div  class="col-md-3 card card-width" style="padding: 0px;height: 112px;margin-left:10px;margin-top: 0px;text-align:center" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center"  @click="adv_scout">
					<i class="fal fa-male " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				الكشاف المتقدم
			</p>
		</div>
		<div  class="col-md-3 card card-width" style="padding: 0px;height: 112px;margin-left:10px;margin-top: 0px;text-align:center" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center"  @click="traveler">
					<i class="fa fa-male " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				الجوالة
			</p>
		</div>
	<!--	<div  class="col-md-5 card" style="padding: 0px;height: 112px;margin-left:25px;margin-top: 0px;text-align:center" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center">
					<i class="fas fa-bullhorn " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				المنتدى
			</p>
		</div>


		<div  class="col-md-5 card" style="padding: 0px;height: 112px;margin-left: 25px;margin-top: 0px;text-align:center" >
			<center style="	padding-top: 25px;">
				<button type="button" class="btn btn-floating btn-sm btn-primary center">
					<i class="fas fa-bullhorn " aria-hidden="true" ></i>
				</button>
			</center>
			<p class=" text-center" style=" position: absolute;bottom:5px;text-align:center;width:100%" >
				المنتدى
			</p>
		</div>-->



						 </div>





</div>
	<div class="row" data-plugin="matchHeight" data-by-row="true" v-if="has_unit()">
		<div class="col-md-4 col-sm-12 content" >
									<div class="card user-card " style="margin-left: 0px;">
										<div class="panel panel-default panel-profile" style="	margin-bottom: 0px;margin-left: 0px;" >
											<div class="panel-heading" style="background-image: url(/images/bg-warning.jpg)" ></div>
											<div class="panel-body text-center" >

												<img class="panel-profile-img mb10" src="/images/default.png"  width="100px" height="100px" alt="" v-if="MyTeam.first[0]===undefined || MyTeam.first[0].image.localeCompare('')===0">
												<img class="panel-profile-img mb10" :src="'/images/Captain/'+MyTeam.first[0].image"  width="100px" height="100px" alt="" v-else>
											   <h3 class="panel-title"><strong style="	color:#859aa5;" v-if="MyTeam.first[0]!==undefined || MyTeam.first[0]!==undefined " > {{MyTeam.first[0].first_name}} {{MyTeam.first[0].last_name}} </strong></h3>
											   <p style="	color:#859aa5;"> {{MyTeam.first[1]}} </p>
											</div>
											<div class="bottom" style="display: block;">
												<ul class="social-detail">
													<li>{{MyTeam.first[2]}}<span>حدث</span></li>
													<li>{{MyTeam.first[3]}}<span>منشور</span></li>

												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12 content" >
															<div class="card user-card " style="margin-left: 0px;">
																<div class="panel panel-default panel-profile" style="	margin-bottom: 0px;margin-left: 0px;" >
																	<div class="panel-heading" style="background-image: url(/images/bg-success.jpg)" ></div>
																	<div class="panel-body text-center" >

																		 <img class="panel-profile-img mb10" src="/images/default.png"  width="100px" height="100px" alt="" v-if="MyTeam.second[0]===undefined || MyTeam.second[0].image.localeCompare('')===0">
																		<img class="panel-profile-img mb10" :src="'/images/Captain/'+MyTeam.second[0].image"  width="100px" height="100px" alt="" v-else>
																		 <h3 class="panel-title"><strong style="	color:#859aa5;" v-if="MyTeam.second[0]!==undefined || MyTeam.second[0]!==undefined " > {{MyTeam.second[0].last_name}} {{MyTeam.second[0].first_name}}</strong></h3>
																		 <p style="	color:#859aa5;"> {{MyTeam.second[1]}}</p>
																	</div>
																	<div class="bottom" style="display: block;">
																		<ul class="social-detail">
																			<li>{{MyTeam.second[2]}}<span>حدث</span></li>
																			<li>{{MyTeam.second[3]}}<span>منشور</span></li>

																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4 col-sm-12 content" >
																					<div class="card user-card " style="margin-left: 0px;">
																						<div class="panel panel-default panel-profile" style="	margin-bottom: 0px;margin-left: 0px;" >
																							<div class="panel-heading" style="background-image: url(/images/bg-primary.jpg)" ></div>
																							<div class="panel-body text-center" >

																								<img class="panel-profile-img mb10" src="/images/default.png"  width="100px" height="100px" alt="" v-if="MyTeam.third[0]===undefined || MyTeam.third[0].image.localeCompare('')===0">
																								<img class="panel-profile-img mb10" :src="'/images/Captain/'+MyTeam.third[0].image"  width="100px" height="100px" alt="" v-else>
																								 <h3 class="panel-title"><strong style="	color:#859aa5;" v-if="MyTeam.third[0]!==undefined || MyTeam.third[0]!==undefined  "> {{MyTeam.third[0].last_name}} {{MyTeam.third[0].first_name}}</strong></h3>
																								 <p style="	color:#859aa5;">{{MyTeam.third[1]}}</p>
																							</div>
																							<div class="bottom" style="display: block;">
																								<ul class="social-detail">
																									<li>{{MyTeam.third[2]}}<span>حدث</span></li>
																									<li>{{MyTeam.third[3]}}<span>منشور</span></li>

																								</ul>
																							</div>
																						</div>
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
		.card-width{
			width:100%
		}
	}
	@media (min-width: 992px) {
         .first_card{
			 margin-left:0px !important;
		 }
		.card-width{
			width:24%;

		}
		.group-width{
			padding-left: 0px !important;
			padding-right: 0px !important;

		}

	}

	@media (max-width: 991px) {

		.group-width{
			padding-left: 15px !important;
			padding-right: 10px !important;

		}
		.card-width{
			width:100%;

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
		.card-width{
			width:100%
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

.user-card .panel-default{
	border-color: #ebeff2;
	border-radius:5px;
}
.panel-profile .panel-heading {
    height: 150px;
    background-size: cover;

}
.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.user-card .panel-profile-img {
    max-width: 100px;
    margin-top: -50px;
    margin-bottom: 5px;
    border-radius: 100%;
}
img {
    vertical-align: middle;
		border: 0;
}
.text-center {
    text-align: center;
}

.user-card .bottom {
    padding: 0 00px;
    display: inline-block;
    width: 100%;
		height:75px;
}
.user-card ul.social-detail {
    padding: 0;
    margin: 0;
}
.user-card ul.social-detail li {
    display: inline-block;
    width: 50%;
    float: left;
    line-height: 1.44;
		color:#859aa5;
    font-size: 22px;
    text-align: center;
    padding: 12px 5px;
    font-weight: 400;
}
.user-card ul.social-detail li span {
    display: block;
    font-size: 14px;
			color:#859aa5;
    font-weight: 400;
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
				nbr_of_allevents:'',
				nbr_of_events:'',
				nbr_of_posts:'',
				account_nbr:'',
				count_unit_post:'',
					count_unit_scout:'',
					single:'',
				unit_name:'',
				nbr_of_scouts:'',
                all_posts:'',
                all_events:'',
				current_user:'',
                money_fund:'',
				this_week_money:'',
				this_month_money:'',
                nbr_of_reports:'',
                this_month_visitors:'',
                this_month_posts:'',
                this_week_post:'',
                this_week_visitors:'',
                today_posts:'',
                today_visitors:'',
				MyTeam:{
				    first:'',
					second:'',
					third:''
				}
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
axios.get('/api/getcurrentuser').then(function(response){
		vm.current_user = response.data.user_role;
		if(vm.current_user.localeCompare('gov')===0 ){
            axios.get('/api/getHubInfo_forGOv').then(function(response){
                vm.account_nbr = response.data.account_nbr;
                if( vm.account_nbr<10){
                    vm.account_nbr = "0"+ vm.account_nbr;
                }


                vm.nbr_of_events = response.data.nbr_of_events;
                vm.money_fund = response.data.all_money;
                vm.nbr_of_posts = response.data.nbr_of_posts;
                vm.nbr_of_scouts = response.data.nbr_of_scouts;
                vm.all_posts = response.data.all_posts;
                vm.all_events = response.data.all_events;
									vm.today_visitors = response.data.today_visitors;
            });
		}
		if(vm.current_user.localeCompare('fin')===0 ){
            axios.get('/api/getHubInfo_forFin').then(function(response){
                vm.money_fund = response.data.all_money;

								if(response.data.this_week_money[0].this_week_money===null)
								vm.this_week_money = 0;
								else {
									   vm.this_week_money = response.data.this_week_money[0].this_week_money;
								}

								if(response.data.this_month_money[0].this_month_money===null)
								vm.this_month_money=0;
								else {
									vm.this_month_money = response.data.this_month_money[0].this_month_money;
								}
                vm.nbr_of_events = response.data.nbr_of_events;

			});
		}
    if(vm.current_user.localeCompare('vgov')===0 ){
        axios.get('/api/getHubInfo_forVgov').then(function(response){
            vm.nbr_of_events = response.data.nbr_of_events;
            vm.nbr_of_posts = response.data.nbr_of_posts;
            vm.nbr_of_reports = response.data.nbr_of_reports;
            vm.nbr_of_scouts = response.data.nbr_of_scouts;

		});
    }
		if(vm.current_user.localeCompare('surv')===0 ){
				axios.get('/api/getHubInfo_forSurv').then(function(response){
						vm.nbr_of_events = response.data.nbr_of_events;
						vm.nbr_of_posts = response.data.nbr_of_posts;
						vm.nbr_of_reports = response.data.nbr_of_reports;


		});
		}
		if(vm.current_user.localeCompare('csd')===0 ){
				axios.get('/api/getHubInfo_forCsd').then(function(response){
						vm.nbr_of_events = response.data.nbr_of_events;
						vm.nbr_of_posts = response.data.nbr_of_posts;



		});
		}
    if(vm.current_user.localeCompare('med')===0 || vm.current_user.localeCompare('vmed')===0){
        axios.get('/api/getHubInfo_forMed').then(function(response){
            vm.nbr_of_events = response.data.nbr_of_events;
            vm.nbr_of_posts = response.data.nbr_of_posts;
            vm.this_month_visitors = response.data.this_month_visitors;
            vm.this_month_posts = response.data.this_month_posts;
            vm.this_week_post = response.data.this_week_post;
            vm.this_week_visitors = response.data.this_week_visitors;
            vm.today_posts = response.data.today_posts;
            vm.today_visitors = response.data.today_visitors;

        });
    }
		if(vm.current_user.localeCompare('ucap')===0 || vm.current_user.localeCompare('vucp')===0  || vm.current_user.localeCompare('capa')===0  || vm.current_user.localeCompare('trne')===0){
        axios.get('/api/getHubInfo_forUnit').then(function(response){
            vm.nbr_of_events = response.data.nbr_of_events;
            vm.nbr_of_posts = response.data.nbr_of_posts;
            vm.count_unit_post = response.data.my_unit_post;
            vm.count_unit_scout = response.data.my_unit_scouts;
            vm.unit_name = response.data.unit_fullname;
            vm.single = response.data.single;


						axios.get('/api/getMyTeam').then(function (response) {
							vm.MyTeam.first = response.data.first;
							vm.MyTeam.second = response.data.second;
							vm.MyTeam.third = response.data.third;

			            });

        });
    }
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
	has_unit(){
		if(this.current_user.localeCompare('ucap')===0 || this.current_user.localeCompare('vucp')===0   || this.current_user.localeCompare('capa')===0  || this.current_user.localeCompare('trne')===0   ){

			return true;
		}


		return false;
	},
	finance(){
		if(this.current_user.localeCompare('fin')===0  ){
/*		    var vm = this;
		axios.get('/api/getFinanceInfo').then(function(response){
            vm.money_fund = response.data.all_money;
            if(response.data.this_week_money[0].this_week_money=== null)
                vm.this_week_money  = 0;
                else
            vm.this_week_money = response.data.this_week_money[0].this_week_money;

            if(response.data.this_month_money[0].this_month_money=== null)
                vm.this_month_money = 0;
           else
            vm.this_month_money = response.data.this_month_money[0].this_month_money;



		});
            axios.get('/api/getEventNumber').then(function(response){
                  console.log(response);
                if(response.data.event_number[0].event_number=== 0)
                    vm.this_week_money  = "00";
                else
                    vm.nbr_of_events = response.data.event_number[0].event_number;


            });*/
		return true;
		}


		return false;
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
		this.$router.push('/dashboard/events/new');
	},
	post_news(){
		this.$router.push('/dashboard/posts/new');
	},
	my_events(){
		this.$router.push('/dashboard/Events/MyEvents');
	},
	myprofile(){
		this.$router.push('/dashboard/myprofile');
	},
	agree_events(){

		this.$router.push('/dashboard/Events/ApproveEvents');
	},
	agree_posts(){
	    if(this.current_user.localeCompare('med')===0)

		this.$router.push('/dashboard/posts/Approve_Posts');

	    else
            this.$router.push('/dashboard/posts/approveposts');
	},
	scouts(){
		this.$router.push('/dashboard/my_scout');
	},
	finance_management(){
        this.$router.push('/dashboard/finance/Financial_management');

	},
	finance_report(){
        this.$router.push('/dashboard/Finance/Repport');
	},
    myApproved_Events(){
        this.$router.push('/dashboard/Events/MyEvents/Approved');
	},
    myApproved_Posts(){
        this.$router.push('/dashboard/posts/MyApprovedPosts');
	},
	cubs(){
        this.$router.push('/dashboard/scouts/cubs');
	},
	scout(){
        this.$router.push('/dashboard/scouts/scout');
	},
	adv_scout(){
        this.$router.push('/scouts/advanced_scout');
	},
	traveler(){
        this.$router.push('/dashboard/scouts/traveler');
	},
    newuser(){
        this.$router.push('/dashboard/NewUser');
    },
    users(){
        this.$router.push('/dashboard/users-accounts');
    },
		reports_received(){
			this.$router.push('/dashboard/reports/received');
		},
		show_my_post_number(){
			if(this.current_user.localeCompare('gov')===0 ||
			this.current_user.localeCompare('vgov')===0 ||
			this.current_user.localeCompare('med')===0 ||
			this.current_user.localeCompare('vmed')===0 ||
			this.current_user.localeCompare('ucap')===0 ||
			this.current_user.localeCompare('vucp')===0 ||
			this.current_user.localeCompare('capa')===0 ||
			this.current_user.localeCompare('trne')===0 ||
				this.current_user.localeCompare('csd')===0 ||
					this.current_user.localeCompare('surv')===0
		    )
				return true;
				return false;
		}
}
	}
</script>

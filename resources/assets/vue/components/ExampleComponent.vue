<template>
<div class="container-fluid font_kufi">
	<div class="card mx-5 my-5">
    <form class="md-form px-5 py-5" name="scout" action="/dashboard/dash" novalidate id="scout-form" method="POST" >
        <div class="row row-lg">
	        <div class="col-sm-8" style="border-right: 1px dotted #ddd;">
	            <!-- Example Basic Form -->	              
			<div class="row">
			<div class="col-sm-12">
				<p class="font-size-20 blue-grey-700">البيانات</p>
			</div>
			<hr>
			<br>
			  <div class="form-group col-sm-6">
				<label for="first_name">الاسم</label>
				<input type="text" class="form-control" id="first_name" name="first_name" required>
			  </div>
			  <div class="form-group col-sm-6">
				<label for="ilast_name">اللقب<span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="last_name" name="last_name" required>
			  </div>
			</div>
			
			<div class="row">			  
			  <div class="form-group col-sm-6">
				<label for="phone">الهاتف</label>
				<input type="text" class="form-control" id="phone" name="phone" autocomplete="off">
			  </div>			  
			</div>

			<div class="row">			  
			  <div class="form-group col-sm-6">
					<label for="date_birth">تاريخ الميلاد</label>
					<datepicker :language="ar" name="date_birth" id="date_birth"></datepicker>
			  </div>			  
			</div>
	  
	</div>

	<div class="col-sm-4">
	  <!-- Example Basic Form Without Label -->
	      <div class="col-sm-12 row">
			<p class="font-size-20 blue-grey-700">Login Details</p>
			</div>          
		<div class="form-group">
		  <label class="control-label" for="inputBasicEmail">البريد الالكتروني <span class="spancolor">*</span></label>
		  <input type="email" class="form-control" id="email" name="email" placeholder="البريد" autocomplete="off"/>
		</div>
			
	</div>
	<div style="clear:both"></div>
	<div class="form-group col-sm-6">
	<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
			<i class="fa fa-save"></i>  انشاء
		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
	
	</div>
  </div>
</form> 
</div>

<h3> </h3>
</div>
</template>

<style scoped>
	label{
		font-size: 1em;
		margin-top: 4%;
		margin-left: 4%;
	}

	label.active{
		margin-top: -0.5% !important;
		font-size: 0.7em;
	}
</style>


<script>
		import Datepicker from 'vuejs-datepicker';
		import {en, fr, ar} from 'vuejs-datepicker/dist/locale';
		import axios from 'axios';

    export default {
        mounted() {
						console.log('Component mounted.');
						axios.get('api/user')
								 .then(response => {
									 this.user = response.data
									 });
				},

				data() {
						return{
							en: en,
							fr: fr,
							ar: ar,

							permissions: [],
							user: ''
						}
				},

				created(){

				},

				methods: {

				},

				components: {
					Datepicker
				}
    }
</script>
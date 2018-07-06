<template>
<div class="container col-md-11 col-sm-11 col-xs-11 text-center card" style="background-color: transparent">
	<div class="row">
		<div class="col-sm-4 hoverable card" style="height: 490px; width: 30%; margin: 15px 15px; padding: 0px 0px">
			<div class="card-img-top" style="background-color:#57A8FF; margin: 0% 0%; height: 300px">
				<a href="#"><img src="assets/images/hub/posts.png" class="icon"></a>
			</div>
			<div class="card-body">
				<h2>المنشورات</h2>
				<h3>يمكنك إضافة منشور أو حدث ونشرهيمكنك إضافة منشور أو حدث ونشرهيمكنك إضافة منشرهيمكنك إضافة منشور أو حدث ونشرهيمكنك إضافة منشور أو حدث ونشرهيمكنك إضافة منشور أو حدث ونشرهيمكنك إضافة منشور أو حدث شرك إضافة منشه</h3>
			</div>
		</div>

			<div class="col-sm-3 hoverable card" style="height: 250px; width: 25%; margin: 15px 15px; padding: 0px 0px">
				<div class="card-img-top" style="background-color:#57A8FF; margin: 0% 0%; height: 120px">
					<a href="#"><img src="assets/images/hub/forum.png" class="icon"></a>
				</div>
				<div>
					<h2>المنتدى</h2>
					<h4>يمكنك طرح موضوع معين و المناقشة مع كل المتعاملين</h4>
				</div>
			</div>
			<div class="col-sm-3 hoverable card" style="height: 250px; width: 25%; margin: 15px 15px; padding: 0px 0px">
				<div class="card-img-top" style="background-color:#57A8FF; margin: 0% 0%; height: 120px">
					<a href="#"><img src="assets/images/hub/scout.png" class="icon"></a>
				</div>
				<div class="card-body">
					<h2>الكشاف</h2>
					<h4>يمكنك الإطلاع على كل الأموال المتداولة من قبل مختلف المتعاملين</h4>
				</div>
			</div>
			<div class="col-sm-3 hoverable card" style="height: 210px; width: 54%; margin: 15px 15px; padding: 0px 0px">
				<div>
					<div class="col-sm-7" style="height: 210px; margin: 0px 0px;">
						<h2>المالية</h2>
						<h4>يمكنك الإطلاع على كل الأموال المتداولة من قبل مختلف المتعاملين يمكنك الإطلاع على كل الأموال المتداولة من قبل مختلف المتعاملين يمكنك الإطلاع على كل الأموال المتداولة من قبل مختلف المتعاملين</h4>
					</div>
					<div class="col-sm-5" style="background-color: #57A8FF; height: 209px; margin: 0px 0px">
						<a href="#"><img src="assets/images/hub/money.png" class="icon" style="margin-top: 35%"></a>
					</div>
				</div>
			</div>

	</div>


	<div class="row">
	<div class="col-sm-5 hoverable card" style="margin:0 15px; padding: 0 0;height: 300px ">
		<div class="card-img-top" style="background-color:#57A8FF; margin: 0 0; height: 130px">
			<a href="#"><img src="assets/images/hub/users.png" class="icon"></a>
		</div>
			<h2>المستخدمين</h2>
			<h4>يمكنك الإطلاع على المستخدمين و كل المعلومات الخاصة بهم</h4>
		</div>
		<div class="col-sm-5 hoverable card" style="margin:0 15px ; padding: 0 0;height: 300px">
			<div class="card-img-top" style="background-color:#57A8FF; margin: 0 0; height: 130px">
				<a href="#"><img src="assets/images/hub/add-file.png" class="icon"></a>
			</div>
			<h2> أضف ملف</h2>
			<h4>يمكنك ملئ استمارات مختلفة أو إضافة حدث و تعديله</h4>
		</div>
	</div>



	<div class="row">
		<div class="col s12 m7">
			<div class="card">
				<div class="card-image">
					<img src="images/sample-1.jpg">
					<span class="card-title">Card Title</span>
				</div>
				<div class="card-content">
					<p>I am a very simple card. I am good at containing small bits of information.
						I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="#">This is a link</a>
				</div>
			</div>
		</div>
	</div>


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



</style>

<script>
	export default{

	}
</script>
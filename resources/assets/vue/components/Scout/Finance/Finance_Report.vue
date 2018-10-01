<template>
    <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px">
        <div class="header">

            <h4 class="title">التقرير الشهري</h4>
        </div>
        <div  class="card-body" style="margin:10px;">
					<table dir="rtl">
						<tr>

					        <td>رقم المعاملة</td>
					        <td>الأموال الواردة</td>
					        <td>الأموال المسحوبة</td>
					        <td>تاريخ العملية</td>
					        <td> التعليل</td>
						</tr>
						<tr v-for="money in money_data">
							<td>{{money.id}}</td>
							<td v-if="money.transaction_money<0"></td>
								<td v-if="money.transaction_money<0">  {{money.transaction_money.toString().split('-')[1]}} دج</td>
									<td v-else>{{money.transaction_money}} دج</td>
									<td v-if="money.transaction_money>=0"></td>
										<td>{{money.transaction_date}}</td>
											<td>{{money.transaction_description}}</td>
						</tr>


					</table>
					<div style="text-align:center;margin-top:35px">
						<button class="btn btn-primary" style="border-radius:4px"  v-if="lastday" @click="sendReport">
							<span>ارسال التقرير</span><i class="fa fa-send"></i>
						</button>
						<button class="btn btn-primary" style="border-radius:4px" @click="downloadReport">
                 <span>تحميل</span><i class="fa fa-download"></i>
						</button>

					</div>

        </div>
		<sweet-modal icon="success" ref="send_successfully">
			<h3>تم ارسال التقرير بنجاح تام</h3>
		</sweet-modal>
		<loading
				:show="show"
				:label="label">
		</loading>
    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    export default {
        components:{
            loading
		},
			data(){
				return{
                    show: false,
                    label: '....الرجاء الإنتظار',
					money_data:'',
				}
			},
      created:function(){
				var vm =this;
				axios.get('/api/this_month_money_report').then(function(response){
					vm.money_data  = response.data.money_data;
				});

			},
			methods:{
				lastday(){
					var current_date = new Date(),
					    current_month = current_date.getMonth(),
							current_year = current_date.getFullYear(),
							current_day = current_date.getDate();
					if(current_day ===new Date(current_year, current_month +1, 0).getDate())
					return true;

						return false;

				},
				downloadReport(){

                    var vm =this;
				    this.show =true;
					axios({
							url:  '/api/DownloadFinanceReport',
							method: 'get',
							responseType: 'blob',
						}).then(function(response){
							let blob = new Blob([response.data], { type:  'application/pdf' } );

							let link = document.createElement('a');
							link.href = window.URL.createObjectURL(blob);
							link.download = 'تقرير المالية.pdf';
							link.click();
                        vm.show =false;
						});
				},
				sendReport(){
                    var vm =this;
                    this.show =true;
					axios({
							url:  '/api/SendFinanceReport',
							method: 'GET',
						}).then(function(){
                        vm.show =false;
                        vm.$refs.send_successfully.open();
						});
				}
			}
    }
</script>

<style scoped>
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
    }
		table, th, td {

				border: 1px solid #cecece;
				text-align: right

		}
		td{
				padding:5px;
		}
</style>

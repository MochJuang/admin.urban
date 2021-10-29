<style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
.select2-container{
    width: 25% !important
}
</style>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row" id="dataDashboardTampil">


                    </div>
                   <div class="row" style="">
                   <div class="col-xl-6 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>Transaksi</h5> <span class="text-muted">Grafik status transaksi penjualan</span>
														<div class="card-header-right">
															<ul class="list-unstyled card-option">
																<li><i class="feather icon-maximize full-card"></i></li>
																<li><i class="feather icon-minus minimize-card"></i></li>
																<li><i class="feather icon-trash-2 close-card"></i></li>
															</ul>
														</div>
													</div>
													<div class="card-block">
														<!-- <div id="visitor" style="height:300px"></div> -->
                                                        <div id="visitor-container"></div>
													</div>
												</div>
											</div>
                
                <div class="col-xl-6 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>Transaksi Penjualan per kategori</h5> <span class="text-muted">Grafik Penjualan per kategori</span>
														<div class="card-header-right">
															<ul class="list-unstyled card-option">
																<li><i class="feather icon-maximize full-card"></i></li>
																<li><i class="feather icon-minus minimize-card"></i></li>
																<li><i class="feather icon-trash-2 close-card"></i></li>
															</ul>
														</div>
													</div>
													<div class="card-block">
														<!-- <div id="visitor" style="height:300px"></div> -->
                                                        <div id="transaksi-container"></div>
													</div>
												</div>
											</div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
												<div class="card">
													<div class="card-header">
														<h5>Transaksi Penjualan per bulan</h5> 
                                                        <span class="text-muted">Grafik Penjualan per Bulan</span>
                                                        <select id="dashbaordBulan" class="js-example-basic-single col-sm-12 select-startDate" name="kategori_id" placeholder="id_usr_role" type="text" required="required">
                                                            <option value="">Pilih Bulan</option>
                                                        </select>
														<div class="card-header-right">
															<ul class="list-unstyled card-option">
																<li><i class="feather icon-maximize full-card"></i></li>
																<li><i class="feather icon-minus minimize-card"></i></li>
																<li><i class="feather icon-trash-2 close-card"></i></li>
															</ul>
														</div>
													</div>
													<div class="card-block">
														<!-- <div id="visitor" style="height:300px"></div> -->
                                                        <div id="container-selesai"></div>
													</div>
												</div>
											</div>
                                            </div>
                </div>
            </div>
            <!-- <div id="styleSelector">
            </div> -->
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script>
// let datanya = {a: true}
$('document').ready(function () {
    $("#dashbaordBulan").select2()
    dashboardData()
    grafikData(moment(new Date()).format('YYYY'), 'visitor-container', <?= $transaksi?>)
    grafikData(moment(new Date()).format('YYYY'), 'transaksi-container', <?= $kategori?>)
    // console.log(moment(new Date()).format('YYYY'))
    grafikDataSelesai();
})
const datanya = () =>{
    return fetch(service_url+ 'mastertransaksi/find')
  .then(response => response.json())
};
    
const getMaster= async() =>{
    // console.log(await datanya())
    return await datanya();
}
var p = (async() => {
    let ss = await datanya();
    return ss

})();
// console.log(p)
// let dataGrafik = <?= $transaksi?>;
// console.log(dataGrafik)
function grafikData(tahun=moment(new Date()).format('YYYY'), component = '', data = []) {
    Highcharts.chart(component, {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Transaksi URBAN&CO'
    },
    
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: data
});
}
function grafikDataSelesai(bulan=moment(new Date()).format('YYYY'), component = '', data = []) {
    getMasterData(service_url + 'dashboard/TransaksiPer', '', function (data) {
        console.log(data.data)
        Highcharts.chart('container-selesai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Transaksi Selesai Per Bulan'
            },
            
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
            name: "Browserss",
            colorByPoint: true,
            data: data.data
                }]
        
        });
     
   });
}
function dashboardData() {
        getMasterData(service_url + 'product/countingProduct', '', function (data) {
       
            let dataDashboard = ``;
            data.forEach((datanya)=>{
                dataDashboard += `<div class="col-xl-3 col-md-6">
                            <div class="card bg-c-lite-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">${datanya.jumlah}</h4>
                                            <h6 class="text-white m-b-0">${datanya.nama_kategori}</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-1" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>`
            })
            $("#dataDashboardTampil").html(dataDashboard)
        });
    }
    function subkategoriData() {
        getMasterData(service_url + 'product/countingProduct', '', function (data) {
       
       let dataDashboard = ``;
       data.forEach((datanya)=>{
           dataDashboard += `<div class="col-xl-3 col-md-6">
                                                            <div class="card bg-c-yellow update-card">
                                                                <div class="card-block">
                                                                    <div class="row align-items-end">
                                                                        <div class="col-8">
                                                                            <h4 class="text-white">${datanya.jumlah}</h4>
                                                                            <h6 class="text-white m-b-0">${datanya.nama_kategori}</h6>
                                                                        </div>
                                                                        <div class="col-4 text-right">
                                                                            <canvas id="update-chart-1" height="50"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>`
       })
       $("#dataDashboardTampil").html(dataDashboard)
   });
    }
</script>


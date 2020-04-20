@extends('admin.index')
@section('title','Statistics')
@section('section_title','Statistics')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid ">
        

            <!-- PIE CHART -->
            <div class="card card-info my-3">
                <div class="card-header">
                    <h3 class="card-title">Male - Female Attendance​ </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="pieChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              
            </div>
            <!-- /.card -->
        
      
        
            <!-- LINE CHART -->
            <div class="card card-info my-3">
                <div class="card-header">
                    <h3 class="card-title">Revenue​</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="lineChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
        
                  <!-- PIE CHART -->
                  <div class="card card-info my-3">
                 <div class="card-header">
                    <h3 class="card-title">​ Top Ordered Users </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="pieChart_order"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              
            </div>
            <!-- /.card -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('script')

<script>
    $(function () {
        //-------------
        //- PIE CHART-
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var users =  <?php echo json_encode($users) ?>;
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: [
                'male',
                'female',       
            ],
            datasets: [{
                data:users,
                backgroundColor: ['#f39c12', '#00c0ef',],
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
        // ****************************
         //-------------
        //- PIE CHART-pieChart_order
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var countOrder =  <?php echo json_encode($countOrder) ?>;
        var orderUsername =  <?php echo json_encode($orderUsername) ?>;
        var pieChartCanvas = $('#pieChart_order').get(0).getContext('2d')
        var pieData = {
            labels: orderUsername,
            datasets: [{
                data:countOrder,
                backgroundColor: ['#f39c12', '#00c0ef','#f56954', '#00a65a', '#3c8dbc','#9932CC','#E9967A','#A52A2A','#DEB887','#BDB76B',],
            }]
        };
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
        //-------------
        //- LINE CHART -
        //--------------
        // var areaChartData = {
        //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        //     datasets: [{
        //             label: 'Digital Goods',
        //             backgroundColor: 'rgba(60,141,188,0.9)',
        //             borderColor: 'rgba(60,141,188,0.8)',
        //             pointRadius: false,
        //             pointColor: '#3b8bba',
        //             pointStrokeColor: 'rgba(60,141,188,1)',
        //             pointHighlightFill: '#fff',
        //             pointHighlightStroke: 'rgba(60,141,188,1)',
        //             data: [28, 48, 40, 19, 86, 27, 90]
        //         },
        //         {
        //             label: 'Electronics',
        //             backgroundColor: 'rgba(210, 214, 222, 1)',
        //             borderColor: 'rgba(210, 214, 222, 1)',
        //             pointRadius: false,
        //             pointColor: 'rgba(210, 214, 222, 1)',
        //             pointStrokeColor: '#c1c7d1',
        //             pointHighlightFill: '#fff',
        //             pointHighlightStroke: 'rgba(220,220,220,1)',
        //             data: [65, 59, 80, 81, 56, 55, 40]
        //         },
        //     ]
        // }

        // var areaChartOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        //     legend: {
        //         display: false
        //     },
        //     scales: {
        //         xAxes: [{
        //             gridLines: {
        //                 display: false,
        //             }
        //         }],
        //         yAxes: [{
        //             gridLines: {
        //                 display: false,
        //             }
        //         }]
        //     }
        // }


        // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        // var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
        // var lineChartData = jQuery.extend(true, {}, areaChartData)
        // lineChartData.datasets[0].fill = false;
        // lineChartData.datasets[1].fill = false;
        // lineChartOptions.datasetFill = false

        // var lineChart = new Chart(lineChartCanvas, {
        //     type: 'line',
        //     data: lineChartData,
        //     options: lineChartOptions
        // })



       
    })

</script>
@endsection

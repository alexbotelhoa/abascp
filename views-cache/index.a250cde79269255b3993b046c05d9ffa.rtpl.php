<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE INDEX
####################################################################################################################
-->

    <div class="promo-area">
        <section class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- DONUT CHART -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Status dos Projetos</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <canvas id="pieChart" style="height:250px"></canvas>
                        </div> <!-- /.box-body -->
                    </div> <!-- /.box -->
                </div>
                <div class="col-md-2"></div>
            </div>
        </section>
    </div> <!-- End promo area -->

    <div class="brands-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">

                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>50<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 1</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                    <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>51<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 2</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>52<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 3</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 4</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>54<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 5</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>55<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 6</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>56<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 7</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>57<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 8</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>58<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 9</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>59<sup style="font-size: 20px">%</sup></h3>

                                    <p>Projeto 10</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/projects/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

    <!-- jQuery 2.2.3 -->
    <script src="/res/site/plugins/jQuery/jquery-2.2.3.min.js"></script>

    <!-- ChartJS 1.0.1 -->
    <script src="/res/site/plugins/chartjs/Chart.min.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = [
                {
                    value: 700,
                    color: "#f56954",
                    highlight: "#f56954",
                    label: "Chrome"
                },
                {
                    value: 500,
                    color: "#00a65a",
                    highlight: "#00a65a",
                    label: "IE"
                },
                {
                    value: 400,
                    color: "#f39c12",
                    highlight: "#f39c12",
                    label: "FireFox"
                }
            ];
            var pieOptions = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke: true,
                //String - The colour of each segment stroke
                segmentStrokeColor: "#fff",
                //Number - The width of each segment stroke
                segmentStrokeWidth: 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps: 100,
                //String - Animation easing effect
                animationEasing: "easeOutBounce",
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate: true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale: false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            };
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            pieChart.Doughnut(PieData, pieOptions);

        });
    </script>

<!--
####################################################################################################################
                                        BELOW IS THE FOOTER
####################################################################################################################
-->
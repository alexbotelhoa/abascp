<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <div class="row">

        <!-- STATUS DOS PROJETOS -->
        <div class="col-md-6 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Status dos Projetos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>

        <!-- TAREFAS ANTIGAS -->
        <div class="col-md-6 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Tarefas Antigas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome Tarefa</th>
                                <th>Data Fim</th>
                                <th>Situação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $counter1=-1;  if( isset($tasks) && ( is_array($tasks) || $tasks instanceof Traversable ) && sizeof($tasks) ) foreach( $tasks as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td><?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["destask"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo formatDateS($value1["dtfinish"]); ?></div>
                                </td>
                                <td>
                                    <?php if( $value1["sttask"] == 0 ){ ?>
                                    <a href="/abascp1/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/situation/index" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i> Aberto </a>
                                    <?php }else{ ?>
                                    <a href="/abascp1/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/situation/index" class="btn btn-danger btn-xs"><i class="fa fa-folder"></i> Fechado</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="brands-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="brand-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title">Últimos 6 Projetos</h3>
                    </div>
                    <div class="brand-list">
                    <?php $counter1=-1;  if( isset($projects) && ( is_array($projects) || $projects instanceof Traversable ) && sizeof($projects) ) foreach( $projects as $key1 => $value1 ){ $counter1++; ?>
                        <?php if( $value1["stproject"] == 0 ){ ?>
                        <div class="small-box bg-green">
                        <?php }else{ ?>
                        <div class="small-box bg-red">
                        <?php } ?>
                            <div class="inner">
                                <h3><?php echo htmlspecialchars( $value1["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?><sup style="font-size: 20px">%</sup></h3>
                                <p><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/abascp1/projects/<?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/details" class="small-box-footer">Mais detalhes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery 2.2.3 -->
    <script src="/abascp1/res/site/plugins/jQuery/jquery-2.2.3.min.js"></script>

    <!-- ChartJS 1.0.1 -->
    <script src="/abascp1/res/site/plugins/chartjs/Chart.min.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            var $projectnotlate = <?php echo htmlspecialchars( $nrnotlates, ENT_COMPAT, 'UTF-8', FALSE ); ?>;
            var $projectlate = <?php echo htmlspecialchars( $nrlates, ENT_COMPAT, 'UTF-8', FALSE ); ?>;

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = [
                {
                    value: $projectnotlate,
                    color: "#00a65a",
                    highlight: "#00a65a",
                    label: "Não Atrasado(s)"
                },
                {
                    value: $projectlate,
                    color: "#f56954",
                    highlight: "#f56954",
                    label: "Atrasado(s)"
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
<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/status">Status</a></li>
    </ol>
</section> <!-- /.content-header -->

<section class="content-header">
    <h1>
        Projetos Atrasados
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">

                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px"><a href="/status/sordid">#</a></th>
                                <th><a href="/status/sordproj">Nome Projeto</a></th>
                                <th><a href="/status/sordini">Data Incício</a></th>
                                <th><a href="/status/sordfim">Data Fim</a></th>
                                <th><a href="/status/sordrate">Rate</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($projectslate) && ( is_array($projectslate) || $projectslate instanceof Traversable ) && sizeof($projectslate) ) foreach( $projectslate as $key1 => $value1 ){ $counter1++; ?>
                                <tr>
                                    <td><?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo formatDate($value1["dtstart"]); ?></td>
                                    <td><?php echo formatDate($value1["dtfinish"]); ?></td>
                                    <td><?php echo htmlspecialchars( $value1["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.box-body -->

            </div>
        </div>
    </div>
</section> <!-- /.content -->

<section class="content-header">
    <h1>
        Projetos Não Atrasados
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">

                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px"><a href="/status/nordid">#</a></th>
                            <th><a href="/status/nordproj">Nome Projeto</a></th>
                            <th><a href="/status/nordini">Data Incício</a></th>
                            <th><a href="/status/nordfim">Data Fim</a></th>
                            <th><a href="/status/nordrate">Rate</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter1=-1;  if( isset($projectsnotlate) && ( is_array($projectsnotlate) || $projectsnotlate instanceof Traversable ) && sizeof($projectsnotlate) ) foreach( $projectsnotlate as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDate($value1["dtstart"]); ?></td>
                            <td><?php echo formatDate($value1["dtfinish"]); ?></td>
                            <td><?php echo htmlspecialchars( $value1["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.box-body -->

            </div>
        </div>
    </div>
</section> <!-- /.content -->

<!--
####################################################################################################################
                                        BELOW IS THE FOOTER
####################################################################################################################
-->
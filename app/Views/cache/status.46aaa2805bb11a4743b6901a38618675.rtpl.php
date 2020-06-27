<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <ol class="breadcrumb">
        <li><a href="/abascp1"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active"><a href="/abascp1/status">Status</a></li>
    </ol>
</section>
<section class="container">
    <h1>
        Projetos Atrasados
    </h1>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px"><a href="/abascp1/order/status/sordid">#</a></th>
                            <th><a href="/abascp1/order/status/sordproj">Nome Projeto</a></th>
                            <th><a href="/abascp1/order/status/sordini">Data Incício</a></th>
                            <th><a href="/abascp1/order/status/sordfim">Data Fim</a></th>
                            <th><a href="/abascp1/order/status/sordrate">Rate</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter1=-1;  if( isset($projectslate) && ( is_array($projectslate) || $projectslate instanceof Traversable ) && sizeof($projectslate) ) foreach( $projectslate as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDateS($value1["dtstart"]); ?></td>
                            <td><?php echo formatDateS($value1["dtfinish"]); ?></td>
                            <td><?php echo htmlspecialchars( $value1["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <h1>
        Projetos Não Atrasados
    </h1>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px"><a href="/abascp1/order/status/nordid">#</a></th>
                            <th><a href="/abascp1/order/status/nordproj">Nome Projeto</a></th>
                            <th><a href="/abascp1/order/status/nordini">Data Incício</a></th>
                            <th><a href="/abascp1/order/status/nordfim">Data Fim</a></th>
                            <th><a href="/abascp1/order/status/nordrate">Rate</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter1=-1;  if( isset($projectsnotlate) && ( is_array($projectsnotlate) || $projectsnotlate instanceof Traversable ) && sizeof($projectsnotlate) ) foreach( $projectsnotlate as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDateS($value1["dtstart"]); ?></td>
                            <td><?php echo formatDateS($value1["dtfinish"]); ?></td>
                            <td><?php echo htmlspecialchars( $value1["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
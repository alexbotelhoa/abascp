<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="container">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active"><a href="/tasks">Tarefas</a></li>
    </ol>
</section> <!-- /.content-header -->

<section class="container">
    <h1>
        Lista de Tarefas
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-xs-4">
                        <a href="/tasks/create" class="btn btn-success">Cadastrar Tarefa</a>
                    </div>

                    <?php if( $error != '' ){ ?>
                    <div class="col-xs-8">
                        <div class="box-header bg-red">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if( $success != '' ){ ?>
                    <div class="col-xs-8">
                        <div class="box-header bg-green">
                            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div> <!-- /.box-header -->

                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px"><a href="/order/tasks/ordid">#</a></th>
                            <th><a href="/order/tasks/ordtask">Nome Tarefa</a></th>
                            <th><a href="/order/tasks/ordproj">Nome Projeto</a></th>
                            <th><a href="/order/tasks/ordini">Data Incício</a></th>
                            <th><a href="/order/tasks/ordfim">Data Fim</a></th>
                            <th><a href="/order/tasks/ordsit">Situação</a></th>
                            <th style="width: 140px">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($tasks) && ( is_array($tasks) || $tasks instanceof Traversable ) && sizeof($tasks) ) foreach( $tasks as $key1 => $value1 ){ $counter1++; ?>
                                <tr>
                                    <td><?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo htmlspecialchars( $value1["destask"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo formatDate($value1["dtstart"]); ?></td>
                                    <td><?php echo formatDate($value1["dtfinish"]); ?></td>
                                    <td>
                                        <?php if( $value1["sttask"] == 0 ){ ?>
                                            <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/situation/tasks<?php echo htmlspecialchars( $link, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs"><i class="far fa-folder-open"></i> Aberto </a>
                                        <?php }else{ ?>
                                            <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/situation/tasks<?php echo htmlspecialchars( $link, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger btn-xs"><i class="far fa-folder"></i> Fechado</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a><a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.box-body -->
            </div>

            <div class="product-pagination text-center">
                <nav>
                    <ul class="pagination">

                        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                            <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                        <?php } ?>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section> <!-- /.content -->

<!--
####################################################################################################################
                                        BELOW IS THE FOOTER
####################################################################################################################
-->
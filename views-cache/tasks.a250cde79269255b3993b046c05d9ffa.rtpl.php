<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/tasks">Tarefas</a></li>
    </ol>
</section> <!-- /.content-header -->

<section class="content-header">
    <h1>
        Lista de Tarefas
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header">
                    <a href="/tasks/create" class="btn btn-success">Cadastrar Tarefa</a>
                </div> <!-- /.box-header -->

                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome Tarefa</th>
                            <th>Nome Projeto</th>
                            <th>Data Incício</th>
                            <th>Data Fim</th>
                            <th>Situação</th>
                            <th style="width: 140px">Opções</th>
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
                                    <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/situation" class="btn btn-danger btn-xs"><i class="fa fa-folder"></i> Fechado</a>
                                <?php }else{ ?>
                                    <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/situation" class="btn btn-primary btn-xs"><i class="fa fa-folder-open"></i> Aberto </a>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                <a href="/tasks/<?php echo htmlspecialchars( $value1["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                            </td>
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
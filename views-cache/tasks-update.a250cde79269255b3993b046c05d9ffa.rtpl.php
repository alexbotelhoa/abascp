<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/tasks">Tarefas</a></li>
        <li class="active"><a href="/tasks/<?php echo htmlspecialchars( $task["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Editar</a></li>
    </ol>
</section> <!-- /.content-header -->

<section class="content-header">
    <h1>
        Editar Tarefa
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Editar Tarefa</h3>
                </div> <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="/tasks/<?php echo htmlspecialchars( $task["idtask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="destask">Nome Tarefa</label>
                            <input type="text" class="form-control" id="destask" name="destask" placeholder="Digite o nome da tarefa" value="<?php echo htmlspecialchars( $task["destask"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                        <div class="form-group">
                            <label for="idproject">Nome Projeto</label>
                            <select class="form-control" name="idproject">
                                <?php $counter1=-1;  if( isset($projects) && ( is_array($projects) || $projects instanceof Traversable ) && sizeof($projects) ) foreach( $projects as $key1 => $value1 ){ $counter1++; ?>

                                <option <?php if( $value1["idproject"] === $task["idproject"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dtstart">Data Início</label>
                            <input type="date" class="form-control" id="dtstart" name="dtstart" step="0.01" placeholder="dd/mm/yyy" value="<?php echo htmlspecialchars( $task["dtstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                        <div class="form-group">
                            <label for="dtfinish">Data Fim</label>
                            <input type="date" class="form-control" id="dtfinish" name="dtfinish" step="0.01" placeholder="dd/mm/yyy" value="<?php echo htmlspecialchars( $task["dtfinish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section> <!-- /.content -->

<!--
####################################################################################################################
                                        BELOW IS THE FOOTER
####################################################################################################################
-->
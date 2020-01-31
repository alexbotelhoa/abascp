<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="container">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li><a href="/projects">Projetos</a></li>
        <li class="active"><a href="/projects/<?php echo htmlspecialchars( $project["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update">Editar</a></li>
    </ol>
</section> <!-- /.content-header -->

<section class="container">
    <h1>
        Editar Projeto
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Editar Projeto</h3>
                </div> <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="/projects/<?php echo htmlspecialchars( $project["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="desproject">Nome Projeto</label>
                        <input type="text" class="form-control" id="desproject" name="desproject" placeholder="Digite o nome do produto" value="<?php echo htmlspecialchars( $project["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>
                      <div class="form-group">
                        <label for="dtstart">Data Início</label>
                        <input type="date" class="form-control" id="dtstart" name="dtstart" step="0.01" placeholder="dd/mm/yyy" value="<?php echo htmlspecialchars( $project["dtstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>
                      <div class="form-group">
                        <label for="dtfinish">Data Fim</label>
                        <input type="date" class="form-control" id="dtfinish" name="dtfinish" step="0.01" placeholder="dd/mm/yyy" value="<?php echo htmlspecialchars( $project["dtfinish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
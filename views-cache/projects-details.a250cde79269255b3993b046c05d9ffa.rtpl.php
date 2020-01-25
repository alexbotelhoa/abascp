<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/projects">Projetos</a></li>
        <li class="active"><a href="/projects/<?php echo htmlspecialchars( $project["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Detalhar</a></li>
    </ol>
</section> <!-- /.content-header -->

<section class="content-header">
    <h1>
        Detalhar Projeto
    </h1>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">


            <?php if( $project["stproject"] == 0 ){ ?>
                <div class="box box-success">
                    <?php }else{ ?>
                <div class="box box-danger">
            <?php } ?>
                <div class="box-header with-border">
                    <h3 class="box-title">Detalhar Projeto</h3>
                </div> <!-- /.box-header -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="desproject">Nome Projeto</label>
                        <input type="text" class="form-control" id="desproject" name="desproject" readonly value="<?php echo htmlspecialchars( $project["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="dtstart">Data Início</label>
                        <input type="date" class="form-control" id="dtstart" name="dtstart" step="0.01" readonly value="<?php echo htmlspecialchars( $project["dtstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="dtfinish">Data Fim</label>
                        <input type="date" class="form-control" id="dtfinish" name="dtfinish" step="0.01" readonly value="<?php echo htmlspecialchars( $project["dtfinish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="rtproject">Rate</label>
                        <input type="text" class="form-control" id="rtproject" name="rtproject" step="0.01" readonly value="<?php echo htmlspecialchars( $project["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%">
                    </div>
                    <div class="form-group">
                        <label for="stproject">Atrasado</label>
                        <input type="text" class="form-control" id="stproject" name="stproject" step="0.01" readonly value="<?php echo htmlspecialchars( $status, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

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
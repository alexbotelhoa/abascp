<?php if(!class_exists('Rain\Tpl')){exit;}?><!--
####################################################################################################################
                                        ABOVE IS THE HEADER
####################################################################################################################
-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastrar Projeto
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/projects">Projetos</a></li>
        <li class="active"><a href="/projects/create">Cadastrar</a></li>
    </ol>
</section> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">

                <div class="box-header with-border">
                    <h3 class="box-title">Novo Projeto</h3>
                </div> <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="/projects/create" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="desproject">Nome do Projeto</label>
                            <input type="text" class="form-control" id="desproject" name="desproject" placeholder="Digite o nome do projeto">
                        </div>
                        <div class="form-group">
                            <label for="dtstart">Data de Início</label>
                            <input type="date" class="form-control" id="dtstart" name="dtstart" step="0.01" placeholder="dd/mm/yyy">
                        </div>
                        <div class="form-group">
                            <label for="dtfinish">Data de Finalização</label>
                            <input type="date" class="form-control" id="dtfinish" name="dtfinish" step="0.01" placeholder="dd/mm/yyyy">
                        </div>
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
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
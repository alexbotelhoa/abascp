<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="container">
    <ol class="breadcrumb">
        <li><a href="/abascp1"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active"><a href="/abascp1/projects">Projetos</a></li>
    </ol>
</section>
<section class="container">
    <h1>
        Lista de Projetos
    </h1>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-xs-4">
                        <a href="/abascp1/projects/create" class="btn btn-success">Cadastrar Projeto</a>
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
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px"><a href="/abascp1/order/projects/ordid">#</a></th>
                            <th><a href="/abascp1/order/projects/ordproj">Nome Projeto</a></th>
                            <th><a href="/abascp1/order/projects/ordini">Data Incício</a></th>
                            <th><a href="/abascp1/order/projects/ordfim">Data Fim</a></th>
                            <th><a href="/abascp1/order/projects/ordrate">Rate</a></th>
                            <th><a href="/abascp1/order/projects/ordlate">Late</a></th>
                            <th>Task</th>
                            <th style="width: 140px">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter1=-1;  if( isset($projects) && ( is_array($projects) || $projects instanceof Traversable ) && sizeof($projects) ) foreach( $projects as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["desproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDateS($value1["dtstart"]); ?></td>
                            <td><?php echo formatDateS($value1["dtfinish"]); ?></td>
                            <td><?php echo htmlspecialchars( $value1["rtproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</td>
                            <?php if( $value1["stproject"] == 0 ){ ?>
                            <td class="bg-green" align="center">Não</td>
                            <?php }else{ ?>
                            <td class="bg-red" align="center">Sim</td>
                            <?php } ?>
                            <td align="center"><?php echo qtdTask($value1["idproject"]); ?></td>
                            <td>
                                <a href="/abascp1/projects/<?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a><a
                                    href="/abascp1/projects/<?php echo htmlspecialchars( $value1["idproject"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')"
                                    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
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
</section>
<?php include __DIR__."/../../include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/../../include/sidemenu.php"; ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center" style="background-color:#ce4926 !important">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="/assets/media/logo/logo-min-2.png" class="mx-auto img-fluid"></div>
    
    </nav>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12"><h3>Pedidos</h3></div>
        </div>
        <form action="/pedido/listar/<?php echo $page; ?>">
        <div class="row">
            <div class="col-md-6">
            <?php if($_SESSION['uLevel'] != 2): ?>
                <div class="col-md-12 p-2 font-weight-bold">Restaurantes</div>
                <div class="col-md-12 p-2">
                    <select name="request_restaurant_id" class="form-control">
                        <option value="">Selecione o Restaurante</option>
                        <?php foreach($rows as $row): ?>
                            <?php if($row['user_id'] == $filter['request_restaurant_id']): ?>
                            <option value="<?php echo $row['user_id']; ?>" selected><?php echo $row['user_name']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_name']; ?></option>
                            
                            <?php endif; endforeach; ?>
                    </select>
                </div>
            <?php else: ?>
                <div class="col-md-12 p-2 font-weight-bold">Restaurante</div>
                <div class="col-md-12 p-2"><?php echo $_SESSION['uName']; ?>
                </div>
            <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 p-2 font-weight-bold">N.° do pedido</div>
                <div class="col-md-12 p-2">
                    <input type="text" name="request_id" class="form-control" value="<?php if(!empty($filter['request_id'])): echo $filter['request_id']; endif; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 p-2 font-weight-bold">Nome do cliente</div>
                <div class="col-md-12 p-2">
                    <input type="text" name="client_name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 p-2 font-weight-bold">Status do Pedidio</div>
                <div class="col-md-12 p-2">
                    <select name="request_situation" class="form-control">
                        <option value="">Selecione a Situação do Pedido</option> 
                        <option value="1" <?php if(!empty($filter['request_situation'])): if($filter['request_situation'] == 1): echo "selected"; endif; endif; ?>>Processando</option> 
                        <option value="2" <?php if(!empty($filter['request_situation'])): if($filter['request_situation'] == 2): echo "selected"; endif; endif; ?>>Preparando</option> 
                        <option value="3" <?php if(!empty($filter['request_situation'])): if($filter['request_situation'] == 3): echo "selected"; endif; endif;; ?>>Pronto</option> 
                        <option value="4" <?php if(!empty($filter['request_situation'])): if($filter['request_situation'] == 4): echo "selected"; endif; endif; ?>>Entregue</option> 
                    </select>
                </div>
            </div>
            <div class="col-md-4 offset-md-8 text-right">
            <button type="submit" class="btn btn-danger p-2 mr-1"><i class="fas fa-search"></i> Buscar</button>
            </div>
        </div>
        </form>
        <?php 
            $sit = [1=> 'Processando',2=>'Preparando',3=>'Pronto',4=>'Entregue'];
        ?>
        <div class="row mt-5">
            <div class="col-md-12">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>N.° do Pedido</th>
                            <th>Data do Pedido</th>
                            <th>Restaurante</th> 
                            <th>Situação do Pedido</th> 
                            <th width="5%">Editar</th>
                            <th width="5%">Deletar</th> 
                        </tr>
                    </thead>
                    <?php foreach($datas as $data): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['request_id']; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($data['request_date'])); ?></td>
                            <td><?php echo $data['request_restaurant_id']; ?></td> 
                            <td><?php echo $sit[$data['request_situation']]; ?></td> 
                            <td><a href="/pedido/editar/<?php echo $data['request_id']; ?>" class="text-decoration-none"><i class="far fa-edit"></i></a></td>
                            <td><a href="/pedido/deletar/<?php echo $data['request_id']; ?>" class="text-decoration-none"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-12">
            <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php
             $previous = $page -1;
             $next = $page +1;
            if($page>1):
            ?>
                <li class="page-item">
                <a class="page-link" href="/pedido/listar/<?php echo $previous; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
            <?php endif; ?>
            <?php for($i = 0; $i <= $total_page;$i++): ?>
                <li class="page-item"><a class="page-link" href="/pedido/listar/<?php echo $i; ?>"><?php echo $i+1; ?></a></li> 
            <?php endfor; ?>
            <?php if($page < $total_page): ?>
                <li class="page-item">
                <a class="page-link" href="/pedido/listar/<?php echo $next; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            <?php endif; ?>
            </ul>
            </nav>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__."/../../include/footer.php"; ?>
<?php include __DIR__."/../../include/message.php"; ?>
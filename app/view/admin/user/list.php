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
            <div class="col-md-12"><h3>Usuários</h3></div>
            <div class="col-md-12 text-right"><a href="/usuario/adicionar" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Usuário</a>
            </div>
            <div class="col-md-12 mt-5">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th> 
                            <th width="5%">Editar</th>
                            <th width="5%">Deletar</th> 
                        </tr>
                    </thead>
                    <?php foreach($datas as $data): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['user_id']; ?></td>
                            <td><?php echo $data['user_name']; ?></td>
                            <td><?php echo $data['user_mail']; ?></td> 
                            <td><a href="/usuario/editar/<?php echo $data['user_id']; ?>" class="text-decoration-none"><i class="far fa-edit"></i></a></td>
                            <td><a href="/usuario/deletar/<?php echo $data['user_id']; ?>" class="text-decoration-none"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
      </div>
<?php include __DIR__."/../../include/footer.php"; ?>
<?php include __DIR__."/../../include/message.php"; ?>
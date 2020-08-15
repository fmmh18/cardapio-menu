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
            <div class="col-md-12"><a href="javascript:window.history.back()" class="btn btn-danger"><i class="fas fa-hand-point-left"></i> Voltar<a></div>
            <div class="col-md-12 mt-3"><h3>Adicionar Usuário</h3></div>
        </div>
        <form action="/usuario/adicionar/{$slug}" method="post">
            <?php if($slug == 'administrador'): ?>
                <div class="form-group">
                    <label for="user_name">Nome</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Nome completo">
                </div>
                <div class="form-group">
                    <label for="user_mail">E-mail</label>
                    <input type="email" class="form-control" name="user_mail" id="user_mail" placeholder="example@example.com">
                </div>
                <div class="form-group">
                    <label for="user_password">Senha</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Senha">
                </div>
            <?php elseif($slug == 'restaurante'): ?>
            <?php endif; ?>
                <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="far fa-save"></i> Salvar</button>
            </form>
      </div>
<?php include __DIR__."/../../include/footer.php"; ?>
<?php include __DIR__."/../../include/message.php"; ?>
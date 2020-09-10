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
            <div class="col-md-12 mt-3"><h3>Editar Usuário</h3></div>
        </div>
        
        <form action="/usuario/editar" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <input type="hidden" name="user_image_old" value="<?php echo $user['user_image']; ?>">
                <div class="form-group">
                    <label for="user_name" class="font-weight-bold">Nome</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Nome Completo" value="<?php echo $user['user_name']; ?>">
                </div> 
                <div class="form-group">
                    <label for="user_mail" class="font-weight-bold">E-mail</label>
                    <input type="email" class="form-control" name="user_mail" id="user_mail" placeholder="example@example.com" value="<?php echo $user['user_mail']; ?>">
                </div>
                <div class="form-group">
                    <label for="user_password" class="font-weight-bold">Senha</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Senha" value="<?php echo $user['user_password']; ?>">
                </div> 
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="restaurant_phone" class="font-weight-bold">Telefone Contato</label>
                    <input type="text" class="form-control" name="user_phone" id="phone" placeholder="(99) 9999-9999" value="<?php echo $user['user_phone']; ?>">
                </div> 
                <div class="form-group col-md-6">
                    <label for="restaurant_cellphone" class="font-weight-bold">Telefone Celular</label>
                    <input type="text" class="form-control" name="user_cellphone" id="phone" placeholder="(99) 99999-9999" value="<?php echo $user['user_cellphone']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="zipcode" class="font-weight-bold">CEP</label>
                    <input type="text" class="form-control" name="user_zipcode" id="zipcode" placeholder="99999-999" value="<?php echo $user['user_zipcode']; ?>">
                </div> 
                <div class="form-group col-md-6">
                    <label for="address" class="font-weight-bold">Endereço</label>
                    <input type="text" class="form-control" name="user_address" id="address" placeholder="Endereço" value="<?php echo $user['user_address']; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="restaurant_number" class="font-weight-bold">Número</label>
                    <input type="text" class="form-control" name="user_number" id="restaurant_number" placeholder="Número" value="<?php echo $user['user_number']; ?>">
                </div>  
                <div class="form-group col-md-6">
                    <label for="neighborhood" class="font-weight-bold">Bairro</label>
                    <input type="text" class="form-control" name="user_neighborhood" id="neighborhood" placeholder="Bairro" value="<?php echo $user['user_neighborhood']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="complement" class="font-weight-bold">Complemento</label>
                    <input type="text" class="form-control" name="user_complement" id="complement" placeholder="Complemento" value="<?php echo $user['user_complement']; ?>">
                </div> 
                <div class="form-group col-md-9">
                    <label for="city" class="font-weight-bold">Cidade</label>
                    <input type="text" class="form-control" name="user_city" id="city" placeholder="Cidade" readonly value="<?php echo $user['user_city']; ?>">
                </div> 
                <div class="form-group col-md-3">
                    <label for="state" class="font-weight-bold">Estado</label>
                    <input type="text" class="form-control" name="user_state" id="state" placeholder="Estado" readonly value="<?php echo $user['user_state']; ?>">
                </div> 
                
                </div>
                <div class="custom-file mb-3">
                    <input type="file" name="user_image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile" data-browse="Selecione o arquivo">Selecione seu arquivo</label>
                </div>
                <?php if($_SESSION['uLevel'] == 1): ?>
                <div class="form-group">
                    <label for="user_level" class="font-weight-bold">Perfil</label>
                    <select name="user_level" id="user_level" class="form-control">
                        <option value="">Selecione</option>
                        <option value="1" <?php if($user['user_level'] == 1): echo "selected"; endif; ?>>Administrador</option>
                        <option value="2" <?php if($user['user_level'] == 2): echo "selected"; endif; ?>>Restaurante</option>
                        <option value="3" <?php if($user['user_level'] == 3): echo "selected"; endif; ?>>Cliente</option>
                    </select> 
                </div> 
                <div class="form-group">
                    <label for="user_status" class="font-weight-bold">Perfil</label>
                    <select name="user_status" class="form-control">
                        <option value="">Selecione</option>
                        <option value="1" <?php if($user['user_status'] == 1): echo "selected"; endif; ?>>Ativo</option>
                        <option value="2" <?php if($user['user_status'] == 0): echo "selected"; endif; ?>>Inativo</option> 
                    </select> 
                </div> 
                <?php else: ?>
                <input type="hidden" name="user_level" value="<?php echo $user['user_level']; ?>">
                <input type="hidden" name="user_status" value="<?php echo $user['user_status']; ?>">
                <?php endif; ?>
                <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="far fa-save"></i> Salvar</button>
            </form>
      </div>
<?php include __DIR__."/../../include/footer.php"; ?>
<?php include __DIR__."/../../include/message.php"; ?>
<?php include __DIR__."/../../include/mask.php"; ?>
<?php include __DIR__."/../../include/cep.php"; ?>
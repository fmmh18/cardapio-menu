<div class="bg-dark text-white" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
          <?php if(!empty($_SESSION['uID'])): ?>
          <div>
          <?php if($_SESSION['uLevel'] != 2): ?>
          <div class="row mb-2">
            <div class="col-md-4"><img src="/<?php echo getenv('APP_UPLOADIMAGE').$_SESSION['uFoto'];?>" class="img-fluid rounded-circle p-1"></div>
            <div class="col-md-7"><div class="mt-1"><?php echo $_SESSION['uName']; ?><a href="usuario/editar/<?php echo $_SESSION['uID']; ?>" class="badge badge-info"><i class="fas fa-user-edit"></i> Editar</a></div></div>
          </div>
          <?php else: ?>
            <div class="row mb-2">
            <div class="col-md-4"><img src="/<?php echo getenv('APP_UPLOADLOGO').$_SESSION['uFoto'];?>" class="img-fluid rounded-circle p-2"></div>
            <div class="col-md-7"><div class="mt-1"><?php echo $_SESSION['uName']; ?><a href="usuario/editar/<?php echo $_SESSION['uID']; ?>" class="badge badge-info"><i class="fas fa-user-edit"></i> Editar</a></div></div>
          </div>
          <?php endif; ?>
          </div>
          <?php endif; ?>
          <a href="/"  class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-home"></i> Início</a>
          <a href="/restaurante"  class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-utensils"></i> Restaurante</a>
          <?php if(empty($_SESSION['uID'])): ?>
            <a href="/login" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-in-alt"></i> Login</a>
          <?php else: ?>
          <?php if($_SESSION['uLevel'] == 1): ?>
              <a href="/usuario/listar" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-user"></i> Usuários</a>
              <a href="/cardapio/listar" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Cardápio</a>   
              <a href="/categoria/listar" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-list"></i> Categoria</a>  
              <a href="/pedido/listar/0" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar"></i> Pedido</a>  
          <?php elseif($_SESSION['uLevel'] == 2): ?>
              <a href="/pedido/listar/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar"></i> Pedido</a>  
              <a href="/cardapio/listar/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Cardápio</a>   
              <a href="/categoria/listar/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-list"></i> Categoria</a>  
          <?php elseif($_SESSION['uLevel'] == 3): ?>     
              <a href="/pedido" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar"></i> Pedido</a>  
          <?php endif; ?> 
          <?php endif; ?>
            <a href="/sair" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-out-alt"></i> Sair</a>
      </div>
</div>
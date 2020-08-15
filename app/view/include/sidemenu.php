<div class="bg-dark text-white" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
          <a href="/"  class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-home"></i> Início</a>
          <a href="/restaurante"  class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-utensils"></i> Restaurante</a>
          <?php if(empty($_SESSION['uID'])): ?>
            <a href="/login" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-in-alt"></i> Login</a>
          <?php else: ?>
            <a href="/usuario/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-user"></i> <?php echo $_SESSION['uName']; ?></a>
            <?php if($_SESSION['uLevel'] == 1): ?>
              <a href="/usuario/listar" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-user"></i> Usuários</a>
              <a href="/cardapio/listar" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Cardápio</a>   
              <a href="/categoria/listar" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-list"></i> Categoria</a>  
              <a href="/pedido" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar"></i> Pedido</a>  
          <?php elseif($_SESSION['uLevel'] == 2): ?>
              <a href="/pedido/listar/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar"></i> Pedido</a>  
              <a href="/cardapio/listar/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-book"></i> Cardápio</a>   
              <a href="/categoria/listar/<?php echo $_SESSION['uID']; ?>" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-list"></i> Categoria</a>  
            <?php elseif($_SESSION['uLevel'] == 3): ?>     
              <a href="/pedido" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar"></i> Pedido</a>  
            <?php endif; ?> 
            <a href="/sair" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-out-alt"></i> Sair</a>
          <?php endif; ?>
      </div>
</div>
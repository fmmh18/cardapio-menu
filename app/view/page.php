<?php include __DIR__."/include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/include/sidemenu.php"; ?>
    <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center" style="background-color:#ce4926 !important">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="/assets/media/logo/logo-min-2.png" class="mx-auto img-fluid"></div>
    
    </nav>
    <?php if(!empty($page['page_html'])): 
            echo $page['page_html']; 
          endif; 
    ?>  
<?php if($pagina == 'restaurant'): ?>
<?php foreach($datas as $data): ?>
<div class="card shadow-lg p-1 mb-5 bg-white rounded">
  <img src="<?php echo getenv('APP_UPLOADLOGO').$data['restaurant_logo'] ?>" width="120" height="120" class="mx-auto">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['restaurant_name']; ?></h5>
    <p class="card-text"><?php echo 'Endereço: '.$data['restaurant_address'].' Bairro: '.$data['restaurant_neighbor'].'<br/>Cidade/Estado: '.$data['restaurant_city'].'/'.$data['restaurant_state'].'<br/>CEP: '.$data['restaurant_zipcode']; ?></p>
    <div class="text-center"><a href="/cardapio/<?php echo $data['restaurant_slug']; ?>" class="btn btn-primary">Cardápio</a></div>
  </div>
</div>
<?php endforeach; ?>
<?php endif; ?> 
</div>
<?php include __DIR__."/include/footer.php"; ?> 
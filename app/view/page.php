<?php include __DIR__."/include/header.php"; ?>
<nav class="navbar navbar-light bg-light text-white text-center" style="background-color:#ce4926 !important">
    <div class="col-12 text-center"><img src="/assets/media/logo/logo-min-2.png" width="140" height="65" class="d-inline-block align-top" alt="" loading="lazy">
</div>
</nav>
    <?php if(!empty($page['page_html'])): 
            echo $page['page_html']; 
          endif; 
    ?>
<div class="container mt-5">
<div class="col-12">
<?php if($pagina == 'restaurant'): ?>
<?php foreach($datas as $data): ?>
<div class="card shadow-lg p-1 mb-5 bg-white rounded" style="width: 18rem;">
  <img src="<?php echo getenv('APP_UPLOADLOGO').$data['restaurant_logo'] ?>" width="120" height="120" class="mx-auto">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['restaurant_name']; ?></h5>
    <p class="card-text"><?php echo 'Endereço: '.$data['restaurant_address'].' Bairro: '.$data['restaurant_neighbor'].'<br/>Cidade/Estado: '.$data['restaurant_city'].'/'.$data['restaurant_state'].'<br/>CEP: '.$data['restaurant_zipcode']; ?></p>
    <div class="text-center"><a href="/cardapio/<?php echo $data['restaurant_id']; ?>" class="btn btn-primary">Cardápio</a></div>
  </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
<?php include __DIR__."/include/footer.php"; ?>
<?php include __DIR__."/include/modal.php"; ?>
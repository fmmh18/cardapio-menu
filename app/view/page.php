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
<?php elseif($pagina == 'menu'): ?>
<div class="row shadow-lg p-3 mb-5 bg-white rounded">
<div class="col-2">
<img src="<?php echo getenv('APP_UPLOADLOGO').$restaurant['restaurant_logo'] ?>" width="120" height="120" class="mx-auto">
</div>
<div class="col-10">
<b class="h3"><?php echo $restaurant['restaurant_name']; ?></b>
<p><?php echo 'Endereço: '.$restaurant['restaurant_address'].' Bairro: '.$restaurant['restaurant_neighbor'].'<br/>Cidade/Estado: '.$restaurant['restaurant_city'].'/'.$restaurant['restaurant_state'].'<br/>CEP: '.$restaurant['restaurant_zipcode']; ?></p>
<p>
<?php if(!empty($restaurant['restaurant_phone'])): ?>
<i class="fa fa-phone"></i> <?php echo $restaurant['restaurant_phone']; ?>&nbsp;&nbsp;
<?php endif; ?>
<?php if(!empty($restaurant['restaurant_cellphone'])): ?>
<i class="fa fa-whatsapp"></i> <?php echo $restaurant['restaurant_cellphone']; ?>&nbsp;&nbsp;
<?php endif; ?>
<?php if(!empty($restaurant['restaurant_mail'])): ?>
<i class="fa fa-envelope"></i> <?php echo $restaurant['restaurant_mail']; ?>
<?php endif; ?>
</p>
</div>
</div>
<form action="/pedido" method="post">
<?php foreach($rows as $row): ?>
<div class="col-12"><h3><?php echo $row['category_name'];?></h3></div>
<?php foreach($datas as $data): ?>
<?php if($row['category_name'] == $data['category_name']): ?>
    <div class="col-12 shadow-sm p-3 mb-4 bg-white rounded">
        <div class="row">
            <div class="col-2"><img src="<?php echo getenv('APP_UPLOADIMAGE').$data['product_image']?>" class="img-thumbnail"></div>
            <div class="col-8"><b class="h5"><?php echo $data['product_name']; ?></b><br/>
                               <?php echo $data['product_description']; ?><br/>
                               <b><?php echo 'R$ '.number_format($data['product_price'],2,'.',','); ?></b>
            </div>
            <div class="col-2">
                <input type="number" class="form-control" name="<?php echo $data['product_tag']?>" min="0">
            </div>
        </div>
    </div>
<?php endif;?>
<?php endforeach; ?>
<?php endforeach; ?>
<button type="submit" class="btn btn-danger btn-lg btn-block mb-5"><i class="fa fa-shopping-cart"></i> Finalizar Pedido</button>
</form>
<?php endif; ?>
</div>
</div>
<?php include __DIR__."/include/footer.php"; ?>
<?php include __DIR__."/include/modal.php"; ?>
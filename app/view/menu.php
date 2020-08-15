<?php include __DIR__."/include/header.php"; ?>
<div class="d-flex" id="wrapper">
<?php include __DIR__."/include/sidemenu.php"; ?>
    <div id="page-content-wrapper">
    <nav class="navbar navbar-light bg-light text-white text-center" style="background-color:#ce4926 !important">
        <button class="btn btn-outline-secondary text-white" id="menu-toggle"> <span class="navbar-toggler-icon"></span></button>
        <div class="col-md-10 text-center"><img src="/assets/media/logo/logo-min-2.png" class="mx-auto img-fluid"></div>
    
    </nav>
     
<div class="col-md-12">
<div class="row shadow-lg p-3 mb-5 bg-white rounded">
<div class="col-md-2">
<img src="<?php echo getenv('APP_UPLOADLOGO').$restaurant['restaurant_logo'] ?>" class="mx-auto img-fluid">
</div>
<div class="col-md-10">
<b class="h3"><?php echo $restaurant['restaurant_name']; ?></b>
<p><?php echo 'Endereço: '.$restaurant['restaurant_address'].' Bairro: '.$restaurant['restaurant_neighbor'].'<br/>Cidade/Estado: '.$restaurant['restaurant_city'].'/'.$restaurant['restaurant_state'].'<br/>CEP: '.$restaurant['restaurant_zipcode']; ?></p>
<p>
<?php if(!empty($restaurant['restaurant_phone'])): ?>
<i class="fa fa-phone"></i> <?php echo $restaurant['restaurant_phone']; ?>&nbsp;&nbsp;
<?php endif; ?>
<?php if(!empty($restaurant['restaurant_cellphone'])): ?>
<i class="fab fa-whatsapp"></i> <?php echo $restaurant['restaurant_cellphone']; ?>&nbsp;&nbsp;
<?php endif; ?>
<?php if(!empty($restaurant['restaurant_mail'])): ?>
<i class="fa fa-envelope"></i> <?php echo $restaurant['restaurant_mail']; ?>
<?php endif; ?>
</p>
</div>
</div> 
<input type="hidden" name="restaurant_id" value="<?php echo $id; ?>">
<?php foreach($rows as $row): ?>
<div class="col-12"><h3><?php echo $row['category_name'];?></h3></div>
<?php foreach($datas as $data): ?>
<?php if($row['category_name'] == $data['category_name']): ?>
    <a href="/prato/<?php echo $restaurant['restaurant_slug'].'/'.$data['product_slug']?>" class="text-decoration-none">
    <div class="col-md-12 shadow-sm p-3 mb-4 bg-white rounded">
        <div class="row">
            <div class="col-md-2"><img src="<?php echo getenv('APP_UPLOADIMAGE').$data['product_image']?>" class="img-fluid"></div>
            <div class="col-md-10"><b class="h5"><?php echo $data['product_name']; ?></b><br/>
                               <?php echo $data['product_description']; ?><br/>
                               <b><?php echo 'R$ '.number_format($data['product_price'],2,',','.'); ?></b>
            </div> 
        </div>
    </div>
<?php endif;?>
</a>
<?php endforeach; ?>
<?php endforeach; ?> 
</div>
</div>
</div>

<?php include __DIR__."/include/footer.php"; ?>
<?php include __DIR__."/include/message.php"; ?>
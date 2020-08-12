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
<form action="/finalizar" method="post">
<?php unset($resquests['restaurant_id']);  
      $i = 1;
      foreach($datas as $data):
      if($data['product_id'] == $resquests[$i]): ?>
    <div class="col-md-12 shadow-sm p-3 mb-4 bg-white rounded">
        <div class="row">
            <div class="col-md-2"><img src="<?php echo getenv('APP_UPLOADIMAGE').$data['product_image']?>" class="img-fluid"></div>
            <div class="col-md-8"><b class="h5"><?php echo $data['product_name']; ?></b><br/>
                               <?php echo $data['product_description']; ?><br/>
                               <b><?php echo 'R$ '.number_format($data['product_price'],2,',','.'); ?></b>
            </div>
            <div class="col-md-2 mt-3">
               <span class="h4"><?php echo $resquests[$i]; ?></span>
            </div>
        </div>
        <?php $total += $resquests[$i] * $data['product_price']; ?>
    </div>
<?php 
      endif;
      $i++;
      endforeach; 
?>
<div class="col-md-12 p-5">
    <div class="row">
        <input type="hidden" name="total" value="<?php echo number_format($total,2,',','.'); ?>">
        <div class="col-12 text-right"><b class="h5">Total: <?php echo 'R$ '.number_format($total,2,',','.'); ?></b></div> 
    </div>
</div>
<div class="col-md-12 p-5">
    <div class="row">
    <div class="col-md-12"><b class="h4">Forma de Pagamento</b></div>
    <div class="col-md-12 p-3"><select name="payment" class="selectpicker" data-width="100%" data-show-content="true" id="payment">
                            <option value="">Selecione a forma de pagamento</option>
                            <option value="1" data-icon="fas fa-wallet">Dinheiro</option>
                            <option value="2" data-icon="fas fa-credit-card">Cartão de Crédito e/ou Débito</option>
                            </select>
    </div>
    </div>
</div>
<div class="col-md-12 p-5" id="change_payment">
    <div class="row">
    <div class="col-md-12"><b class="h4">Troco</b></div>
    <div class="col-md-12"><input type="text" name="change_payment" class="form-control" id="change_money"></div>
    </div>
</div>
<div class="col-md-12 p-5">
    <div class="row">
        <div class="col-md-12">
        <div class="custom-control custom-switch custom-switch-lg">
            <input type="checkbox" class="custom-control-input" id="delivery" checked onclick="validaEntrega()">
            <label class="custom-control-label" for="delivery"><i class="fas fa-shipping-fast"></i> Entregar</label>
        </div>
        </div>
    </div>
</div>
<div class="col-md-12 p-5" id="address">
    <div class="row">
        <div class="col-md-12"><b class="h4">Endereço para entregar</b></div>
        <div class="col-md-12"><b><?php echo $client['client_name']; ?></b></div>
        <div class="col-md-12"><?php echo $client['client_address'].' - n°'.$client['client_number'].'<br/>Bairro: '.$client['client_neighbor'].' - '.$client['client_city'].'/'.$client['client_state']; ?></div>
    </div>
</div>
<div class="col-md-12 p-5">
    <div class="row">
    <div class="col-md-12"><button type="submit" class="btn btn-danger btn-lg btn-block mb-5"><i class="fas fa-shopping-cart"></i> Finalizar</button></div>
    </div>
</div>
</form>
<?php include __DIR__."/include/footer.php"; ?>
<?php include __DIR__."/include/modal.php"; ?>
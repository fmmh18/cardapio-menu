<?php include __DIR__."/include/header.php"; ?>
<style>
body{
    background-color: #f45c34
}
</style>
<div class="container p-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <img src="<?php echo getenv('APP_HOST')?>/assets/media/logo/error.png" class="img-fluid">
            <p style="font-size:4rem;font-weight:bolder">Opsss!! <?php echo $errorcode; ?></p>
            <?php if($errorcode = 404): ?>
            <p style="font-size:2rem;font-weight:bolder">Página não encontrada!</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include __DIR__."/include/footer.php"; ?>
<?php include __DIR__."/include/modal.php"; ?>
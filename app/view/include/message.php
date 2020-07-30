<?php if(!empty($status['message'])){ ?>
 <?php if($status['message'] == 'sucesso'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.success(<?php echo '"'.$message.'"'; ?>);

    });
</script> 
<?php }  else if($status['message'] == 'erro-login'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.error(<?php echo '"'.$message.'"'; ?>);

    });
</script> 
<?php }  else if($status['message'] == 'arquivo-invalido'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.error(<?php echo '"'.$message.'"'; ?>);

    });
</script> 
<?php }  else if($status['message'] == 'erro-upload'){ ?>
 <script>
    $(document).ready(function(){  
    toastr.error(<?php echo '"'.$message.'"'; ?>);

    });
</script> 
<?php } ?> 
<?php } ?>
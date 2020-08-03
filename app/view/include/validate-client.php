<script>
$(function(){
    $("#register-client").validate({
        rules : {
                name:{
                        required:true,
                        minlength:3
                },
                mail:{
                        required:true
                },
                phone:{
                        required:true
                },
                password:{
                        required:true
                }, 
                zipcode:{
                        required:true
                }, 
                address:{
                        required:true
                }, 
                neighborhood:{
                    required:true
                }                          
        },
        messages:{
                name:{
                        required:"Por favor, informe seu nome",
                        minlength:"O nome deve ter pelo menos 3 caracteres"
                },
                mail:{
                        required:"É necessário informar um email"
                },
                phone:{
                        required:"É necessário informar um telefone"
                },
                password:{
                        required:"A senha não pode ficar em branco"
                },
                zipcode:{
                        required:"O CEP não pode ficar em branco"
                },
                address:{
                        required:"O Endereço não pode ficar em branco"
                },
                neighborhood:{
                        required:"O Bairro não pode ficar em branco"
                }        
        }
    });
});
</script>
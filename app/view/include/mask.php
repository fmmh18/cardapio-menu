<script>
    $(document).ready(function(){
      var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      options = {onKeyPress: function(val, e, field, options) {
              field.mask(maskBehavior.apply({}, arguments), options);
          }
      };
    $('#phone').mask(maskBehavior, options);
    $("#cpf").mask('000.000.000-00');
    $("#zipcode").mask('00000-000');
    });
    </script>
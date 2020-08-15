    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?php echo getenv('APP_HOST'); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo getenv('APP_HOST'); ?>/assets/js/bootstrap-input-spinner.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"></script>
    <script> 
        $("#change_payment").hide();
        $('#change_money').mask('000.000.000.000.000,00', {reverse: true});
        $("input[type='number']").inputSpinner(); 
        $("#wrapper").addClass("toggled");
        $('#payment').selectpicker();
        $('#delivery').val(1);
        function validaEntrega() {
        if($('#delivery').is(":checked") == true)
        {
            $('#delivery').val(1);
            $('#address').fadeIn(1500);
        }else{
            
            $('#delivery').val(0);
            $('#address').fadeOut(1500); 
        }
        }
        $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $('#payment').change(function (){
     if($(this).val() == 1)
     {
        $('#change_payment').fadeIn(1500);
     }else{
        $('#change_payment').fadeOut(1500);
     }
     });
     $('#table').DataTable({
        "language": {
                "sEmptyTable":   "Não foi encontrado nenhum registo",
                "sLoadingRecords": "A carregar...",
                "sProcessing":   "A processar...",
                "sLengthMenu":   "Mostrar _MENU_ registos",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
                "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                "sInfoPostFix":  "",
                "sSearch":       "Procurar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                },
                "oAria": {
                    "sSortAscending":  ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
    },
    rowReorder: true,
    columnDefs: [
    { orderable: true, className: 'reorder', targets: 2 },
    { orderable: false, targets: '_all' }
    ]
});
     
    </script>
 </body>
</html>

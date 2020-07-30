<div class="modal fade" id="modaLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-lock"></i> Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/login" method="post">
        <div class="form-group">
            <label for="inputMail">Email</label>
            <input type="email" class="form-control" id="inputMail" name="mail">
        </div>
        <div class="form-group">
            <label for="inputPassword">Senha</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Manter logado?</label>
        </div>
        <button type="submit" class="btn btn-primary">Acessar</button>
        </form>
      </div>
    </div>
  </div>
</div>
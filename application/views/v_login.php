<html>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-panel panel panel-info" style="margin-top: 150px;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-sign-in"></i> Login</h3>
                    </div>
                    <div class="panel-body">
                        <form autocomplete="off" id="loginComAjax">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuário" name="txtUsuario" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="txtSenha" type="password" required>
                                </div>
                                <button type="submit" id="btnEntrar" class="btn btn-block btn-primary">Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function () {
        $("#loginComAjax").submit(function(event) {
            $.ajax({
                type: "POST",
                url: 'Login/logar_ajax',
                data: $("#loginComAjax").serialize(),
                success: function (data){
                    if ($.trim(data) == "1"){
                        swal({
                            title: "Atenção !",
                            text: "Acesso liberado",
                            type: "success"
                        });
                        $("#loginComAjax").trigger('reset');
                        window.location.href = "home";
                    }else{
                        swal({
                            title: "Atenção !",
                            text: "Acesso negado, usuário ou senha inválido!",
                            type: "error",
                        });
                        $("#loginComAjax").trigger('reset');
                    }
                },
                beforeSend: function() {
                    swal({
                        title: "Aguarde!",
                        text: "Carregando...",
                        imageUrl: "assets/img/gifs/preloader.gif",
                        showConfirmButton: false
                    });
                },
                error: function() {
                    alert("Deu Erro.")
                }
            });
            return false;
        });
    });
    </script>
</html>
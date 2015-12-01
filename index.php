<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>O prato</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src='js/bootstrap.min.js' type="text/javascript"></script>
        <script src='js/ajax.js' type="text/javascript"></script>
        <script src="js/bootstrap.validator.js" type="text/javascript"></script>
        <script>
            $('form').bootstrap3Validate(function (e, data) {
                e.preventDefault();

                alert(JSON.stringify(data));
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">O Prato</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="wrapper" role="main">
            <div class="container">
                <div class="row">
                    <div id="conteudo" class="col-md-9">
                        <div class="artigo" role="article">
                            <div class="row">
                                <form method="POST" name="form" id="form"  action="javascript: enviarForm('ajax.php');">
                                    <div id="msgReturn">
                                    </div>
                                    <fieldset class="form-group">
                                        <label for="exampleInputNome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome completo" required>
                                        <small class="text-muted">Campo obrigatório!</small>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail">E-mail</label>
                                        <input type="email" class="form-control"  id="email" name="email" placeholder="Seu e-mail" data-title="Por favor use um e-mail valido!" data-require="" data-regex="email" required>
                                        <small class="text-muted">Campo obrigatório!</small>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="exampleInputTelefone">Telefone</label>
                                        <input type="tel" class="form-control" id="tel" name="tel" placeholder="Seu telefone" maxlength="15">
                                    </fieldset>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="receber" name="receber" value="S" checked="true"> Quero receber informações sobre o aluno 10
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- div row container -->
            </div><!-- div container -->
        </div><!-- div wrapper -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy; Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
<?php
  include_once 'usuario/config.php';
  $cnx = mysql_connect($DB_SERVER, $DB_USER, $DB_PASS);
  mysql_select_db($DB_NAME,$cnx);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Login</title>
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="Boltech/imagens/favicon.ico">
        <!-- Bootstrap CSS -->
        
	  <?php
	     $QyTemas = "
	 	select estilo
		  from preferencias
	     ";
	     $rsTemas = mysql_query($QyTemas) or die(mysql_error());
	     $rowTemas = mysql_fetch_assoc($rsTemas);
	  ?>
         <!-- Bootstrap core CSS -->
         <link href="Boltech/css/<?php echo $rowTemas["estilo"];?>.css" rel="stylesheet">


        <link rel="stylesheet" href="Boltech/css/login.css">
        <!-- jQuery -->
        <script src="Boltech/javascript/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="login-container col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                <div id="output" class="col-xs-12">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<script>$('#output').addClass('alert alert-danger animated fadeInUp'); setTimeout(function () { $('#output').slideUp(); }, 5000); </script>";
                        echo "Usu�rio ou senha informados incorretos.";
                    }
                    elseif (isset($_GET['desativado'])) {
                        echo "<script>$('#output').addClass('alert alert-danger animated fadeInUp'); setTimeout(function () { $('#output').slideUp(); }, 5000); </script>";
                        echo "Acesso n�o autorizado. A conta est� definida como inativa.";
                    }
                    ?>
                </div>
                <div class="avatar" class="col-xs-12">
                <?php
                    require_once 'config.php';
                    echo "<img src='". LOGO_LOGIN ."' class='img-responsive' alt='Logomarca'>";
                ?>
                </div>
                <div class="form-box">
                    <form action="usuario/account_login.php" method="post">
                        <input name="admin" type="hidden" value="18">
                        <input name="grupo" type="hidden" value="2">
                        <input name="auth_user" type="text" placeholder="Usu�rio">
                        <input name="auth_pw" type="password" placeholder="Senha">
                        <button class="btn btn-primary btn-block login" type="submit">Login</button>
                        <a href="Boltech/usuario/account_change.php">Esqueceu a senha?</a>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript -->
        <script src="Boltech/javascript/bootstrap.min.js"></script>
    </body>
</html>
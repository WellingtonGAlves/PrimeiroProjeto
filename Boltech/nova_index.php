<?php
include('seguranca.php');
require_once 'config.php';
include_once 'usuario/config.php';

$cnx = mysql_connect($DB_SERVER, $DB_USER, $DB_PASS);
mysql_select_db('tracker',$cnx)or die(mysql_error());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo EMPRESA; ?></title>
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

  <link href="css/jquery-ui.css" type="text/css" rel="stylesheet" />
  <link href="css/magnific-popup.css" type="text/css" rel="stylesheet" />
  <link href="css/nova.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <script type="text/javascript" src="javascript/jquery-1.7.min.js"></script>
  <script type="text/javascript" src="javascript/jquery-ui.js"></script>
  <script type="text/javascript" src="javascript/jquery.form.min.js"></script>
  <script type="text/javascript" src="javascript/jquery.validate.min.js"></script>
  <script type="text/javascript" src="javascript/painelAdmin.js"></script>
  <script type="text/javascript" src="javascript/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="javascript/spin.min.js"></script>
  <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="javascript/polygon.min.js" type="text/javascript"></script>
  <script src="javascript/latlong.js" type="text/javascript"></script>
  <script src="javascript/geo.js" type="text/javascript"></script>

  <script type="text/javascript">
   $(function() {
     $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
       ui.jqXHR.error(function() {
        ui.panel.html(
          "Não foi possível carregar esta aba. Atualizar a página pode solucionar este problema." +
          "Caso o  problema persista, entre em contato com o administrador." );
      });
     }
   });
   });
 </script>
</head>

<body>

<!-- <div id="cabecalho">

</div> -->
<div id="corpo">
  <div id="tabs">
    <?php
    require_once 'config.php';
    echo "<ul>";
		echo "<a href='logout.php' title='Sair do sistema' class='logout'><img src='imagens/logout.png' alt='Sair'></a>";
	?>
      <li><a href="#boas-vindas">Home</a></li>
      <li><a href="Boltech/ajax/usuarios.php">Usuários</a></li>
      <?php if ($representante == 'N') echo "<li><a href='ajax/equipamentos.php'>Equipamentos</a></li>"; ?>
      <?php if ($representante == 'N') echo "<li><a href='ajax/preferencias_form.php'>Preferências</a></li>"; ?>
      <?php if ($cliente == 'master') echo "<li><a href='ajax/usuarios_adm.php?id=".$id_admin."'>Trocar Senha Admin</a></li>"; ?>
      <?php if ($cliente == 'master') echo "<li><a href='ajax/preferencias_smtp.php?id=".$id_admin."'>SMTP</a></li>"; ?>
      <?php if ($cliente == 'master') echo "<li><a href='ajax/preferencias_rastreadores.php?id=".$id_admin."'>Rastreadores</a></li>"; ?>
      <?php if ($cliente == 'master') echo "<li><a href='ajax/preferencias_logos.php'>Logos</a></li>"; ?>
      <?php if ($cliente == 'master') echo "<li><a href='ajax/usuarios_master.php'>Dados</a></li>"; ?>
      <?php /* if ($cliente == 'master') echo "<li><a href='ajax/preferencias_cores.php'>Temas</a></li>"; */ ?>
      <?php echo "<div id='logo'><a href='nova_index.php'><img src='" . LOGO_ADMIN . "'></a></div>"; ?>
    </ul>
    <div id="boas-vindas">
	
   </div>
 </div>
</div>
  <?php
    echo "<div id='rodape'>". RODAPE . "</div>";
  ?>
</body>
</html>
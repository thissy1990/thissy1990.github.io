<?php
	header('Content-Type: text/html; charset=utf-8');
	$host = "localhost";
	$data = "bdados";
	$user = "root";
	$pass = "";
	$mysqli = new mysqli($host, $user, $pass, $data);
	if ($mysqli->connect_error) {
		printf("ERRO MySQLi: %s\n", $mysqli->connect_error);
		exit();
	}
	if (!$mysqli->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $mysqli->error);
  } else {
      printf("Current character set: %s\n", $mysqli->character_set_name());
  }
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css"  href="style.css" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<form accept-charset="utf-8">
	
	</head>
	<body>
	<div class="nSel" unselectable="on" id="div_Container">
		<a id="a" href="index.php?home">
		<div id="div_Cabe">
		<h1>Título teste teste teste</h1>
		</div>
		</a>
		
		<div id="div_Menu">
			<ul>
				<li> <a href="index.php?home"><button class="button" style="vertical-align:middle"><span> Home </span></button></a></li>
				<li> <a href="index.php?sobre"><button class="button" style="vertical-align:middle"><span> Sobre </span></button></a></li>
				<li> <a href="index.php?contato"><button class="button" style="vertical-align:middle"><span> Contato </span></button></a></li>
			</ul>
		</div>
		
		<div id="div_Cont">			
				<?php 
					$verificar = $mysqli->query("SELECT * FROM postagem ORDER BY ID");
					$Row = $verificar->num_rows;
					if($Row <= 0) {
						echo "Nenhuma mensagem foi postada!";
					}
                    else {
					    while($array = $verificar->fetch_array()) {
						    $titulo  = $array['titulo'];
						    $texto   = $array['texto'];
						    $autor   = $array['autor'];
						    $data    = $array['data'];
				            echo '  <div id="div_Post">
                                        <h1>
                                            <b>Título:</b>'.$titulo.'<br />
                                            <b>Data:</b>'.$data.'
                                        </h1>
                                        <span>
                                            <b>Autor:</b>'.$autor.'
                                        </span> 
                                        <p>'.$texto.'</p> 
                                    </div>';
						    }
					}
				?>	
		</div>
		
		<a id="a" href="index.php?home">
		<div id="div_Roda">
		<p></p>
		<p><?php print 'Huehe' ?></p>
		<p></p>
		</div>
		</a>
	</body>
</html>
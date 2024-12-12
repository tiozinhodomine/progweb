<html>
   <head>
      <title>Meu primeiro PHP</title>
   </head>
   <body> 
<?php

//var_dump($_GET);
if (empty($_GET)) {
    echo "vixi, aqui acabou já";
    header("Location: login.html");
}
else if (empty($_GET["nome"]) || empty($_GET["sobrenome"]) || empty($_GET["idade"]) ) {
    echo "rapaz, cadê a gurizada?";
}
else {
$nome = $_GET["nome"];
$sobrenome = $_GET["sobrenome"];
$idade = $_GET["idade"];
$ano = date("Y") - $idade;

echo "<center>Hello World. Olá $nome $sobrenome <center>";
echo "<center>Você nasceu em $ano. </center>";
}
?>  


   </body>
</html>

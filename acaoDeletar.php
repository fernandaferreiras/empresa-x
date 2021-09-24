<?php

require("./funcoes.php");

$idFuncionario = $_GET["id"];

deletarFuncionario("./public/json/empresaX.json", $idFuncionario);

header("location: areaRestrita.php");

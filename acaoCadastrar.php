<?php

require_once("./funcoes.php");

if (
    !empty($_GET["first_name"]) && !empty($_GET["last_name"]) &&
    !empty($_GET["email"]) && !empty($_GET["gender"]) &&
    !empty($_GET["ip_address"]) && !empty($_GET["country"])
    && !empty($_GET["department"])
) {
    adicionarFuncionario("./public/json/empresaX.json", [
        "first_name" => $_GET["first_name"],
        "last_name" => $_GET["last_name"],
        "email" => $_GET["email"],
        "gender" => $_GET["gender"],
        "ip_address" => $_GET["ip_address"],
        "country" => $_GET["country"],
        "department" => $_GET["department"],
    ]);

    header('location: areaRestrita.php');
} 
  
// require_once("./funcoes.php");

// $novoFuncionario = [
//     "id" => $_GET["id"],
//     "first_name" => $_POST["first_name"],
//     "last_name" => $_POST["last_name"],
//     "email" => $_POST["email"],
//     "gender" => $_POST["gender"],
//     "ip_address" => $_POST["ip_address"],
//     "country" => $_POST["country"],
//     "department" => $_POST["department"]
// ];

// adicionarFuncionario("./public/json/empresaX.json", $novoFuncionario);

// header("location: areaRestrita.php");

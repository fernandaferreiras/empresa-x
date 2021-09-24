<?php

require("./funcoes.php");

$funcionarioId = $_GET["id"];

$funcionario = buscarFuncionarioPorId("./public/json/empresaX.json", $funcionarioId);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/editar.css" />
    <script src="./editar.js" defer></script>
    <title>EMPRESA-X</title>
</head>

<body>
    <div class="editar__area">
        <form id="form-funcionario" action="acaoEditar.php" method="POST">
            <?php
            if (!$funcionario) echo "<h1>Funcionário não encontrado</h1>";
            else {
            ?>
                <div class="editar-funcionario">
                    <h1>EDITAR</h1> 
                    <input type="hidden" placeholder="Digite o id" name="id" value="<?= $funcionario->id ?>" />
                    <input type="text" placeholder="Digite o primeiro nome" name="first_name" value="<?= $funcionario->first_name ?>" />
                    <input type="text" placeholder="Digite o sobrenome" name="last_name" value="<?= $funcionario->last_name ?>" />
                    <input type="text" placeholder="Digite o e-mail" name="email" value="<?= $funcionario->email ?>" />
                    <select id="gender" required placeholder="gênero" name="gender" value=<?= $funcionario->gender ?>>
                        <option value="Male" <?= $funcionario->gender == 'Male' ? 'selected' : '' ?>>Masculino</option>
                        <option value="Female" <?= $funcionario->gender == 'Female' ? 'selected' : '' ?>>Feminino</option>
                    </select>
                    <input type="text" placeholder="Digite o IP" name="ip_address" value="<?= $funcionario->ip_address ?>" />
                    <input type="text" placeholder="Digite o país" name="country" value="<?= $funcionario->country ?>" />
                    <input type="text" placeholder="Digite o departamento" name="department" value="<?= $funcionario->department ?>" />
                    <div class="btn-editar">
                        <button id="btn__cancelar__editar">CANCELAR</button>
                        <button id="btn__editar__funcionario">SALVAR</button>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>

</body>

</html>
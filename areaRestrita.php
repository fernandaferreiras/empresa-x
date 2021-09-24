<?php

session_start();

require_once('./funcoes.php');

verificarLogin();

$funcionarios = lerArquivo("./public/json/empresaX.json");

if (isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./cadastro.js" defer></script>
    <script src="./delete.js" defer></script>
    <script src="./editar.js" defer></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="./public/css/areaRestrita.css">
    <link rel="stylesheet" href="./public/css/cadastro.css">

    <title>EMPRESA-X</title>
</head>

<body>

    <div class="login__off__area">

        <div class='toolbar'>

            <span><?php echo 'Olá ' . strtoupper($_SESSION['usuario']) . ' - Login efetutado em: ' . $_SESSION['data_hora']; ?> -</span>

            <span><a class="material-icons" href="processaLogin.php?logout=true">logout</a></span>

        </div>

    </div>

    <div class="main__area">
        <h1>FUNCIONÁRIOS DA EMPRESA X</h1>
        <h2>A empresa conta com <span><?= count($funcionarios) ?></span> funcionários</h2>
        <label>Pesquisar por nome
            <form class="form__area" method="GET">
                <input type="search" placeholder="Digite o nome" name="filtro" value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>">
                <button id="btn__buscar">BUSCAR</button>
                <button type="button" id="btn__cadastrar">CADASTRAR</button>
            </form>
        </label>
        <div class="radius__table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>SOBRENOME</th>
                    <th>EMAIL</th>
                    <th>GÊNERO</th>
                    <th>ENDEREÇO IP</th>
                    <th>PAIS</th>
                    <th>DEPARTAMENTO</th>
                    <th>AÇÕES</th>
                </tr>
                <?php
                foreach ($funcionarios as $funcionario) :
                ?>
                    <tr>
                        <td> <?= $funcionario->id ?> </td>
                        <td> <?= $funcionario->first_name ?> </td>
                        <td> <?= $funcionario->last_name ?> </td>
                        <td> <?= $funcionario->email ?> </td>
                        <td> <?= $funcionario->gender ?> </td>
                        <td> <?= $funcionario->ip_address ?> </td>
                        <td> <?= $funcionario->country ?> </td>
                        <td> <?= $funcionario->department ?> </td>
                        <td>
                            <div id="btn__acoes">
                                <button onclick="editar(<?= $funcionario->id ?>)" id="btn__editar" class="material-icons">edit</button>
                                <button onclick="deletar(<?= $funcionario->id ?>)" id="btn__excluir" class="material-icons">delete</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="cadastrar__area">
            <form id="form-funcionario" action="acaoCadastrar.php">
                <p>CADASTRAR FUNCIONARIO</p>
                <div id="perguntas__casdrastro">
                    <div class="area__nome">
                        <input type="text" name="first_name" required placeholder="Nome">
                        <input type="text" name="last_name" required placeholder="Sobrenome">
                    </div>
                    <div class="area__email__ip">
                        <input type="text" name="email" required placeholder="Email">
                        <input type="text" name="ip_address" required placeholder="Endereço IP">
                    </div>
                    <div class="area__country__department">
                        <input type="text" name="country" required placeholder="País">
                        <input type="text" name="department" required placeholder="Departamento">
                    </div>
                    <select name="gender" id="genero" required placeholder="Gênero">
                        <option disabled selected value>Gênero</option>
                        <option value="Male">Masculino</option>
                        <option value="Female">Feminino</option>
                    </select>
                    <div class="area__btn__cadastrar">
                        <button id="btn__cancelar" type="button">CANCELAR</button>
                        <button id="btn__cadastrar__funcionario">CADASTRAR</button>
                    </div>
            </form>
        </div>

    </div>

</body>

</html>
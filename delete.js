function deletar(idFuncionario) {
    let confirmacao = confirm("Deseja deletar o funcionário?");

    if (confirmacao) {
        window.location = "./acaoDeletar.php?id=" + idFuncionario;
    }
}

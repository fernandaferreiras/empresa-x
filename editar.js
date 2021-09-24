function editar(idFuncionario) {
    window.location = "editar.php?id=" + idFuncionario;
}

function abrirEditar() {
    document.querySelector(".editar__area").style.display = "flex";
}

function fecharEditar() {
    document.querySelector(".editar__area").style.display = "none"
}

document.getElementById("btn__editar").addEventListener("click", abrirEditar)

document.getElementById("btn__cancelar__editar").addEventListener("click", fecharEditar)
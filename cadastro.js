function abrirCadastro() {
    document.querySelector(".cadastrar__area").style.display = "flex";
}

function fecharCadastro() {
    document.querySelector(".cadastrar__area").style.display = "none";
}

document.getElementById("btn__cadastrar").addEventListener("click", abrirCadastro);

document.getElementById("btn__cancelar").addEventListener("click", fecharCadastro);


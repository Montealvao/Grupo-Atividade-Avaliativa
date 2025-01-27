document.getElementById('fotoPerfil').addEventListener('click', function() {
    var menu = document.getElementById('menuOpcoes');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

function escolherFoto() {
    document.getElementById('inputFotoPerfil').click();
}

function removerFoto() {
    document.getElementById('inputFotoPerfil').value = '';
    document.getElementById('formPerfil').submit();
}



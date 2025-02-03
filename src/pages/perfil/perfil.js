document.getElementById('fotoPerfil').addEventListener('click', function() {
    var menu = document.getElementById('menuOpcoes');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

function escolherFoto() {
    document.getElementById('inputFotoPerfil').click();
}

function removerFoto() {
    document.getElementById('removerFoto').value = '1';
    document.getElementById('imagePerfil').submit();
}

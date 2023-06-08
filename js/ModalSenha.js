/*FUNÇÃO ALTERAR SENHA */
function abrirSenha(abrir) {
 
        let modal = document.getElementById(abrir);

        modal.style.display = 'flex'; 

}


function fecharSenha(abrir){

    let modal = document.getElementById(abrir);

    modal.style.display = 'none';
    
}

function abrir(id_registro){
    let dc = document.querySelector('.backgroundModal[id="'+ id_registro +'"]')
    dc.style.display = 'block';
    
}

function fechar(id_fechar){
    
    let modal = document.querySelector('.backgroundModal[id="'+ id_fechar +'"]')

    modal.style.display = 'none';
}
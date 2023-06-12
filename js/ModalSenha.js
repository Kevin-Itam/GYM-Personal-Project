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
/*============ tabelas ============= */

const cad = document.querySelector("#cad");
const plan = document.querySelector("#plan");


function abrir_cad(abr_cad){
    let modal = document.getElementById(abr_cad);
    modal.style.display = 'block'; 

    // var tab = plan;
    // tab.style.display = 'none';
}

function abrir_plan(abr_plan){
    let modal = document.getElementById(abr_plan);
    modal.style.display = 'block'; 
    // var tab = cad;
    // tab.style.display = 'none';

}

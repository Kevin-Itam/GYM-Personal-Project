/*FUNÇÃO ALTERAR SENHA */
function abrirSenha(abrir) {

    let modal = document.getElementById(abrir);

    modal.style.display = 'flex';

}


function fecharSenha(abrir) {

    let modal = document.getElementById(abrir);

    modal.style.display = 'none';

}

function abrir(id_registro) {
    let dc = document.querySelector('.backgroundModal[id="' + id_registro + '"]')
    dc.style.display = 'block';

}

function fechar(id_fechar) {

    let modal = document.querySelector('.backgroundModal[id="' + id_fechar + '"]')

    modal.style.display = 'none';
}
/*============ tabelas ============= */


function abrir_cad(abr_cad) {
    let cadastro = document.getElementById(abr_cad);
    var plan = document.getElementById('plan');
    cadastro.style.display = 'block';
    plan.style.display = 'none';
}

function abrir_plan(abr_plan) {
    let plano = document.getElementById(abr_plan);
    var cad = document.getElementById('cad');
    plano.style.display = 'block';
    cad.style.display = 'none';
}

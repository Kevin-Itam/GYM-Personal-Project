const form = document.querySelector("#form");
const nome = document.querySelector("#firstname");
const validEmail = document.querySelector("#E-mail");
const emailRegex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const cpfUs = document.querySelector("#CPF");
const telefone = document.querySelector("#TEl1");

form.addEventListener("submit", (event => {
  event.preventDefault();
  //Verifica o nome
  if (nome.value === "") {
    alert("Por favor,preencha o seu nome");
    return;
  }
  if (nome.value.length < 3) {
    alert("O nome Deve ter pelo menos 2 caracteres")
  }

  //Valida o CPF
  if (cpfUs.value === "" || cpfUs.value === false ) {
    alert("Preencha o campo do CPF");
    return;

  }

  //Verifica o EMAIL

  if (validEmail.value === "" || !isEmailValid(validEmail.value)) {
    alert("Por favor Preencha com um EMAIL valido");
    return;
  }

  //Vrifica Celular

  if (telefone_validation(telefone) === false || telefone.value === "") {
    alert("Digite um numero de Celular valido");
    return;
  }

  form.submit();
}));

function isEmailValid(email) {

  const emailRegex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/);

  if (emailRegex.test(email)) {
    return true;

  }
  return false;

}

//Validaçao do CPF

jQuery(document).ready(function () {

  var cpf_field = '#cpf';

  jQuery(cpf_field).blur(function () {
    var cpf = jQuery(cpf_field).val();
    if (cpf.length == 11) {
      var v = [];
      //Calcula o primeiro dígito de verificação.
      v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
      v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
      v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
      v[0] = v[0] % 11;
      v[0] = v[0] % 10;
      //Calcula o segundo dígito de verificação.
      v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
      v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
      v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
      v[1] = v[1] % 11;
      v[1] = v[1] % 10;
      //Retorna Verdadeiro se os dígitos de verificação são os esperados.
      if ((v[0] != cpf[9]) || (v[1] != cpf[10])) {
        alert('CPF errado');
        jQuery(cpf_field).val("");
        jQuery(cpf_field).focus();
        return false;

      } else {
        alert('CPF correto');
        jQuery(cpf_field).val(cpf);
        return true;
      }
    }
  });
});

//Valida compo Telefone
function telefone_validation(telefone) {
  //retira todos os caracteres menos os numeros
  telefone = telefone.value.replace(/\D/g, '');

  //verifica se tem a qtde de numero correto
  if (!(telefone.length >= 10 && telefone.length <= 11)) return false;

  //Se tiver 11 caracteres, verificar se começa com 9 o celular
  if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;

  //verifica se não é nenhum numero digitado errado (propositalmente)
  for (var n = 0; n < 10; n++) {

    if (telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
  }
  //DDDs validos
  var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
    21, 22, 24, 27, 28, 31, 32, 33, 34,
    35, 37, 38, 41, 42, 43, 44, 45, 46,
    47, 48, 49, 51, 53, 54, 55, 61, 62,
    64, 63, 65, 66, 67, 68, 69, 71, 73,
    74, 75, 77, 79, 81, 82, 83, 84, 85,
    86, 87, 88, 89, 91, 92, 93, 94, 95,
    96, 97, 98, 99];

  if (codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) {
    return false;
  }


  if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) {
    return false;
  }


  return true;

}

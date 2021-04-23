//alert('FUNCIONANDO');

function deleteConfirm(url,id){
  if (confirm("Estas Seguro de Eleminar este Dato? ")) {
    window.location.href = url + 'Home/delect/' + id;
    return true;
  }
}


function EnabledInput(opcion1) {
  var input = document.getElementById('casilla');
  var op1 = document.getElementById('opcion1');
  var op2 = document.getElementById('opcion2');

  if (op1.checked == true) {
  //  input.disabled = false;
    input.focus();
  }else if (op2.checked == true){
    input.value = 0;
  //  input.disabled = false;
  }
}

const formulario = document.getElementById('form');
const casillas = document.querySelectorAll('#form input');
const contenido = document.getElementById('form-crias');

const expresion = /^[0-9]/;

const validar = (e) => {
  switch (e.target.name) {
    case 'crias':
        if (expresion.test(e.target.value)) {
          console.log("valido");
        }else {
          console.log("ingresar un dato");
          contenido.innerHTML = ''
          alert('INGRESAR UN DATO EN LA CASILLA CRIAS');
        }
    break;
  }
}

casillas.forEach((input) => {
  input.addEventListener('blur', validar);
});

//JQUERY
/*
function proceso(){
  var nom1 = $("#NomJ1").val();
  var nom2 = $("#NomJ2").val();
  $.post('PHP/UsaJuegoDados.php',{NomJ1:nom1,NomJ2:nom2},function(data) {

    if(data!=null){
      alert("Los datos se enviaron correctamente");  
    }else{
      alert("Los datos no se enviaron")
    }
  })
  mostrarGanador();
}

function mostrarGanador(){
  $.get( "PHP/UsaJuegoDados.php", function( data ) {
    alert( "Data Loaded: " + data );
  });
}
*/

//FETCH API
var formulario= document.getElementById('formulario');
var respuesta= document.getElementById('respuesta');
formulario.addEventListener('submit',function(e){
  e.preventDefault();
  console.log('me diste un click');

  var datos = new FormData(formulario);
  console.log(datos)
  console.log(datos.get('NomJ1'))
  console.log(datos.get('NomJ2'))

  fetch('UsaJuegoDados.php',{
    method: 'POST',
    body: datos
  })
  .then(res => res.json())
  .then(data => {
    console.log(data)
    if(data === 'ERROR'){
      respuesta.innerHTML =`
      <div class="alert alert-danger" role="alert">
      Llena todos los campos
      </div>`
    }else{
      respuesta.innerHTML =`
      <div class="alert alert-primary" role="alert"> 
      ${data} 
      </div>`
    }
  })
})
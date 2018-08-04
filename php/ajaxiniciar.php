<script type="text/javascript">
    function error(){
  swal({
  title: "No se pudo iniciar su cuenta",
  text: "Verifique los datos",
  imageUrl: "img/a7d954209cdce08b07a82e7ccd0569cc.jpg",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Entendido",
},
function(){
location.href="index.php";
});
    }
</script>
<script type="text/javascript">
    function buena(){
       swal({
  title: "Bienvenido",
  text: "Puede empezar a tomar lista",
  imageUrl: "img/a7d954209cdce08b07a82e7ccd0569cc.jpg",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Entendido",
},
function(){
location.href="profesor.php";
}); 
    }
</script>


<?php
//se crea una variable
$mensaje = null;
//si se recibe respuesta de ajax
if (isset($_POST["ajax"]))
{ //se comprueba que no hay inyeccion de codigo
    $usuario = htmlspecialchars($_POST["usuario"]);
    $pass = htmlspecialchars($_POST["pass"]);
        $link = mysqli_connect("localhost", "root", "", "lista_alumnos");
$tildes = $link->query("SET NAMES 'utf8'");
$result = mysqli_query($link, "SELECT * FROM profesores Where usuario ='$usuario' AND pass = '$pass'");
     $row_cnt = mysqli_num_rows($result);
    if ($row_cnt > 0){
        $mensaje ="<script>buena();</script>";
        }else{
        $mensaje ="<script>error();</script>";
    }
}

echo $mensaje;
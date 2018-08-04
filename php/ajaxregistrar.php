<script type="text/javascript">
    function error(){
  swal({
  title: "No se pudo registrar su cuenta",
  text: "Verifique los datos",
  imageUrl: "img/a7d954209cdce08b07a82e7ccd0569cc.jpg",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Entendido",
},
function(){
location.href="registro_s.php";
});
    }
</script>
<script type="text/javascript">
    function buena(){
       swal({
  title: "Cuenta registrada",
  text: "Puede empezar a tomar lista",
  imageUrl: "img/a7d954209cdce08b07a82e7ccd0569cc.jpg",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Entendido",
},
function(){
location.href="index.php";
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
    $pass2 = htmlspecialchars($_POST["pass2"]);
    
   if ($pass != $pass2)//se hace la comprobacion de que la respuesta sea igual a algun valor
    {
        $mensaje ="<script>error();</script>"; }//se ejecuta ventana de intentar de nuevo
    else
    {
        $link = mysqli_connect("localhost", "root", "", "lista_alumnos");
$tildes = $link->query("SET NAMES 'utf8'");
$result = mysqli_query($link, "INSERT INTO profesores (usuario, pass)  VALUES ('$usuario', '$pass')");
        $mensaje ="<script>buena();</script>";
}
}
echo $mensaje;
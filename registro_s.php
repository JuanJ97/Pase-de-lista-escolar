<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de asistencia</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="js/sweetalert-master/dist/sweetalert.css">
</head>
<body>
   <script src="js/jquery-3.1.1.min.js"></script>
   <script src="js/sweetalert-master/dist/sweetalert.min.js"></script>
   <script>
    $(function()
    {
         $("#btn_ajax").click(function(){
 var url = "php/ajaxregistrar.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#usuario").html('');
               $("#pass").html('');
               $("#pass2").html('');
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    });
    </script>
    <div id="mensaje"></div>
  <form method="post" id="form_ajax" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form">
       <h1>Registrate</h1>
        <input type="text" name="usuario" id="usuario" class="inp" required placeholder="Usuario">
        <input type="text" name="pass" id="pass" class="inp" required placeholder="Contraseña">
        <input type="text" name="pass2" id="pass2" class="inp" required placeholder="Confirmar contraseña">
        <input type="hidden" name="ajax">
    <input type="button" id="btn_ajax" value="Registrar" class="btn">
        <a href="index.php">Regresar</a>
    </form>
    <div id="oculto"></div>
</body>
</html>

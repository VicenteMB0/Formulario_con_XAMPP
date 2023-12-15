<?php 
if (
    isset($_GET['nombre']) &&
    isset($_GET['apellidos']) &&
    isset($_GET['correo']) &&
    isset($_GET['edad']) &&
    isset($_GET['fecha']) &&
    isset($_GET['hora']) &&
    isset($_GET['animal']) &&
    isset($_GET['consulta']) &&
    isset($_GET['recinto']) &&
    isset($_GET['foto']) 
) {
}
    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $correo = $_GET['correo'];
    $edad = $_GET['edad'];
    $fecha = $_GET['fecha'];
    $fecha2 = explode('-', $fecha);
    $minfecha = '2023-06-05';
    $maxfecha = '2023-09-30';
    $hora = $_GET['hora'];
    $hora2 = explode(':', $hora);
    $minhora = '09:00';
    $maxhora = '22:00';
    $animal = $_GET['animal'];
    $consulta = $_GET['consulta'];
    $consulta_comas = implode(", ", $consulta);
    $recinto = $_GET['recinto'];
    $foto = $_GET['foto']; 

    /* CONEXIÓN A BBDD */
    $url = 'localhost';
    $user = 'root';
    $pass = '';
    $bbdd = 'Datos_Formulario';
    $connection = mysqli_connect($url, $user, $pass, $bbdd);
    $sql = "INSERT INTO Cliente (Nombres, Apellidos, Correo, Edad, `Fecha de Atencion`, `Hora de Atencion`,
                                Animal, `Tipo de Consulta`, `Recinto de Atencion`, Imagen)
            VALUES ('$nombre', '$apellidos', '$correo', '$edad', '$fecha', '$hora', 
                    '$animal', '$consulta_comas', '$recinto', '$foto')";
    /* EJECUTO LA CONSULTA Y CIERRO CONEXIÓN*/
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);

    /* MOSTRAR LOS DATOS INGRESADOS */
    echo '<link rel = "stylesheet" href = "style.css">';
    echo '<table>';
    echo '<tr>
            <th colspan = "2"> <h1> Datos Ingresados </h1> </th>
          </tr>
    <tr> <th> Nombres: </th> <td> '.$nombre.' </td> </tr>
    <tr> <th> Apellidos: </th> <td> '.$apellidos.' </td> </tr>
    <tr> <th> Correo: </th> <td> '.$correo.' </td> </tr>
    <tr> <th> Edad: </th> <td> '.$edad.' </td> </tr>
    <tr> <th> Fecha de Atención: </th> <td> '.$fecha2[2].'-'.$fecha2[1].'-'.$fecha2[0].' </td> </tr>
    <tr> <th> Hora de Atención: </th> <td> '.$hora2[0].':'.$hora2[1].' </td> </tr>
    <tr> <th> Animal: </th> <td> '.$animal.' </td> </tr>
    <tr> <th> Tipo de Consulta: </th> <td> '.$consulta_comas.' </td> </tr>
    <tr> <th> Recinto de Atención: </th> <td> '.$recinto.' </td> </tr>';
    echo '<tr> <th> Foto de su mascota: </th> <td> <img src = "Uploads/'.$foto.'"
    style = "width: 200px; heigth: 200px;"> </td> </tr>';
    echo '</table>';
    echo '<div style="text-align: center; margin-top: 20px;">
        <button onclick = "window.location.href=\'index.html\'" class = "button"> Volver al Inicio </button>
      </div>';
?>
<?php
$conexion=mysqli_connect("localhost","","","tablered_bd");
//poder manipular acentos y la ñ
$conexion->set_charset("utf8");
if($_POST["username"] != "" && $_POST["pass"] != ""){
    $username  = $_POST["username"];
    $pass = $_POST["pass"];
    // CONVERTIR LA CONTRASEÑA CON HASH
    //$hashed_password = hash('sha256', $pass);
    
   $consulta="SELECT *
                FROM usuarios 
                WHERE user='".$username."'
                    and password='".$pass."'";
    $log=mysqli_query($conexion,$consulta);
   if($log->num_rows >0){

    while($row=mysqli_fetch_array($log)){
        @session_start();
        $_SESSION["id"]           = $row["id_user"];
        $_SESSION["name"]         = $row["user"];
      }     
            // ADMINISTRADOR
            echo "<script type=\"text/javascript\">
            alert(\"Bienvenido al sistema\"); 
            </script>";
            echo "<script type=\"text/javascript\">
            window.location='../home.php';
            </script>";
      
 } else{
echo "<script type=\"text/javascript\">
    alert(\"Usuario o contraseña incorrecta\"); 
    </script>";

    echo "<script type=\"text/javascript\">

    window.location='../login.php';
    </script>";
   }
}else{

    echo "<script type=\"text/javascript\">
    alert(\"Rellena el formulario\"); 
    </script>";


    echo "<script type=\"text/javascript\">

    window.location='../login.php';
    </script>";
}
?>
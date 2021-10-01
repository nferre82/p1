<?php
    
    if(empty($_POST['nombre'])&&empty($_POST['contraseña'])){
        $mensaje="introduce un nombre de usuario";
        $mensaje2="introduce una contraseña";
        header("Location: login.php?noName=$mensaje&noPass=$mensaje2");
        exit();
    }
    if(empty($_POST['nombre'])){
        $mensaje="introduce un nombre de usuario";
        header("Location: login.php?noName=$mensaje");
        exit();
    }
    if(empty($_POST['contraseña'])){
        $mensaje="introduce una contraseña";
        header("Location: login.php?noPass=$mensaje");
        exit();
    }
    $f=fopen("usuarios.txt","r");
    if(!$f){
        $nombreUser=$_POST['nombre'];
        header("Location: alta.php?nom=$nombreUser");
        exit();
    }else{
        $match=false;
        while(!feof($f)){
            $linea=fgets($f);
            $user_y_pass= explode(";", $linea);
            $nombre=$user_y_pass[0];
            $contras=$user_y_pass[1];
            if($_POST['nombre']==$user_y_pass[0]&&$_POST['contraseña']==$user_y_pass[1]){
                
            }else if(($_POST['nombre']==$nombre)xor$_POST['contraseña']==$user_y_pass[1]){
                if($_POST['nombre']==$user_y_pass[0]){
                    $mensaje="Contraseña erronea para ".$_POST['nombre'];
                    $mensaje2="Inténtalo de nuevo";
                    $name=$_POST['nombre'];
                    header("Location: login.php?missPass=$mensaje&error2=$mensaje2&name=$name");
                    exit();
                }    
            }
        }
        fclose($f);
    }
        $nombreUser=$_POST['nombre'];
        header("Location: alta.php?nom=$nombreUser");
        exit();
?>


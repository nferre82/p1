<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Pedido</title>
    </head>
    <body>
        <h1>REGISTRATE</h1>
        <?php
        if(isset($_POST['send'])&&(!empty($_POST['name'])&&!(empty($_POST['pass'])))){
            $f= fopen("usuarios.txt", "a+");
            $error=false;
            while(!feof($f)){
                $linea=fgets($f);
                $nom_y_pass= explode(";", $linea);
                if($nom_y_pass[0]==$_POST['name']){
                    ?>
                    <div>
                        <p>Lo sentimos, ya existe un usuario <?php echo $_POST['name']; ?></p>
                    </div>
                <?php
                }else{
                    $registroBueno=$_POST['name'].": Has sido dado de alta";
                    fwrite($f, $registroBueno);
                }
            }
                
            
        }
    ?>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">     
            <table>
                <tr>
                    <td>Login: </td>
                    <?php
                        if(isset($_GET['nom'])){
                    ?>
                    <td><input type="text" name="name" value=<?php echo $_GET['nom']?>></td>
                    <?php
                        }else{
                    ?>
                    <td><input type="text" name="name"></td>
                    <?php
                        }
                    ?>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="send" value="REGISTRAR">
                    </td>
                </tr>
            </table>
        </form>  
        
    </body>
    
</html>

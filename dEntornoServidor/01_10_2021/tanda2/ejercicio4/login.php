<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
    </head>
    <body>
        <?php
        if(isset($_GET['missPass'])){
        ?>
        <div style="color:red">
            <p><?php echo $_GET['missPass']; ?></p>
            <p><?php echo $_GET['error2']; ?></p>
        </div>
        <?php
        }
        ?>
        <form method="post" enctype="multipart/form-data" action="validacion.php">
            <table>
                <tr>
                    <td>Nombre de usuario</td>
                    <td>
                        <?php
                            if(isset($_GET['missPass'])){
                        ?>
                        <input type="text" name="nombre" value=<?php echo $_GET['name'] ?>>
                        <?php
                            }else{   
                        ?>
                        <input type="text" name="nombre">
                        <?php
                            }
                        if(isset($_GET['noName'])){
                        ?>
                        <span style="color:red"><?php echo $_GET['noName'];?></span>
                        <?php
                        }
                        ?>
                    </td>
                    <td rowspan="2" style="vertical-align:center"><input type="submit" name="enviar" value="ENTRAR"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input type="password" name="contraseña">
                        <?php
                        if(isset($_GET['noPass'])){
                        ?>
                        <span style="color:red"><?php echo $_GET['noPass'];?></span>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>  
        
    </body>
    
</html>


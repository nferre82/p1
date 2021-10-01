<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Pedido</title>
    </head>
    <body>
        <?php
            if(isset($_GET['total'])){
                $precioFinal=$_GET['total'];
            }else{
                $precioFinal=0;
            }
            function nombreSubmit(){
                if($_POST['nombre']!=""){
                    return true;
                }return false;
            }
            function valorCorrecto(){
                if(filter_var($_POST['precio'],FILTER_VALIDATE_FLOAT)){
                    return true;;
                }return false;
            }
            function infoAdded(){
                if(isset($_POST['archivo'])){
                    return true;
                    }return false;
                }
            if(isset($_POST['enviar'])&& nombreSubmit()&& valorCorrecto()){
                    $f= fopen("articulos.txt", "a");
                    if(!$f){
                        echo "no se ha podido abrir el archivo";
                    }else{
                        fwrite($f, "\n".$_POST['nombre'].";".$_POST['precio']);
                        fclose($f);
                    }
            }
          
            if(isset($_POST['enviar'])&&is_uploaded_file($_FILES['archivo']['tmp_name'])&& valorCorrecto()&& nombreSubmit()){
                $nombre=$_POST['nombre'];
                $rutaDestino=$nombre.".txt";
                $nomT=$_FILES['archivo']['tmp_name'];
                move_uploaded_file($nomT, $rutaDestino);
            }
        
        ?>
        <table>
            <caption>ELIGE TU PEDIDO</caption>
            <?php
                $f=fopen('articulos.txt', 'a+');
                if(!$f){
                    echo 'no se puede abrir el fichero';
                }else{
                    while(!feof($f)){
                        $linea=fgets($f);
                        $nom_y_precio= explode(';', $linea);
                        $total=floatval($nom_y_precio[1])+floatval($precioFinal);
                        echo "<tr>";
                        echo "<td>".$nom_y_precio[0]."</td>";
                        echo "<td>".$nom_y_precio[1]."</td>";
                        echo "<td><a href='pedido.php?total=$total'>Añadir unidad</a></td>";
                        if(file_exists($nom_y_precio[0].".txt")){
                            echo "<td><a href='".$nom_y_precio[0].".txt'>Enlace al archivo<a></td>";
                        }
                        echo "</tr>";
                    }
                    echo "<tr><td colspan='3' style='text-align:center'>TOTAL: ".$precioFinal."€<td></tr>";
                }
            
            ?>
        </table>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <table>
                <caption>AÑADE ARTICULO</caption>
                <tr>
                    <td>Nombre:</td>
                    <td>Precio(€):</td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if(isset($_POST['enviar'])){
                            if(!nombreSubmit()||(!valorCorrecto())){
                                if(!nombreSubmit()){
                                   echo "<input type='text' id='fname' name='nombre'>";
                                   echo '<label style="color:red">Introduce un nombre</label>'; 
                                }else{
                                echo "<input type='text' id='fname' name='nombre' value='".$_POST['nombre']."'>";
                                }            
                            }else{
                                echo "<input type='text' id='fname' name='nombre'>";
                            } 
                        }else{
                            echo "<input type='text' id='fname' name='nombre'>";
                        }
                    ?>
                        </td>
                    <td>
                        <?php
                        if(isset($_POST['enviar'])){
                            if(!nombreSubmit()||(!valorCorrecto())){
                                if(!valorCorrecto()){
                                   echo "<input type='text' id='fname' name='precio'>";
                                   echo '<label style="color:red">valor incorrecto</label>'; 
                                }else{
                                echo "<input type='text' id='fname' name='precio' value='".$_POST['precio']."'>";
                                }            
                            }else{
                                echo "<input type='text' id='fname' name='precio'>";
                            }
                        }else{
                            echo "<input type='text' id='fname' name='precio'>";
                        }
                        ?>
                        </td>
                        <td>
                            <input type="file" name="archivo" accept=".txt">
                        </td>
                    <td><input type="submit" name="enviar" value="AÑADIR">
                    </td>
                </tr>
            </table>
            
        </form>
        
    </body>

</html>


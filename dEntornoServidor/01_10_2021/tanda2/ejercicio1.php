<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Ejercicio1</title>
    </head>
    <body>
           <?php
                function radioSet() {
                    if(isset($_POST['radio'])){
                        return true;
                    }else 
                        return false;
                }
           
           
           ?>
           <?php
            $texto="";
            if(radioSet()&&!empty($_POST['texto'])){
                $texto=$_POST['texto'];
            }
           ?>
            <form name="input "action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php
                $VALORES=array(3,5,10);
             ?>   
            <label>Texto a cifrar</label>
            <input type="text" name="texto" value="<?php echo $texto;?>"/>
            <?php
                if((isset($_POST['cesar']))&&(empty($_POST['texto']))){
                        echo "<span style='color:red'>introduce un texto</span>";
                }
            ?>
            <table>
                <tr>
                    <td rowspan="3">Desplazamiento</td>
                    <td><?php echo "$VALORES[0]";
                            if(((radioSet()))&&($_POST['radio']==$VALORES[0])){
                                echo "<input type='radio' name='radio' value='$VALORES[0]' checked>";
                            }else{
                                echo "<input type='radio' name='radio' value='$VALORES[0]'";  
                            }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo "$VALORES[1]";
                            if(((radioSet()))&&($_POST['radio']==$VALORES[1])){
                                echo "<input type='radio' name='radio' value='$VALORES[1]' checked>";
                            }else{
                                echo "<input type='radio' name='radio' value='$VALORES[1]'";  
                            }
                            if((isset($_POST['cesar']))&&(!radioSet())){
                                echo "<span style='color:red'>elija un radio</span>";
                        }
                    ?>
                    </td>
                    <td>
                        <input type="submit" name="cesar" value="CIFRADO CESAR">
                    </td>
                </tr>
                <tr>
                    <td><?php echo "$VALORES[2]";
                            if(((radioSet()))&&($_POST['radio']==$VALORES[2])){
                                echo "<input type='radio' name='radio' value='$VALORES[2]' checked>";
                            }else{
                                echo "<input type='radio' name='radio' value='$VALORES[2]'";  
                            }
                    ?>
                    </td>
                </tr>
            </table>
            
            <label>Fichero de clave</label>
            <select name="ficheros">
                <?php
                    $directorios=scandir('carpeta');
                    $cont=1;
                    foreach($directorios as $dir){
                        if(strpos($dir, ".txt")){
                            if(isset($_POST['substi'])&&($_POST['ficheros']==3&&$cont==3)){
                                echo "<option name='options' value=$cont selected>".$dir."</option>";
                            }else{
                                echo "<option name='options' value=$cont>".$dir."</option>";
                            }
                            $cont++;
                        }  
                    }
            ?>
            </select>
            <?php 
             ?>
            <input type="submit" name="substi" value="CIFRADO POR SUSTITUCION">
        </form>
        <?php
         $texto= strtoupper($texto);
         if(((isset($_POST['cesar'])&&isset($_POST['radio']))or(isset($_POST['substi'])))&&(!empty($_POST['texto']))){
             if(isset($_POST['cesar'])){
                 $palabraCifrada="";
             $desplazamiento=$_POST['radio'];
             for($i=0;$i<strlen($texto);$i++)
                {
                    $newLetra=$texto[$i];
                    $newLetra=ord($newLetra);
                    $newLetra=chr($newLetra+$desplazamiento);
                    if($newLetra<'A'or$newLetra>'Z'){  
                        $newLetra=chr(ord($newLetra)-ord('Z')+(ord('A')-1));
                    }
                    $palabraCifrada=$palabraCifrada."".$newLetra;
                }
                echo "Texto cifrado: ".$palabraCifrada;
             }else{
                if($_POST['ficheros']==3){
                    $directorios2=scandir('carpeta');
                 foreach($directorios as $dir){
                        if($dir=="fichero_clave1.txt"){
                            $f=fopen('carpeta/'.$dir, "r");
                            if(!$f){
                                echo '<p>no se puede encontrar el fichero</p>';
                            }else{
                                $linea="";
                                $arrayfabeto=array();
                                while(!feof($f)){
                                    $linea=$linea.fgets($f);
                                }
                                fclose($f);
                                for($contador=0;$contador<strlen($linea);$contador++){
                                    array_push($arrayfabeto,$linea[$contador]);
                                }
                                $str2="";
                                for($contador=0;$contador<strlen($texto);$contador++){
                                    $valor= ord($texto[$contador])-ord('A');
                                    $str2.=$arrayfabeto[$valor];
                                }
                                echo "Texto cifrado: ".$str2;
                            }
                        }
                    }
                } 
             }  
         }
         
        ?>
    </body>   
</html>
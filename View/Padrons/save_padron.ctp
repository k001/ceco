<div class="ui-layout-center">
    <div id="view-holder" class="ui-layout-content">
          <div class="scroll-pane">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Listado de Usuario</a></li>
            </ul>
          
            <button id="fullscreenb"><i class="icon-fullscreen"></i></button>
    
            <div class="dashRow">
                <div class="row-fluid">
                    <div class="span12">
                        <h2 class="dashHead">Resultado de importacion:
                       <!-- <div style="float:right;">
                            <i class="icon-user"></i><?php echo $this->Html->link('Nuevo Usuario',array('controller' => 'users', 'action' => 'add'), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                        </div>-->
                        </h2>
                        <div class="dashWidget">
                            <?php
                            require_once("/importar_padron/db.php");
                            $db = new DB();
                            function _multiple_busqueda($needle, $haystack)
                            {
                                if(is_array($haystack))
                                {
                                    $cuanto = count($haystack);
                                    for($i=0;$i<$cuanto;$i++)
                                    {
                                        if(in_array($needle, $haystack))
                                        {
                                            $find = array_search($needle, $haystack);
                                            $valor[] = $find;
                                            unset($haystack[$find]);
                                        }
                                    }
                                    return $valor;
                                }
                                else
                                {
                                    return FALSE;
                                }
                            }
                            //**************************** Inserto los index y demas **//////////////////////////////////////
                            $tabla_guardar = $_POST['tablas'][0];//elijo como tabla a guardar en el indexpad la primer seleccion de tabla en el cliente (si guardase datos en 2 o mas tablas diferentes seria inconsistente el indexpad ya que este soporta solo una tabla)
                            if(isset($_POST['nombre_indexpad']) && (isset($_POST['descripcion_indexpad']))){
                                $nombre_indexpad = $_POST['nombre_indexpad'];
                                $descripcion_indexpad = $_POST['descripcion_indexpad'];
                                $admin_id = $this->Session->read('Auth.User.id');
                                $cantidad_registros = $_POST['filas'];
                                
                                $sql_indexpad = "insert into indexpad (admin_id, created, nombre, descripcion, cant_registros, tabla) VALUES ('$admin_id', NOW(), '$nombre_indexpad', '$descripcion_indexpad', $cantidad_registros, '$tabla_guardar' )";
                                $db->execute($sql_indexpad);
                                
                                $indexpad_id = $db->getInsertId();
                                
                            }

                            $tablas = $_POST['tablas'];
                            $labels = $_POST['labels'];
                            
                            $columnas = count($tablas);
                            
                            $info = unserialize(base64_decode($_POST['info']));
                            
                            $cuantos = $_POST['filas'];
                            $cuantos = $cuantos-1;
                            
                            // Las veces que se repiten las tablas
                            $repeticiones = array_count_values($tablas);
                            // print_r($repeticiones);
                            
                            // echo "<br>";
                            
                            // Aca estan las tablas reales
                            $keys = array_keys($repeticiones);
                            //print_r($keys);
                            
                            // Esta es la que obtiene los keys de las repeticiones
                            // echo "<br>";
                            // $clave = _multiple_busqueda("productos", $tablas);
                            // print_r($clave);
                            
                            // echo "<br>";
                            // print_r($info);
                            
                            // Cuantas filas hay
                            // echo "<pre>";
                            // print_r($info);
                            // echo "</pre>";
                            
                            // Creando consulta
                            // Barriendo los nombres de las tablas
                            foreach ($keys as $key => $value) {
                                // Buscando los duplicados
                                $clave = _multiple_busqueda($value, $tablas);
                            
                                $i = 0;
                                $contador = count($clave);
                                
                                // Iniciando la consulta {
                            
                                $concatena = "";
                                $concatena .= "(`indexpad_id`,";
                            
                                // Moviendo dentro de las claves
                                foreach ($clave as $keyc => $valuec) {
                            
                                    $concatena .= "`".$labels[$valuec]."`";
                            
                                    $i++;
                                    if($i<$contador){
                                        $concatena .= ", ";
                                    }
                                }
                            
                                $concatena .= ")";
                            
                                // Buscando los duplicados
                                $clave2 = _multiple_busqueda($value, $tablas);
                            
                                $j = 0;
                                $salto = 0;
                            
                                $cc = "";
                            
                                for ($k=0; $k < $cuantos; $k++) { 
                            
                                    $cc .= "($indexpad_id,";
                            
                                    foreach ($clave2 as $key2 => $value2) {
                                
                                        $cc .= "'".$info[$value2+$salto]."'";
                                        $j++;
                                        if($j<$contador){
                                            $cc .= ", ";
                                        }
                                        else
                                        {
                                            if($k+1<$cuantos)
                                            {
                                                $cc .= "), ";
                                            }
                                            else
                                            {
                                                $cc .= ") ";
                                            }
                                            
                                            $j = 0;
                                        }
                                        
                                    }
                                    $salto = $salto + $columnas;
                                }
                            
                                //$cc .= ")";
                            
                                // Moviendo los datos
                                $consulta = "INSERT INTO ".$value." ".$concatena." VALUES ".$cc;
                                // Ejecutando la consulta
                                $db->execute($consulta);
                                
                            }
                            
                            // Algoritmo finalizado, redireccionar a donde gusten!
                           // exit("Fin del algoritmo.");
                            //header("Location: direccion_a_redireccionar.extension");
                            
                            ?>
                                <div class="alert alert-success">
                                  <a class="close" data-dismiss="alert">&times;</a>
                                  <strong>Padron importado Correctamente!</strong> Ahora puede seleccionarlo para mostrar en el mapa.
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="codeFooter">
            <button id="slideleftb" class="closed">Slide West</button>
            <button id="sliderightb" class="closed">Slide East</button> 
        </div>
    </div>
</div>   
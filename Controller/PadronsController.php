<?php

App::uses('AppController', 'Controller');

class PadronsController extends AppController {
    public $helpers = array('Html','Form');  
    
    public function index() {
        $this->layout = 'dashboard';
        
        App::import('Model', 'IndexPad');
        $indexpad = new IndexPad();
        $indexpadrones = $indexpad->find('all');
        $this->set('indexpadrones', $indexpadrones);
    }
    
    public function importar(){
        $this->layout = 'dashboard';
    }
    
    public function vista(){
        $this->layout = 'dashboard';
    }
    
    public function labelelement(){
        $this->layout = 'ajax'; 
    }
    
    public function save_padron(){
        $this->layout = 'dashboard';
        
        //para indexpadron
        App::import('Model', 'IndexPad');
        $indexpad = new IndexPad();
        $indexmax = $indexpad->find('first', array(
            'fields' => array('MAX(id) as max_index'
        )));
        $this->set('indexmax', $indexmax);
    }
    
    public function edit(){
        $this->layout = 'dashboard';
        
        if(isset($_GET['id_padron'])){//si mando el parametro id de padron
            App::import('Model', 'IndexPad'); //importo el modelo 
            $indexpad = new IndexPad();
            $idpad = $_GET['id_padron'];
            $indexpad_select = $indexpad->find('first',array(
                'conditions' => array('id' => $idpad)
            ));
            
            // armo select para el padron elejido
            $tabla = $indexpad_select['IndexPad']['tabla'];//hago la consulta sobre esta tabla
            $idpadron = $indexpad_select['IndexPad']['id'];//selecciono este padron de la tabla 
            $padron = array();
            
            if(isset($_GET['busqueda'])){//si ademas del id padron tambien envio una busqueda
                $busqueda = $_GET['busqueda'];
                $sql = "SELECT id, indexpad_id, nombre, apellido, domicilio, dni FROM $tabla where (indexpad_id = $idpadron) and ((dni like '%$busqueda%') or (apellido like '%$busqueda%'))";
                $res = $indexpad->query($sql);
                //armo arreglo
                for ($i = 0; $i < count($res); $i++) {
                    $linea = json_encode($res[$i][$tabla]);
                    array_push($padron, $linea);
                    $total = $i;
                } 
                $this->set('padron', $padron);
                $this->set('total', $total);
            }//in if busqueda
            
            $this->set('idpad', $idpad);
            $this->set('padron_nombre',$tabla);
        }//fin if isset
    }//end edit
    
    
    
    
    public function editar_persona(){
        $this->layout = 'dashboard';
        if(isset($_GET['idpad']) and isset($_GET['dni'])){//si mando el parametro id de padron
            App::import('Model', 'IndexPad'); //importo el modelo 
            $indexpad = new IndexPad();
            $idpad = $_GET['idpad'];
            $dni = $_GET['dni'];
            $indexpad_select = $indexpad->find('first',array(
                'conditions' => array('id' => $idpad)
            ));
            // armo select para el padron elejido
            $tabla = $indexpad_select['IndexPad']['tabla'];//hago la consulta sobre esta tabla
            $idpadron = $indexpad_select['IndexPad']['id'];//selecciono este padron de la tabla 
            
            //update
            if(isset($_GET['update'])){
                //variables
                $nombre = $_GET['nombre'];
                $apellido = $_GET['apellido'];
                $pcia = $_GET['pcia'];
                $localidad = $_GET['localidad'];
                $domicilio = $_GET['domicilio'];
                $piso = $_GET['piso'];
                $sexo = $_GET['sexo'];
                $telfijo = $_GET['telfijo'];
                $telmovil = $_GET['telmovil'];
                $email = $_GET['email'];
                $nacimiento = ($_GET['nacimiento'] == '')?'null':"'".$_GET['nacimiento']."'";
                $observaciones = $_GET['observaciones'];
                $latitude = ($_GET['latitude'] == '')?'null':$_GET['latitude'];
                $longitude = ($_GET['longitude'] == '')?'null':$_GET['longitude'];
                $georeferenciado = $_GET['georeferenciado'];
                    
                $sql = "UPDATE $tabla SET pcia = '$pcia', localidad = '$localidad', domicilio = '$domicilio', piso = '$piso',
                nombre = '$nombre', apellido = '$apellido', sexo = '$sexo', telfijo = '$telfijo', telmovil = '$telmovil', email = '$email',
                nacimiento = $nacimiento, observaciones = '$observaciones', latitude = $latitude, longitude = $longitude, georeferenciado = '$georeferenciado'
                WHERE indexpad_id = $idpadron and dni = $dni";
                $up = $indexpad->query($sql); 
            }
            
            $sql = "SELECT * FROM $tabla where (indexpad_id = $idpadron) and dni = $dni";
            $res = $indexpad->query($sql);
            $persona = $res[0][$tabla];
            
            $this->set('persona',$persona);
            
        }        
        
    }

    public function delete_padron(){
        $this->layout = 'dashboard';
        if(isset($_GET['idpad'])){
            App::import('Model', 'IndexPad'); //importo el modelo 
            $indexpad = new IndexPad(); 
            $idpad = $_GET['idpad'];
            //selecciono el indexpad para traer datos de en que tabla estan los datos del padron a eliminar
            $indexpad_select = $indexpad->find('first',array(
                'conditions' => array('id' => $idpad)
            ));                       
            $tabla = $indexpad_select['IndexPad']['tabla'];//hago la consulta sobre esta tabla
            $idpadron = $indexpad_select['IndexPad']['id'];//selecciono este padron de la tabla 
            
            //elimino el indexpad
            $sqlpad = "delete from indexpad where id = $idpad";
            $indexpad->query($sqlpad);
            //borro los datos del padron de la tabla (cascada)
            $sqltabla = "delete from $tabla where indexpad_id = $idpadron";
            $indexpad->query($sqltabla);
            
            $this->redirect('index');

        }
    }
    
    
    
}

?>
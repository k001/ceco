<?php
App::uses('AppController', 'Controller');

class DashboardsController extends AppController {
    public $helpers = array('Html','Form');
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }           
    
    public function index(){
        $this->layout = 'map';
        
        App::import('Model', 'User');
        $users = new User();
        $usuarios = $users->query('select * from users');
        $this->set('usuarios', $usuarios);
        
    }
    
    public function sbm(){
            $this->layout = 'map';
            $this->set('titulo','.:: Geo Padron Busquedas ::.');
            //vars
            $arr = array();//defino arreglo para guardar los json
            $total = 0;

            
            //Consulto index de padrones para llenar el combo
            App::import('Model', 'IndexPad'); //importo el modelo 
            $indexpad = new IndexPad();
            $padrones_list = $indexpad->find('all', array(
                'fields' => array('id','descripcion', 'cant_registros'),
                'conditions' => array('activo' => 1) //array of conditions
            ));
            
            if(isset($_GET['padron_id'])){//si mandaron a pedir un padron
                $idpad = $_GET['padron_id'];
                
                //traigo datos del indexpad
                $indexpad_select = $indexpad->find('first',array(
                    'conditions' => array('id' => $idpad)
                ));
                // armo select para el padron elejido
                $tabla = $indexpad_select['IndexPad']['tabla'];//hago la consulta sobre esta tabla
                $idpadron = $indexpad_select['IndexPad']['id'];//selecciono este padron de la tabla 
                $usar_direcciones_de = ($_GET['usardirecciones'] == 'geo_base')?'geo_base':"$tabla";//si voy a usar las direcciones del padron seleccionado o las georeferenciadas en pad_geobase
                
                if($usar_direcciones_de <> 'geo_base'){
                    $sql = "SELECT * FROM $tabla where (indexpad_id = $idpadron) and (latitude is not null) and (latitude <> 0)";
                    //ejecuto y creo json
                    $res = $indexpad->query($sql);
                    for ($i = 0; $i < count($res); $i++) {
                        $linea = '['.$res[$i]['b']['latitude'].','.$res[$i][$tabla]['longitude'].','.json_encode($res[$i][$tabla]['apellido'].' '.$res[$i][$tabla]['nombre']).','.json_encode($res[$i][$tabla]['domicilio']).','.json_encode($res[$i][$tabla]['dni']).']';
                        array_push($arr, $linea);
                    } 
                    $total = $i;//contador de total
                }else{
                    $sql = "SELECT a.dni, a.nombre, a.apellido, a.domicilio as dom_del_padron, b.domicilio, b.latitude, b.longitude FROM $tabla as a
                            left join pad_geobase as b ON a.dni = b.dni
                            Where a.indexpad_id = $idpadron and b.latitude is not null and b.latitude <> 0";
                    //ejecuto y creo json        
                    $res = $indexpad->query($sql);
                    for ($i = 0; $i < count($res); $i++) {
                        $linea = '['.$res[$i]['b']['latitude'].','.$res[$i]['b']['longitude'].','.json_encode($res[$i]['a']['apellido'].' '.$res[$i]['a']['nombre']).','.json_encode($res[$i]['b']['domicilio']).','.json_encode($res[$i]['a']['dni']).']';
                        array_push($arr, $linea);
                    }  
                    $total = $i;
                }//end else
                
            }else{
                App::import('Model', 'Padrones'); //importo el modelo 
                $padron = new Padrones();
                $res = $padron->query("SELECT latitude, longitude, apellido, nombre, domicilio, dni FROM pad_geobase
                where (latitude is not null) and (latitude <> 0) limit 100");
               
                //creo JSON
                for ($i = 0; $i < count($res); $i++) {
                    $linea = '['.$res[$i]['pad_geobase']['latitude'].','.$res[$i]['pad_geobase']['longitude'].','.json_encode($res[$i]['pad_geobase']['apellido'].' '.$res[$i]['pad_geobase']['nombre']).','.json_encode($res[$i]['pad_geobase']['domicilio']).','.json_encode($res[$i]['pad_geobase']['dni']).']';
                    array_push($arr, $linea);
                }
                $total = $i;
            }

            
            $this->set('arr',$arr);//padron a mostrar
            //$this->set('arr2',$arr2);  para mostrar dos padrones a la vez
            $this->set('padrones_list',$padrones_list);
            $this->set('total', $total);
            
        }
    
    
        
}//end class

?>    
<?php

App::uses('AppController', 'Controller');

class MapsController extends AppController {
    
    var $paginate = array();
    public $helpers = array('Html','Form');
    
        function index(){
            $this->set('titulo','.:: Geo Padron Mapa::.');
        }
        
        
        
        function sbm(){
            $this->layout = 'map';
            //$limit = 30;
            $circuitoalf = '711';
            
            $this->set('titulo','.:: Geo Padron Busquedas ::.');
            //cuento votantes general
            App::import('Model', 'Padron'); //importo el modelo
            $padron = new Padron();
            $total_votantes = $padron->query('select count(id) as total from padrons');
            //para Padron
            $res = $padron->query("select padgeo.latitude, padgeo.longitude, padgeo.apellido, padgeo.nombre, padgeo.domicilio, padgeo.nrodoc, morepad.id_padron, morepad.info1, morepad.info2 from padrons as padgeo
            inner join more_padrons as morepad on padgeo.nrodoc = morepad.dni
            where padgeo.latitude is not null and padgeo.latitude <> 0
            limit 100");
           
            $arr = array();//defino arreglo para guardar los json
            
            //creo JSON
            for ($i = 0; $i < count($res); $i++) {

                $linea = '['.$res[$i]['padgeo']['latitude'].','.$res[$i]['padgeo']['longitude'].','.json_encode($res[$i]['padgeo']['apellido'].' '.$res[$i]['padgeo']['nombre']).','.json_encode($res[$i]['padgeo']['domicilio']).','.
                json_encode($res[$i]['padgeo']['nrodoc']).','.json_encode($res[$i]['morepad']['id_padron']).','.json_encode($res[$i]['morepad']['info1']).','.json_encode($res[$i]['morepad']['info2']).']';
            
                array_push($arr, $linea);
            }
            
            
            /*
            
            
            //voy a hacerlo manual pero tengo que automatizar para varios padrones, hay que safar el viernes :)
            App::import('Model', 'Pj'); //importo el modelo "casco urbano 1"" llamado pj
            $pjjuan = new Pj();
            
            $pjjuan_coordenadas = $pjjuan->query("SELECT NroDoc, latitude, longitude, NombreApellido, domicilio, tablename FROM casco_urbano_1 WHERE latitude is not null AND latitude <> 0 AND ((revision = '+') OR(revision = 'BP'))");
            
            $arr2 = array();//defino arreglo para guardar los json
            
            //creo JSON
            foreach ($pjjuan_coordenadas as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    
                    //para casco urbano
                    //$linea2 = '['.$value2['latitude'].','.$value2['longitude'].','.json_encode($value2['NombreApellido']).','.json_encode(' | Doc: '.$value2['domicilio']).','.json_encode($value2['tablename']).']';
                    $linea2 = '['.$value2['latitude'].','.$value2['longitude'].','.json_encode($value2['NombreApellido']).','.json_encode($value2['domicilio']).','.json_encode($value2['tablename']).','.$value2['NroDoc'].']';
                   array_push($arr2, $linea2);
                }
            }
            */
//print_r($arr2);die();
            $this->set('arr',$arr);
            //$this->set('arr2',$arr2);  
            $this->set('total_votantes',$total_votantes); 
            
        }

        function save_lonja(){
            $this->autoRender = false;
            App::import('Model', 'Padron2015'); //importo el modelo
            $padron = new Padron2015();
            
            $json = json_decode($_POST['data']);
            
            
            
            for ($i = 0; $i < count($json); $i++) {
               
                $latitude = $json[$i][0];
                $longitude = $json[$i][1];
                $nombre = addslashes($json[$i][2]);
                $domicilio = addslashes($json[$i][3]); 
                $dni = $json[$i][4];
                $escuela = addslashes($json[$i][5]);
                $dom_escuela = addslashes($json[$i][6]);
                $mesa = $json[$i][7];
                $nombrelonja = $json[$i][8];
                
                
                $sql = "INSERT INTO lonjas (latitude, longitude, nombre, domicilio, dni, escuela, domicilio_escuela, mesa, nombre_lonja) VALUES ('$latitude','$longitude','$nombre','$domicilio','$dni','$escuela','$dom_escuela','$mesa', '$nombrelonja')";
                //echo($sql).'<br>'; 
                $padron->query($sql);
            }
            
        }


}
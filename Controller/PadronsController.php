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
    
}

?>
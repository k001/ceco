<?php
//en esta tabla o modelo, asigno los diferentes perfiles de una persona, ej: Pj, jubilado, ocecac, etc...
App::uses('AppModel', 'Model');

class Perfiles extends AppModel {
    public $useTable = 'perfiles';
}
   
?>
<?php
// este modelo es el que guarda los perfiles existentes, ej, pj, ocecac, jubilado, etc... la tabla perfiles tendra dni y id de esta tabla
App::uses('AppModel', 'Model');

class IndexPerfiles extends AppModel {
    public $useTable = 'indexperfiles';
}
   
?>
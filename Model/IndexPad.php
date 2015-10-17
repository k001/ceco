<?php
//indice de padrones, como los padrones se vuelcan en una sola tabla, aqui llevamos el control de los padrones existentes
App::uses('AppModel', 'Model');

class IndexPad extends AppModel {
    public $useTable = 'indexpad';
}
   
?>
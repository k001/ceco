<?php
//modelo de la base de datos general del sistema, en esta base de datos se consolidan los cambios manuales de los padrones.
App::uses('AppModel', 'Model');

class PadGeobase extends AppModel {
    public $useTable = 'pad_geobase';
}
   
?>
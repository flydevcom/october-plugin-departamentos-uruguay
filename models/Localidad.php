<?php

    namespace Martin\Departamentos\Models;

    use Model;

    class Localidad extends Model {

        public $table = 'martin_localidades';

        public $belongsTo = [
            'departamento' => 'Martin\Departamentos\Models\Departamento'
        ];

    }

?>
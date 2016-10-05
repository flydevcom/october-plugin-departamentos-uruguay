<?php

    namespace Martin\Departamentos;

    use Backend;
    use System\Classes\PluginBase;

    class Plugin extends PluginBase {

        public function pluginDetails() {

            return [
                'name'        => 'Departamentos',
                'description' => 'Widget con Departamentos y Localidades de Uruguay',
                'author'      => 'Martin',
                'icon'        => 'icon-flag'
            ];

        }

        public function registerFormWidgets() {
            return [
                'Martin\Departamentos\Departamentos' => ['label' => 'Departamentos Dropdown', 'code'  => 'dropdowndepartamentos'],
                'Martin\Departamentos\Localidades'   => ['label' => 'Localidades Dropdown'  , 'code'  => 'dropdownlocalidades']
            ];
        }

    }

?>
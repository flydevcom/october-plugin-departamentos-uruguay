<?php

    namespace Martin\Departamentos\FormWidgets;

    use Config;
    use Backend\Classes\FormWidgetBase;
    use Martin\Departamentos\Models\Departamento;
    use Martin\Departamentos\Models\Localidad;

    class Localidades extends FormWidgetBase {

        public function widgetDetails() {
            return [
                'name'        => 'Dropdown Localidades',
                'description' => 'Dropdown con las Localidades de Uruguay'
            ];
        }

        public function render() {
            $this->prepareVars();
            return $this->makePartial('widgets');
        }

        public function prepareVars() {
            $localidades   = Localidad::with('departamento')->orderBy('name')->get();
            foreach($localidades as $localidad) {
                $data[$localidad->departamento->name][$localidad->id] = $localidad->name;
            }
            ksort($data);
            $this->vars['localidades'] = $data;
        }

    }

?>
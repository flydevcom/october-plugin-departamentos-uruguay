<?php

    namespace Martin\Departamentos\FormWidgets;

    use Config;
    use Backend\Classes\FormWidgetBase;
    use Martin\Departamentos\Models\Departamento;

    class Departamentos extends FormWidgetBase {

        public function widgetDetails() {
            return [
                'name'        => 'Departamentos Dropdown',
                'description' => 'Dropdown con los Departamentos de Uruguay'
            ];
        }

        public function render() {
            $this->prepareVars();
            return $this->makePartial('widgets');
        }

        public function prepareVars() {
            $this->vars['departamentos'] = Departamento::orderBy('name')->lists('name', 'id');
        }

    }

?>
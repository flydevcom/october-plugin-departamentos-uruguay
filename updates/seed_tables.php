<?php

    namespace Martin\Departamentos\Updates;

    use Seeder;
    use Martin\Departamentos\Models\Departamento;
    use Martin\Departamentos\Models\Localidad;

    class SeedTables extends Seeder {

        public function run() {

            $file = plugins_path('/martin/departamentos/updates/seed_data.csv');

            if(($handle = fopen($file, 'r')) !== FALSE) {
                while(($data = fgetcsv($handle, 0, ",")) !== FALSE) {

                    $departamento = Departamento::firstOrCreate([
                        'name' => $data[0]
                    ]);

                    $localidad = Localidad::firstOrCreate([
                        'departamento_id' => $departamento->id,
                        'name'            => $data[1],
                        'cp'              => $data[2]
                    ]);

                }
                fclose($handle);
            }

        }

    }

?>
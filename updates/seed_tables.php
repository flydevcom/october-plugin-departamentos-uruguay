<?php

    namespace Martin\Departamentos\Updates;

    use Seeder;
    use Martin\Departamentos\Models\Departamento;
    use Martin\Departamentos\Models\Localidad;

    class SeedTables extends Seeder {

        public function run() {

            $file = plugins_path('/martin/departamentos/updates/seed_departamentos.csv');
            if(($handle = fopen($file, 'r')) !== FALSE) {
                while(($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                    $departamento       = new Departamento;
                    $departamento->id   = $data[0];
                    $departamento->name = strtoupper($data[1]);
                    $departamento->save();
                }
                fclose($handle);
            }


            $file = plugins_path('/martin/departamentos/updates/seed_localidades.csv');

            if(($handle = fopen($file, 'r')) !== FALSE) {
                while(($data = fgetcsv($handle, 0, ",")) !== FALSE) {

                    $departamento = Departamento::where('name', $data[0])->first();

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
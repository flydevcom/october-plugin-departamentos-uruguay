<?php

    namespace Martin\Departamentos\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class CreateTables extends Migration {

        public function up() {

            Schema::create('martin_departamentos', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 80)->unique();
                $table->timestamps();
            });

            Schema::create('martin_localidades', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('departamento_id')->unsigned();
                $table->foreign('departamento_id')->references('id')->on('martin_departamentos');
                $table->string ('name', 150);
                $table->integer('cp');
                $table->timestamps();
            });

        }

        public function down() {
            Schema::drop('martin_localidades');
            Schema::drop('martin_departamentos');
        }

    }

?>
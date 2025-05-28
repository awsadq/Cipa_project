<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistryEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registry_entries', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['auditor', 'organization']); // тип записи
            $table->string('name');                             // ФИО или название организации
            $table->string('license_number')->nullable();       // № лицензии
            $table->date('included_at')->nullable();            // дата включения в реестр
            $table->string('pdf_path')->nullable();             // путь к PDF, если прикрепляется
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registry_entries');
    }
}


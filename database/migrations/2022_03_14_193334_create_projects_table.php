<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // 'name',
            // 'url',
            // 'screen',
            $table->string('name');
            $table->string('url');
            $table->string('screen');
            /** 'technologies:', es: HTML,CSS...
             * Array-> nuova tabella technologies
             *      M A M
             *      Tabella ponte con technology_id e project_id
            */
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
        Schema::dropIfExists('projects');
    }
}

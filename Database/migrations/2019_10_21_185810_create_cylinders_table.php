<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCylindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nf_cylinders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gas_id')->unsigned();
            $table->string('slug');
            $table->string('name',180);
            $table->decimal('volume', 8, 2);
            $table->integer('pressure')->nullable();
            $table->text('vendor')->nullable();
            $table->text('partNumber')->nullable();
            $table->timestamps();
            
            $table->foreign('gas_id')
					->references('id')
					->on('nf_gas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nf_cylinders');
    }
}

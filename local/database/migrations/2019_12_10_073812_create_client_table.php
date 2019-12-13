<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_clients', function (Blueprint $table) {
            $table->bigIncrements('id_ct');
            $table->text('ct_fn')->nullable();
            $table->text('ct_inn')->nullable();
            $table->text('ct_tax')->nullable();
            $table->text('ct_ad_ref')->nullable();
            $table->text('ct_images')->nullable();
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
        Schema::dropIfExists('client');
    }
}

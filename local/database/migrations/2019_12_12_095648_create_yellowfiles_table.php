<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYellowfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yellowfiles', function (Blueprint $table) {
            $table->bigIncrements('id_yf');
            $table->integer('id_ct_yf');
            $table->text('yf_mtt');
            $table->text('yf_currency');
            $table->text('yf_currencyter');
            $table->text('yf_fixfee');
            $table->text('yf_discount');
            $table->text('yf_time');
            $table->text('yf_rates_a');
            $table->text('yf_rates_b');
            $table->text('yf_rates_c');
            $table->text('yf_rates_d');
            $table->text('yf_rates_e');
            $table->text('yf_rates_f');
            $table->text('yf_taxnumber');
            $table->text('yf_inv_num');
            $table->text('yf_address');
            $table->text('yf_road');
            $table->text('yf_dis');
            $table->text('yf_subdis');
            $table->text('yf_provice');
            $table->text('yf_code');
            $table->text('yf_country');
            $table->text('yf_phone');
            $table->text('yf_fax');
            $table->text('yf_email');
            $table->text('yf_atten');
            $table->text('yf_invioctext');
            $table->text('yf_location');
            $table->text('yf_refer');
            $table->integer('yf_confict');

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
        Schema::dropIfExists('yellowfiles');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_address_clients', function (Blueprint $table) {
            $table->bigIncrements('ct_ad_id');
            $table->integer('id_ct_fk');
            $table->text('ct_ad');
            $table->text('ct_ad_branch');
            $table->text('ct_ad_road');
            $table->text('ct_ad_subarea');
            $table->text('ct_ad_area');
            $table->text('ct_ad_province');
            $table->text('ct_ad_code');
            $table->text('ct_ad_country');
            $table->text('ct_ad_phone');
            $table->text('ct_ad_fax');
            $table->text('ct_ad_mail');
            $table->text('ct_ad_atten');
            $table->text('ct_ad_invoice');
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
        Schema::dropIfExists('address');
    }
}

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
            $table->text('ct_ad')->nullable();
            $table->text('ct_ad_branch')->nullable();
            $table->text('ct_ad_road')->nullable();
            $table->text('ct_ad_subarea')->nullable();
            $table->text('ct_ad_area')->nullable();
            $table->text('ct_ad_province')->nullable();
            $table->text('ct_ad_code')->nullable();
            $table->text('ct_ad_country')->nullable();
            $table->text('ct_ad_phone')->nullable();
            $table->text('ct_ad_fax')->nullable();
            $table->text('ct_ad_mail')->nullable();
            $table->text('ct_ad_atten')->nullable();
            $table->text('ct_ad_invoice')->nullable();
            $table->text('ct_ad_ref')->nullable();

            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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

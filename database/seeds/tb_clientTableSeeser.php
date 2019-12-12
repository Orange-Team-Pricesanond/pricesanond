<?php

use Illuminate\Database\Seeder;

class tb_clientTableSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\tb_client::class, 20)->create();
    }
}

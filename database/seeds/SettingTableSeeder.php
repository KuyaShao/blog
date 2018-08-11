<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\Setting::create([
        	'site_name'=>'Laravel\"s blog',
        	'address'=>'Bataan Phillippines',
        	'contact_number'=>'090912198174',
        	'contact_email'=>'ardaisadrian@gmail.com'
        ]);
    }
}

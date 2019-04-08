<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::firstOrCreate([
            'about'             => '',
            'address'           => 'проспект Абая 10а, уг.пр. Назарбаева.',
            'phone_number'      => '+7 707 221 98 91',
            'url_to_youtube'    => 'https://www.youtube.com/channel/UC5S1AmXPurVASShGZkMQQUA',
            'url_to_facebook'   => 'https://web.facebook.com/tmigra/',
            'url_to_instagram'  => 'https://www.instagram.com/tm_igra/',
            'map'               => 'https://yandex.kz/maps/-/CCBCzAka',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}

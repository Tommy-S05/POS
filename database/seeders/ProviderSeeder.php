<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider1 = new Provider();
        $provider1->name = "Lenovo";
        $provider1->email = "lenovo@hotmail.com";
        $provider1->ruc_number = "45632108961";
        $provider1->address = "Agora Mall";
        $provider1->phone = "8098541236";
        $provider1->save();

        $provider2 = new Provider();
        $provider2->name = "Apple";
        $provider2->email = "apple@hotmail.com";
        $provider2->ruc_number = "78456310984";
        $provider2->address = "Blue Mall";
        $provider2->phone = "8294563018";
        $provider2->save();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client1 = new Client();
        $client1->name = "Tommy Sánchez";
        $client1->cedula = "40230431708";
        $client1->ruc = "489621307843";
        $client1->address = "Torre Europa";
        $client1->phone = "8098522693";
        $client1->email = "tommy-elpapi@hotmail.com";
        $client1->save();

        $client2 = new Client();
        $client2->name = "Diana Matos";
        $client2->cedula = "40239493154";
        $client2->ruc = "45632178950";
        $client2->address = "Residencial Olga II";
        $client2->phone = "8295857982";
        $client2->email = "dianamatos01@gmail.com";
        $client2->save();
    }
}

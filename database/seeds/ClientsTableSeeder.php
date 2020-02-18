<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $clients = ['Client One', 'Client Two'];
        foreach ($clients as $client) {
            Client::create([
                'name' => $client,
                'phone' => '0595817016',
                'address' => 'Gaza',
            ]);
        }
    }
}

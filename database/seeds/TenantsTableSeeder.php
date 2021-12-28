<?php

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Plan;
use App\Models\User;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '41.175.343/0001-74',
            'name' => 'Technology Saints',
            'url' =>  'technology-saints',
            'email' => 'tiagogoncalves044@gmail.com',
        ]);
    }
}

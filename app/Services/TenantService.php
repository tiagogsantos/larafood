<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Str;

class TenantService
{
    private $plan, $data = [];

    public function make (Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        // Inserindo o tenant no banco de dados atraves do formulário
        $tenant =  $this->storeTenant();

        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant ()
    {
        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],
            'url' => Str::slug($data['empresa']),
            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}

<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    // Retorna o tenant
    public function getTenantIdentify ()
    {
       return auth()->user()->tenant_id;
    }

    // Retorna o objeto do tenant
    public function getTenanat (): Tenant
    {
        return auth()->user()->tenant;
    }

    // Verificando se o usuário é admin
    public function isAdmin (): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }

}

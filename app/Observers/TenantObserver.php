<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    /**
     * Handle the tenant "created" event.
     *
     * @param  \App\Models\\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::slug($tenant->name);
    }

    /**
     * Handle the tenant "updated" event.
     *
     * @param  \App\Models\\Tenant  $tenant
     * @return void
     */
    public function updating(Tenant $tenant)
    {
        $tenant->url = Str::slug($tenant->name);
    }

}

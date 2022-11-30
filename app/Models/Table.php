<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use TenantTrait;

    protected $table = 'tables';

    protected $primaryKey = 'id';

    protected $fillable = [
      'tenant_id',
      'name',
      'peoples'
    ];
}

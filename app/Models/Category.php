<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantTrait;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'url',
        'description',
        'tenant_id'
    ];

    // Produto pode estar em mais de uma categoria
    public function products ()
    {
        // Relacionamento de muitos para muitos
       return $this->belongsToMany(Product::class);
    }

}

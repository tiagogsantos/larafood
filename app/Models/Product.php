<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $primaryKey = 'id';

    protected $table = 'products';

    protected $fillable = [
        'title',
        'url',
        'price',
        'description',
        'image'
    ];

    // Produto pode estar em mais de uma categoria
    public function categories ()
    {
        // Relacionamento de muitos para muitos
       return $this->belongsToMany(Category::class);
    }

}


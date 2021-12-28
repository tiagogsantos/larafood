<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'url',
        'price',
        'description'
    ];

    /*
     * Um Plano para varios detalhes
     */

    public function details ()
    {
        // Relacionamento de 1 para muitos
        return $this->hasMany(DetailPlan::class);
    }

    public function tenants ()
    {
        return $this->hasMany(Tenant::class);
    }

    /* Para realizar a busca do filtro de plano */
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orwhere('description', 'LIKE', "%$filter%")
                        ->paginate();

        return $results;
    }

}

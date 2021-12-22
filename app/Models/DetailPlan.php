<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table = 'detail_plans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    /*
     * Relacionamento de muitos para 1
     */

    public function plan ()
    {
        $this->belongsTo(Plan::class);
    }
}

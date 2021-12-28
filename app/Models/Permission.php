<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
      'name',
      'description'
    ];

    /*
     * Relacionamento de profiles
     */

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}

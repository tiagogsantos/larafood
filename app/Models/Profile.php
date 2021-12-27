<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';

    protected $fillable = [
      'name',
      'description'
    ];

    /*
     * Relacionamento de permission
     */

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class);
    }


}

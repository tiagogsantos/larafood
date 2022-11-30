<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissions = Permission::all();

        // Passando a permissão cadastrada no banco atraves do meu usuário
        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission->name);
            });
        }

        // Posso restagar permissão por permissão passando o nome
        /* Gate::define('Permissão 1', function (User $user) {
             return $user->hasPermission('Permissão 1');
         }); */

        Gate::define('owner', function ($user, $object) {
            return $user->id === $object->user_id;
        });

        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            } else {
                return false;
            }
        });
    }
}

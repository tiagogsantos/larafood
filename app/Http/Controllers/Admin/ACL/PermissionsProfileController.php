<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permissions;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionsProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permissions $permission)
    {
        $this->profile = $profile;
        $this->permissions = $permission;

    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions();

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }


    public function profiles($idPermission)
    {
        if (!$permissions = $this->permissions->find($idPermission)) {
            return redirect()->back();
        }

        $profiles = $permissions->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permissions', 'profiles'));
    }


}

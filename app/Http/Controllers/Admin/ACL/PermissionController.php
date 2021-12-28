<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;
use function view;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->get();

        return view('admin.pages.permissions.index', [
           'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        $permissions = Permission::create($request->all());

        if (!$permissions) {
            return redirect()->back()->with('error', 'Não foi possível criar a permissão');
        }

        $permissions->save();

        return redirect()->route('permissions.index')->with('success', 'Permissão criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::where('id', $id)->first();

        return view('admin.pages.permissions.edit', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permissions = Permission::where('id', $id)->first();

        if (!$permissions) {
            return redirect()->back()->with('error', 'Não foi possível realizar a alteração');
        }

        $permissions->update($request->all());

        return redirect()->back()->with('success', 'Permissão atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = Permission::where('id', $id);

        if (!$permissions) {
            return redirect()->back()->with('error', 'Não foi possível atualizar os dados');
        }

        $permissions->delete();

        return redirect()->route('permissions.index', [
            'permissions' => $permissions
        ])->with('success', 'Permissão deletado com sucesso!');

    }
}

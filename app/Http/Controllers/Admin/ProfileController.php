<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profiles)
    {
        $this->repository = $profiles;
    }

    /*
     * Retornando a view de perfis com os resultados
     */
    public function index()
    {
        $profiles = $this->repository->orderBy('name', 'asc')->paginate();

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    /*
     * Retornando a view de criar perfil
     */
    public function create ()
    {
        return view ('admin.pages.profiles.create');
    }

    public function store (StoreUpdateProfile $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('profiles.index')->with('success', 'Perfil criado com sucesso!');
    }

    public function edit ($id)
    {
        $profiles = Profile::where('id', $id)->first();

        if (!$id) {
            return redirect()->back()
                ->with('error', 'Não existe perfil para o usuário inserido');
        }

        return view('admin.pages.profiles.edit', [
            'profiles' => $profiles
        ]);
    }

    public function update (StoreUpdateProfile $request, $id)
    {
        $profiles = Profile::where('id', $id)->first();

        $profiles->fill($request->all());

        if (!$profiles->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy ($id)
    {
        $profiles = Profile::where('id', $id)->first();

        if (!$profiles) {
            return redirect()->back()->with('error', 'Ooops, Algo deu errado');
        }

        $profiles->delete();

        return redirect()->route('profiles.index', [
            'profiles' => $profiles
        ])->with('success', 'Perfil deletado com sucesso!');
    }
}

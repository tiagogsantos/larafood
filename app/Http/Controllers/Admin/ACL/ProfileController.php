<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use function redirect;
use function view;

class ProfileController extends Controller
{
    protected $repository;

    // Construtor
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

    // Metodo para criar um perfil
    public function store (StoreUpdateProfile $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('profiles.index')->with('success', 'Perfil criado com sucesso!');
    }

    // Metodo para editar um perfil
    public function edit ($id)
    {
        $profiles = Profile::where('id', $id)->first();

        if (!$profiles) {
            return redirect()->route('profiles.index', [
                'profiles' => $profiles
            ])->with('error', 'Não existe perfil para o usuário inserido!');
        }

        return view('admin.pages.profiles.edit', [
            'profiles' => $profiles
        ]);
    }

    // Metodo para realizar uma atualização de perfil
    public function update (StoreUpdateProfile $request, $id)
    {
        $profiles = Profile::where('id', $id)->first();

        $profiles->fill($request->all());

        if (!$profiles->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

    // Metodo para deletar um perfil
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

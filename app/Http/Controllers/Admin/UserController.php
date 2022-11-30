<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUsers;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    // Construtor
    public function __construct(User $users)
    {
        $this->repository = $users;

        $this->middleware(['can:usuarios']);
    }

    /*
     * Retornando a view de perfis com os resultados
     */
    public function index()
    {
        $users = $this->repository->orderBy('name', 'asc')->paginate();

        return view('admin.pages.users.index', [
            'users' => $users
        ]);
    }

    /*
     * Retornando a view de criar perfil
     */
    public function create ()
    {
        return view ('admin.pages.users.create');
    }

    // Metodo para criar um perfil
    public function store (StoreUpdateUsers $request)
    {
        $tenant = $request->input('tenant_id');

        $data = User::create([
            'tenant_id' => $tenant,
            'password' => bcrypt('password'),
            'name' => $request->name,
            'email' => $request->email
        ]);

        if (!$data) {
            return redirect()->back()->with('error', 'Não foi possível cadastrar o usuário');
        }

        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Metodo para editar um perfil
    public function edit ($id)
    {
        $users = User::where('id', $id)->first();

        if (!$users) {
            return redirect()->route('users.index', [
                'users' => $users
            ])->with('error', 'Não existe perfil para o usuário inserido!');
        }

        return view('admin.pages.users.edit', [
            'users' => $users
        ]);
    }

    // Metodo para realizar uma atualização de perfil
    public function update (StoreUpdateUsers $request, $id)
    {
        $users = User::where('id', $id)->first();

        if (!$users->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        $data = $request->only(['name', 'email']);

        $users->update($data);

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

    // Metodo para deletar um perfil
    public function destroy ($id)
    {
        $users = Profile::where('id', $id)->first();

        if (!$users) {
            return redirect()->back()->with('error', 'Ooops, Algo deu errado');
        }

        $users->delete();

        return redirect()->route('users.index', [
            'users' => $users
        ])->with('success', 'Perfil deletado com sucesso!');
    }

    public function search ()
    {
        dd('Teste');
    }
}

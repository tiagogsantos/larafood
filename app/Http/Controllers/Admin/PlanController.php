<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    /*
     * Metodos privados
     */
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    /*
     * Retornando meus planos com páginção e ordenando por nome
     */
    public function index ()
    {
        $plans = $this->repository->orderBy('name', 'asc')->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    public function create()
    {
        // Retornando a view de criação de planos
        return view('admin.pages.plans.create');
    }

    /*
     * Salvando os dados preenchidos no banco
     */
    public function store (StoreUpdatePlan $request)
    {
        $data = $request->all();
        // Recendo o meu nome para a minha url
        $data['url'] = Str::slug($request->name);

        $this->repository->create($data);

        return redirect()->route('index');
    }

    /*
     * Metodo para chamar a view com os dados para edição
     */
    public function edit ($id)
    {
        $plan = Plan::where('id', $id)->first();

        if (!$id) {
            return view('admin.pages.plans.index');
        }

        return view ('admin.pages.plans.edit', [
            'plans' => $plan
        ]);
    }

    /*
     * Metodo para realizar a atualização da edição
     */
    public function update (StoreUpdatePlan $request, $id)
    {
        $plan = Plan::where('id', $id)->first();

        $plan->fill($request->all());

        $plan['url'] = Str::slug($request->name);

        if (!$plan->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->back();
    }

    /*
     * Metodo para excluir um registro
     */
    public function destroy ($id)
    {
        $plans = $this->repository->where('id', $id)->first();

        if (!$plans) {
            return redirect()->back();
        }

        $plans->delete();

        return redirect()->route('index');
    }

    /*
     * Metodo para realizar busca no filtro
     */
    public function search (Request $request)
    {
       $filters = $request->except('_token');

       $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }
}

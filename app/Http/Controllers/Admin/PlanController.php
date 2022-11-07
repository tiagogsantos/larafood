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
     * Retornando meus planos com paginação e ordenando por nome
     */
    public function index ()
    {
        $plans = $this->repository->orderBy('name', 'asc')->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    // Retornando a view de criação de planos
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /*
     * Salvando os dados preenchidos no banco
     */
    public function store (StoreUpdatePlan $request)
    {
        $data = $request->all();

        // Recendo o meu nome para a minha url
       // $data['url'] = Str::slug($request->name);

        $this->repository->create($data);

        return redirect()->route('index')->with('success', 'Plano cadastrado com sucesso!');
    }

    /*
     * Metodo para chamar a view com os dados para edição
     */
    public function edit ($id)
    {
        $plan = Plan::where('id', $id)->first();

        if (!$plan) {
            return redirect()->route('index', [
                'plans' => $plan
            ])->with('error', 'Não existe plano para a identificação informada');
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

        return redirect()->back()->with('success', 'Plano atualizado com sucesso!');
    }

    /*
     * Metodo para excluir um registro
     */
    public function destroy ($id)
    {
        $plans = $this->repository
            ->with('details')
            ->where('id', $id)->first();

        if (!$plans) {
            return redirect()->back();
        }

        if ($plans->details->count() > 0) {
            return redirect()->back()->with('error', 'Existem detalhes vinculados a este plano');
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function index ()
    {
        // Retornando meus planos com páginção e ordenando por nome
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

    public function store (Request $request)
    {
        $data = $request->all();
        // Recendo o meu nome para a minha url
        $data['url'] = Str::slug($request->name);

        $this->repository->create($data);

        return redirect()->route('index');
    }

    public function edit ($id)
    {
        $plan = Plan::where('id', $id)->first();

        if (!$id) {
            return redirect()->back();
        }

        return view ('admin.pages.plans.edit', [
            'plans' => $plan
        ]);
    }

    public function update (Request $request, $id)
    {
        $plan = Plan::where('id', $id)->first();

        $plan->fill($request->all());

        if (!$plan->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->back();
    }

    public function destroy ($id)
    {
        $plans = $this->repository->where('id', $id)->first();

        if (!$plans) {
            return redirect()->back();
        }

        $plans->delete();

        return redirect()->route('index');
    }

    public function search (Request $request)
    {
       $filters = $request->all();

       $plans = $this->repository->search();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }
}

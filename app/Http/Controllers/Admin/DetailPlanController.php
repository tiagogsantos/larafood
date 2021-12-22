<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    /*
     * Construtor do Plano com a model de Detallhe e Plano
     */
    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    /*
     * Retorno da index dos meus planos
     */
    public function index ($urlPlan)
    {
        // Se não obtiver o plano irei redirecionar
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
         }

        // Obtendo o detalhe do meu relacionamento
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    /*
     * Metodo para o blade de criação de detalhe
     */
    public function create ($urlPlan)
    {
        // Se não obtiver o plano irei redirecionar
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    /*
     * Metodo para cadastrar no banco de dados
     */
    public function store (Request $request, $urlPlan)
    {
        // Se não obtiver o plano irei redirecionar
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        /*
        $data = $request->all();
        $data['plan_id'] = $plan->id;
        $data->repository->create($data);
        */

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanDetail;
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
    public function store (StoreUpdatePlanDetail $request, $urlPlan)
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

        return redirect()->route('details.plan.index', $plan->url)->with('success', 'Detalhe criado com sucesso!');
    }

    /*
     * Metodo para fazer a exibição dos dados preenchidos
     */
    public function edit ($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->where('id', $idDetail)->first();

        if (empty($plan) || empty($detail)) {
            return redirect()->route('index')->with('error', 'Não existe detalhe para a identificação informada!');
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    // Metodo para realizar o update do detalhe
    public function update (StoreUpdatePlanDetail $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if (!$plan || !$detail) {
            redirect()->back();
        }

       $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url)->with('success', 'Detalhe atualizado com sucesso!');
    }

    // Metodo para deletar um detalhe
    public function destroy ($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->where('id', $idDetail)->first();

        if (!$plan || !$detail) {
            return redirect()->route('index')->with('error', 'Você não pode deletar um detalhe com outra identificação');
        }

        $detail->delete();

        return view('index', [
            'plan' => $plan
        ])->with('success', 'Detalhe excluido com sucesso!');

        //return redirect()->route('details.plan.index', $plan->id)->with('message', 'Detalhe deletado com sucesso');
    }
}

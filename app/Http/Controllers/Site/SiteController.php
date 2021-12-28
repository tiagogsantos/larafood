<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index ()
    {
        $plans = Plan::with('details')->orderBy('price', 'asc')->get();

        return view('site.pages.home.index', [
            'plans' => $plans
        ]);
    }

    /*
     * Trabalhando com a sessão do meu plano
     */
    public function plan($url)
    {
        if (empty($plan = Plan::where('url', $url)->first())) {
            return redirect()->back();
        }

        session()->put('plan', $plan);

        return redirect()->route('register');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {

        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();
        // dd($intent);

        return view('plans.show', compact('plan', 'intent'));
    }
}

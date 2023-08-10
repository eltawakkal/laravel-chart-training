<?php

namespace App\Http\Controllers;

use App\Charts\DataGenderChart;
use App\Charts\DataMarhalahChart;
use App\Models\ItemMarhalah;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(DataGenderChart $dataGenderChart, DataMarhalahChart $dataMarhalahChart) {
        
        $users = User::with('marhalahRelation')->get();
        $itemMarhalahs = ItemMarhalah::all();

        return view('welcome', [
            'data_users' => $users,
            'item_marhalahs' => $itemMarhalahs,
            'data_gender_chart' => $dataGenderChart->build(),
            'data_marhalah_chart' => $dataMarhalahChart->build()
        ]);
    }

    function store(Request $request) {
        User::create($request->all());

        return redirect(route('dashboard'));
    }

    function storeMarhalah(Request $request) {
        ItemMarhalah::create($request->all());

        return redirect(route('dashboard'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Charts\DataGenderChart;
use App\Charts\DataMarhalahChart;
use App\Models\ItemMarhalah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yoeunes\Toastr\Facades\Toastr;

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

        Toastr::success('Data Berhasil Ditambah');

        return redirect(route('dashboard'));
    }

    function update(Request $request) {
        $id = Crypt::decryptString($request->id);
        
        User::find($id)->update($request->only(['name', 'gender', 'marhalah']));

        Toastr::info('Data Berhasil Diubah');

        return redirect()->back();
    }

    function destroy(Request $request) {
        $id = Crypt::decryptString($request->id);
        
        User::find($id)->delete();

        Toastr::success('Data Berhasil Dihapus', 'Berhasil');

        return redirect()->back();
    }

    function storeMarhalah(Request $request) {
        ItemMarhalah::create($request->all());

        return redirect(route('dashboard'));
    }
}

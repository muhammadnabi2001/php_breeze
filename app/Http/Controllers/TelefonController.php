<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Telefon;
use Illuminate\Http\Request;

class TelefonController extends Controller
{
    public function telefon()
    {
        $telefonlar = Telefon::orderBy('id', 'desc')->get();
        return view('Telefon.telefon', ['telefonlar' => $telefonlar]);
    }
    public function store(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'model' => 'required|max:25',
            'color' => 'required|max:50',
            'price' => 'required',
            'count' => 'required',
        ]);

        $telefon = new Telefon();
        $telefon->model = $request->model;
        $telefon->color = $request->color;
        $telefon->price = $request->price;
        $telefon->count = $request->count;
        $telefon->save();
        return redirect('telefon')->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");
    }
    public function telefoncreate()
    {
        return view('Telefon.telefoncreate');
    }
    public function edit(Telefon $telefon)
    {
        //dd($telefon);
        return view('Telefon.telefonupdate', ['telefon' => $telefon]);
    }
    public function update(Request $request, Telefon $telefon)
    {
        //dd($telefon);
        $request->validate([
            'model' => 'required|max:25',
            'color' => 'required|max:50',
            'price' => 'required',
            'count' => 'required',
        ]);
        $telefon->model = $request->model;
        $telefon->color = $request->color;
        $telefon->price = $request->price;
        $telefon->count = $request->count;
        $telefon->save();
        return redirect('telefon')->with('success', "Ma'lumot muvaffaqiyatli yangilandi");
    }
    public function delete(Telefon $telefon)
    {
        //dd($telefon);
        $telefon->delete();
        return redirect('telefon')->with('success', "Ma'lumot muvaffaqiyatli o'chirildi");

    }
}

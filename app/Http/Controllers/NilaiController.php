<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Nilai;
use Auth, Validator;

class NilaiController extends Controller
{
    public function getNilai(Nilai $nilai)
    {   
        if(Auth::user()->role == 1) {
            $nilais = $nilai::where('user_id', Auth::user()->id)
                            ->get();

            return view('nilai', compact('nilais'));
        } else {
            return redirect('/');
        } 
    }

    public function getAllNilai()
    {
        if(Auth::user()->role == 2) {
            $nilais = Nilai::with('user')->get();
            
            return view('nilai', compact('nilais'));
        } else {
            return redirect('/');
        } 
    }

    public function addNilai(Nilai $nilai, $id)
    {   
        if(Auth::user()->role == 2) {
            $nilais = Nilai::with('user')->get();
            return view('add', compact('id'));
        } else {
            return redirect('/');
        } 
    }

    public function submitNilai(Request $request)
    {   
        if(Auth::user()->role == 2) {
            Validator::make($request->all(), [
                'user_id'=>'required',
                'mata_pelajaran'=>'required',
                'nilai'=>'required'
            ]);

            $dataNilai = Nilai::create([
                            'user_id' => $request->get('user_id'),
                            'mata_pelajaran' => $request->get('mata_pelajaran'),
                            'nilai' => $request->get('nilai')
                        ]);
            
            return redirect('/nilai/siswa/all');
        } else {
            return redirect('/');
        }
    }
}


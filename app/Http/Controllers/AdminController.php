<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Siswa;
use App\Guru;

use View, Auth, DB, Validator;

class AdminController extends Controller
{   
    public function getUserByRole(User $user, $id)
    {
        if(Auth::user()->role == 2 || Auth::user()->role == 3) {
            if ($id == "1") {
                $siswas = $user->where('role', $id)
                            ->with('siswa')
                            ->get();
                return view('siswa', compact('siswas'));
            } else if ($id == "2") {
                $gurus = $user->where('role', $id)
                        ->with('guru')
                        ->get();
                return view('guru', compact('gurus'));
            }
        } else {
            return redirect('/');
        } 
    }

    public function edit(User $user, $id)
    {      
        if(Auth::user()->role == 3) {
            $data = $user->find($id);
            if ($data->role == "1") {
                $userData = $user->where([
                                ['role', $data->role],
                                ['id', $id]
                            ])
                            ->with('siswa')
                            ->first();
            } else if ($data->role == "2") {
                $userData = $user->where([
                                ['role', $data->role],
                                ['id', $id]
                            ])
                            ->with('guru')
                            ->first();
            }
            return view('edit', compact('userData'));
        } else {
            return redirect('/');
        } 
    }

    public function update(Request $request, $id)
    {   
        if(Auth::user()->role == 3) {
            DB::beginTransaction();
            try {
                Validator::make($request->all(), [
                    'name'=>'required',
                    'email'=>'required|email|unique:users',
                    'role'=>'required'
                ]); 
                $user = User::find($id);

                if($user->role == 1){
                    $user->name =  $request->get('name');
                    $user->email = $request->get('email');
                    $user->role = $request->get('role');

                    $siswa = Siswa::where('user_id',$id)->first();
                    $siswa->kelas = $request->get('kelas');
                    $siswa->umur = $request->get('umur');
                    $siswa->jenis_kelamin = $request->get('jenis_kelamin');
                    $user->save();
                    $siswa->save();
                } else if($user->role == 2){
                    $user->name =  $request->get('name');
                    $user->email = $request->get('email');
                    $user->role = $request->get('role');

                    $guru = Guru::where('user_id',$id)->first();
                    $guru->mata_pelajaran = $request->get('mata_pelajaran');
                    $guru->umur = $request->get('umur');
                    $guru->jenis_kelamin = $request->get('jenis_kelamin');
                    $user->save();
                    $guru->save();
                }
                DB::commit();
                return redirect('/user/all/role/'.$user->role)->with('success', 'user updated.'); 
            } catch (Exception $e){
                DB::rollback();
                return $e->getMessage();
            }
        } else {
            return redirect('/');
        } 
    }
}

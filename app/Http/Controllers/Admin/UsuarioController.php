<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class UsuarioController extends Controller
{
    //

    public function index() 
    {
        //
        $data = User::find(auth()->user()->id);
        
        return view('users.indexusuario',compact('data'));

    }
    public function editar(User $user) 
    {
        //
        
        return view('users.editar',compact('user'));

    }
    public function update(Request $request,User $user) 
    {
        //
        $request->validate([
            'nombre'=>'required','apellido'=>'required','cedula'=>'required|max:10|min:10'
            ,'email'=>'required','telefono'=>'required','direccion'=>'required']);
        try {
            DB::beginTransaction();
            $user->update($request->all());
            if ($request->image) {
                $cade = str_replace('storage', 'public', $user->image);
                Storage::delete($cade);
                $image = $request->file('image')->store('public/usuario');
                $url = Storage::url($image);
                $user->image=$url;
                $user->save();
            }
            DB::commit();
        return redirect()->route('usuario.index');

    } catch (\Exception $exception) {
        DB::rollback();
        return  redirect()->back()->with('error', "Error" . $exception->getMessage());
    }

    }

}

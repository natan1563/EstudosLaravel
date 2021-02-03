<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new User();

        if($request->has('action') && $request->get('action') === 'search') {
            $allUsers = $users->filterAll($request);
        } else {
            $allUsers = $users->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('users.index', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          try{
            if($request->password === $request->password_confirm){
                $data = $request->all();
                $user = new User();
                $user->password = Hash::make($request->password);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
                $request->session()->flash('success', 'Registro gavado com sucesso!');
            } else {
                throw new Exception('Erro ao gravar o usuário, por favor verique seus dados');
            }

          } catch(\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
          }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //  dd($user);
        try {

            if(!empty($request->password) && !empty($request->password_confirm)){

                if($request->password === $request->password_confirm) {
                    $user->password = Hash::make($request->password);
                } else {
                    throw new Exception('As senhas não coincidem');
                }

            } else {
                $user->password = $user->password;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $request->session()->flash('success', 'Alterações realizadas com sucesso!!');

        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();

            $request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados!');
        }

        return redirect()->back();
    }
}

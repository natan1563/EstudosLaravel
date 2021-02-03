<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provider = new Provider();

        if($request->has('action') && $request->get('action') === 'search') {
            $providers = $provider->filterAll($request);
        } else {
            $providers = $provider->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.createProvider');
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
            // dd($request);
            $data = $request->all();
            $providers = new Provider();
            $providers->phone = $request->phone;
            $providers->name = $request->name;
            $providers->email = $request->email;
            $providers->active = $request->is_active;
            $providers->save();
            $request->session()->flash('success', 'Registro gavado com sucesso!');
          } catch(\Exception $e) {
            $request->session()->flash('error', 'Erro ao gravar, tente novamente.');
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
        $provider = Provider::find($id);

        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {

        try{
            $provider->name = $request->name;
            $provider->email = $request->email;
            $provider->phone = $request->phone;
            $provider->active = $request->is_active;
            $provider->save();
            $request->session()->flash('success', 'Alterações realizadas com sucesso!!');
        } catch(\Exception $e) {
            $request->session()->flash('error', 'Falha ao atualizar, tente novamente!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Provider $provider)
    {
        try {
            $provider->delete();

            $request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados!');
        }

        return redirect()->back();
    }
}

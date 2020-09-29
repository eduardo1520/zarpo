<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;
use DB;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ini = $_REQUEST['data_ini'];
        $fim = $_REQUEST['data_fim'];

        if($ini) {
            $dados = DB::select('select data_ini,data_fim,preco,estoque,disponivel from tarifas where data_ini = ? and data_fim = ?', [$ini,$fim]);
        } else {
            $dados = Tarifa::get();
        }
        return response()->json($dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultado = Tarifa::create($request->all());
        if($resultado) {
            echo 'Tarifa cadastrada com sucesso!';
        } else {
            echo 'Erro ao cadastrar a tarifa!';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id) {
            $dados = Tarifa::find($id);
        }

        if($dados) {
            return response()->json($dados);
        } else {
            echo "Nenhuma tarifa encontrada.";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Tarifa::find($id)) {
            $resultado = Tarifa::find($id)->delete();
            echo $resultado ? 'Tarifa removida com sucesso' : 'Não foi possível excluír a tarifa';
        } else {
            echo 'Não foi possível excluír a tarifa';
        }
    }

}

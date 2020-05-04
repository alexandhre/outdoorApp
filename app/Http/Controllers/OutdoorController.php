<?php

namespace App\Http\Controllers;

use App\Console\Commands\OutdoorCommand;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Outdoor;

class OutdoorController extends Controller
{
    use DispatchesJobs;
    protected $outdoor;

    /**                    
     * @return View
     */

    public function index()
    {        
        $outdoors = Outdoor::all();

        return view('outdoor.index', compact('outdoors'));            
    } 

     /**     
     * @return View
     */
    
    public function create()
    {    
        return view('outdoor.create');
    } 

     /**
     * Update Outdoor.          
     * @param  Id  $id
     * @return View
     */
    
    public function edit($id)
    {
        $outdoor = Outdoor::findOrFail($id);
        return view('outdoor.edit',compact('outdoor'));
    } 

     /**
     * Update Outdoor.
     *
     * @param  Request  $request
     * @param  Id  $id
     * @return Message
     */

    public function update(Request $request, $id)
    {        
        try {
            $outdoor = Outdoor::findOrFail($id);
            $outdoor->contratante        = $request->contratante;
            $outdoor->situacao = $request->situacao;
            $outdoor->endereco    = $request->endereco;
            $outdoor->cep       = $request->cep;
            $outdoor->save();
            return redirect()->action('OutdoorController@index')->with('success', 'Sucesso ao editar Outdoor!');
        } catch (\Exception $e) {
            return redirect()->action('OutdoorController@index')->with('danger', 'Erro ao editar Outdoor!');                                  
        }                
    }

    /**
     * Create a new Outdoor.
     *
     * @param  Request  $request
     * @return Message
     */
    public function store(Request $request)
    {         
        $outdoor = new Outdoor;               
        $result = $this->dispatch(
            new OutdoorCommand($outdoor, $request)
        ); 
        if($result){
            return redirect()->action('OutdoorController@index')->with('success', 'Sucesso ao cadastrar Outdoor!');
        }else{
            return redirect()->action('OutdoorController@index')->with('danger', 'Erro ao cadastrar Outdoor!');                                  
        }
    }

    /**
     * Delete an Outdoor.
     *
     * @param  Id  $id
     * @return Message
     */
    public function delete(Request $request)
    {                
        try {
            Outdoor::where('id',$request->idDelete)->delete();
            return redirect()->action('OutdoorController@index')->with('success', 'Sucesso ao deletar Outdoor!');
        } catch (\Exception $e) {
            return redirect()->action('OutdoorController@index')->with('danger', 'Erro ao deletar Outdoor!');                                  
        }   
    }
}

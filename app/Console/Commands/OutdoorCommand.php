<?php

namespace App\Console\Commands;

use App\Outdoor;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class OutdoorCommand extends Command
{
    protected $request;
    protected $outdoor;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:outdoor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add outdoors data to the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Outdoor $outdoor, Request $request)
    {
        parent::__construct();
        $this->outdoor = $outdoor;
        $this->request = $request;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $outdoor = $this->outdoor;
            $data = [];
            $data['situacao'] = $this->request->situacao;
            $data['contratante'] = $this->request->contratante;
            $data['cep'] = $this->request->cep;
            $data['endereco'] = $this->request->endereco;
            $outdoor->fill($data);
            $outdoor->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

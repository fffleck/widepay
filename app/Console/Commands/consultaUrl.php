<?php

namespace App\Console\Commands;

use App\retornos;
use App\urls;
use Carbon\Carbon;
use http\Url;
use Illuminate\Console\Command;

class consultaUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consultaUrl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command de consulta das Urls, a cada 5 minutos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $retorno = retornos::pluck('url_id')->all();
//        if (count($retorno) > 0) {
//            $lista_urls = urls::whereNotIn('id', $retorno);
//        } else {
            $lista_urls = urls::all();
//        }

        foreach ($lista_urls as $index => $lista_url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $lista_url->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            $header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
            $header = substr($result, 0, $header_size);
            $body = substr( $result, $header_size );
            curl_close($ch);


            $retorno = quoted_printable_encode($body);

            $gravar_retorno = new retornos();
            $gravar_retorno->url_id = $lista_url->id;
            $gravar_retorno->cod_retorno = $httpCode;
            $gravar_retorno->retorno = $retorno;
            $gravar_retorno->dt_consulta = date_format(Carbon::now(), 'Y-m-d H:i:s');
            $gravar_retorno->save();

        }
    }
}

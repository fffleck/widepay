<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class urls extends Model
{
    protected $table = 'urls';

    public function filtros(Request $request)
    {
        $endereco = $request->has('endereco') ? $request->endereco : false;
        $nome_site = $request->has('nome_site') ? $request->nome_site : false;

        $urls = $this
            ->when($endereco, function ($query) use ($endereco) {
                return $query->where('url', 'LIKE', "%$endereco%");
            })
            ->when($nome_site, function ($query) use ($nome_site) {
                return $query->where('nome_site', 'LIKE', "%$nome_site%");
            })
            ->paginate();
        return $urls;
    }

    public function store(Request $request)
    {
        $this->url = $request->endereco;
        $this->nome_site = $request->nome_site;
        $this->user_id = Auth::user()->id;

        try {
            DB::beginTransaction();
            $this->save();
            DB::commit();
            return $this;
        } catch (Exception $e) {
            Log::error(__FILE__ . ' - Line:' . __LINE__ . ' - ERROR : ' . $e->getMessage());
            return false;
        }
    }
}

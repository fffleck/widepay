<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Tags extends Model
{
    protected $table = 'tag';
    /**
     * Save new or updated tag on database.
     * @param Request $request
     * @return self|bool
     */
    public function store(Request $request)
    {
        $this->name = $request->name;
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

    /**
     * Search tags by filters passed
     * @param mixed $request
     * @return collection
     */
    public function filtro(Request $request)
    {
        $name = $request->has('name') ? $request->name : false;
        $Produto = $this
            ->when($name, function ($query) use ($name) {
                return $query->where('name', 'LIKE', "%$name%");
            })
            ->paginate();
        return $Produto;
    }
}

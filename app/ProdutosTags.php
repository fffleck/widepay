<?php

namespace App;

use App\Produtos;
use App\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProdutosTags extends Model
{
    protected $table = 'produto_tag';


    protected $fillable = ['product_id', 'tag_id'];

    public function store(Produtos $Product, Tags $Tag)
    {
        $self = self::firstOrNew([
            'product_id' => $Product->id,
            'tag_id' => $Tag->id
        ]);
        // $this->product_id = $Produtos->id;
        // $this->tag_id = $Tags->id;
        try {
            DB::beginTransaction();
            $self->save();
            DB::commit();
            return $this;
        } catch (Exception $e) {
            Log::error(__FILE__ . ' - Line:' . __LINE__ . ' - ERROR : ' . $e->getMessage());
            return false;
        }
    }


    public function clearUnselectedTags(Produtos $Product, array $tags_ids) : void
    {
        try {
            DB::beginTransaction();
            self::where('product_id', $Product->id)
                ->whereNotIn('tag_id', $tags_ids)
                ->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error(__FILE__ . ' - Line:' . __LINE__ . ' - ERROR : ' . $e->getMessage());
        }
    }


    public function mostUsedTags()
    {
        $usedTags = $this->selectRaw('COUNT(id) as count_tag, tag_id')
            ->with('tag')
            ->groupBy('tag_id')
            ->orderBy('count_tag', 'desc')
            ->limit(10)
            ->get();
        return $usedTags;
    }


    public function tag()
    {
        return $this->belongsTo('\App\Tags');
    }
}


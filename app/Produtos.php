<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProdutosTags;
use App\Tags;
use Illuminate\Support\Facades\Log;

class Produtos extends Model
{
    protected $table = 'produto';

    /**
     * Save new or updated product on database.
     * @param Request $request
     * @return self|bool
     */
    public function store(Request $request)
    {
        $this->stock = $request->stock;
        $this->title = $request->title;
        $this->description = $request->description;
        if ($request->has('image')) {
            $this->image = $this->storeImageFile($request);
        }
        
        try {
            DB::beginTransaction();
            $this->save();
            $tags = $request->tags ?: [];
            (new ProdutosTags)->clearUnselectedTags($this, $tags);
            if ($tags) {
                foreach ($request->tags as $tag) {
                    (new ProdutosTags)->store($this, Tags::find($tag));
                }
            }
            DB::commit();
            return $this;
        } catch (Exception $e) {
            Log::error(__FILE__ . ' - Line:' . __LINE__ . ' - ERROR : ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Storages product image file
     * @param Request $request  
     * @return string
     */
    private function storeImageFile(Request $request)
    {
        $path = Storage::putFile('public/images', $request->file('image'));
        Storage::setVisibility($path, 'public');
        return str_replace('public/', '', $path);
    }

    /**
     * Search products by filters passed
     * @param mixed $request
     * @return collection
     */
    public function filtroProdutos(Request $request)
    {
        $title = $request->has('title') ? $request->title : false;
        $description = $request->has('description') ? $request->description : false;
        $from_stock = $request->has('from_stock') ? $request->from_stock : false;
        $to_stock = $request->has('to_stock') ? $request->to_stock : false;
        $Products = $this
            ->when($title, function ($query) use ($title) {
                return $query->where('title', 'LIKE', "%$title%");
            })
            ->when($description, function ($query) use ($description) {
                return $query->where('description', 'LIKE', "%$description%");
            })
            ->when($from_stock, function ($query) use ($from_stock) {
                return $query->where('stock', '>=', "$from_stock");
            })
            ->when($to_stock, function ($query) use ($to_stock) {
                return $query->where('stock', '<=', "$to_stock");
            })
            ->paginate();
        return $Products;
    }

    /**
     * Return min and max of stock, to range input
     * @return self
     */
    public function getStock()
    {
        $Range = $this->selectRaw("MAX(stock) as max_stock, MIN(stock) as min_stock")->first();
        return $Range;
    }

    /**
     * Relation between products and tags
     */
    public function tags()
    {
        return $this->hasManyThrough('App\Tags',
            'App\ProdutosTags',
            'product_id', 
            'id', 
            'id', 
            'tag_id');
    }
}

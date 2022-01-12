<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Product};
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductTable extends Component
{
    use WithPagination;

    public int $perPage = 5;
    public ?string $query = null;
    public string $orderBy = 'created_at';
    public string $orderAsc = 'desc';

    public $resultCount;

    public ?string $name;
    public $price;
    public ?int $brand_id = null;
    public ?int $category_id = null;

    public function render()
    {
        $products = Product::search($this->query)->with('category')->with('brand')
        ->orderBy($this->orderBy, $this->orderAsc)
        ->paginate($this->perPage);
        $this->resultCount = empty($this->query) ? null : $products->count().' '.Str::plural('product', $products->count()) . ' found';
        return view('livewire.admin.product-table', compact('products'));
    }
}

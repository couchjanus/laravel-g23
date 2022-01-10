<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Brand, Category, Tag, Picture, Product};
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $category_id;
    public $brand_id;
    public $tagids = [];
    public $pictures = [];
    public $status;

    public function save()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;
        $product->status = $this->status ?? 1;

        $product->save();

        foreach($this->tagids as $tagid){
            $product->tags()->attach($tagid);
        }

        foreach($this->pictures as $picture){
            $picture_path = $picture->store('products', 'public');
            Picture::create(['product_id' => $product->id, 'picture_path' => $picture_path]);
        }

        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.create-product', [
            'categories' => Category::pluck('name', 'id'),
            'brands' => Brand::pluck('name', 'id'),
            'tags' => Tag::pluck('title', 'id'),
            'pstatus' => [1=>'Active', 2=>'Pending', 3=>'Blocked']
        ]);
    }
}

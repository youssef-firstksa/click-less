<?php

namespace App\Livewire\Agent;

use App\Models\Bank;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProductSectionTab extends Component
{
    public Bank $activeBank;
    public Collection $products;
    public Collection $sections;
    public $activeProductTab = 0;

    public function mount()
    {
        $this->activeBank = auth()->user()->activeBank();
        $this->products = Product::where('bank_id', $this->activeBank->id)->whereActivated()->get();
        $this->setActiveProductTab($this?->products[0]?->id ?? 1);
    }

    public function render()
    {
        return view('livewire.agent.product-section-tab');
    }

    public function setActiveProductTab(int $productId)
    {
        $this->activeProductTab = $productId;
        $this->sections = Section::where('product_id', $productId)->whereActivated()->has('articles')->get();
    }
}

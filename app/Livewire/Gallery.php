<?php

namespace App\Livewire;

use Livewire\Component;

class Gallery extends Component
{
    public $images;
    public $featuredUrl;

    public function render()
    {
        return view('livewire.gallery');
    }

    public function mount($images)
    {

        $this->images = $images;
        $this->featuredUrl = $images->where('featured', true)->first()->url;

    }

    public function setFeatured($url)
    {
        $this->featuredUrl = $url;
    }
}

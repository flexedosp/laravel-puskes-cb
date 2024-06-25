<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardBerita extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $gambar,
        public string $judul,
        // public string $deskripsi,
        public string $date,
        public string $slug
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-berita');
    }
}

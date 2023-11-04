<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $category;

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->category, fn ($q) => $q->withCategories($this->category))
            ->orderBy('published_at', $this->sort)->paginate(5);
    }

    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search = $search;
    }

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
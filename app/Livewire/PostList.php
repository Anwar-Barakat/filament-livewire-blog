<?php

namespace App\Livewire;

use App\Models\Category;
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

    #[Url()]
    public $popular = false;


    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->when($this->search, fn ($q) => $q->search($this->search))
            ->when($this->activeCategory(), fn ($q) => $q->withCategories($this->category))
            ->when($this->popular, function ($query) {
                $query->popular();
            })
            ->orderBy('published_at', $this->sort)->paginate(5);
    }

    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function activeCategory()
    {
        return Category::where('slug', $this->category)->first();
    }

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
        $this->reset(['search', 'category']);
    }

    // #[On('post-created')]
    public function updatePostList($post = null){

    }
    
    #[On('post-created')]
    public function render()
    {
        return view('livewire.post-list');
    }
}

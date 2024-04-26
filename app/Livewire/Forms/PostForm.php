<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{

    #[Rule('required|min:3')]
    public $title = '';
    #[Rule('required|min:3')]
    public $slug = '';
    #[Rule('required|min:10')]
    public $body = '';
    #[Rule('required|date')]
    public $published_at = '';
    #[Rule('image|max:1024')]
    public $image;

    public function add()
    {
        $validated = $this->validate();
        try {
            if ($this->image) {
                $this->image->store('uploads');
            }
            $validated['image'] = $this->image->store('uploads', 'public');
            $validated['user_id'] = auth()->id();
            Post::create($validated);

            $this->reset(['title', 'slug', 'body', 'published_at', 'image']);

            toastr()->success('Post added successfully');
        } catch (\Exception $e) {
            toastr()->error('Error occurred while adding the post: ' . $e->getMessage());
        }
    }
}

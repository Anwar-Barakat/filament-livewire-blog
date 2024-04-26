<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public PostForm $form;
    public ?Post $post = null;
    public function submit(){
        $this->form->add();
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}

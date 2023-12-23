<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Article\Models\Post;

class ShowMoreTags extends Component
{
    public $post;
    public  $tags;
    public $limit = 3;
    protected $listeners = ['render'];
    public $text_show_more = "Show more";

    public function render()
    {

        $this->loadPost();
        return view('livewire.show-more-tags',);
    }

    public function loadPost()
    {

        if($this->limit == 0){
            $this->tags  = Post::query();
            $this->tags = Post::find($this->post)->tags()->get();
        }else{
            $this->tags  = Post::query();
            $this->tags = Post::find($this->post)->tags()->limit(3)->get();
        }


    }

    public function showAll(): void
    {
       if($this->limit == 0){
           $this->limit = 3;
           $this->text_show_more = "Show more...";
           $this->loadPost();
       }else{
           $this->limit = 0;
           $this->text_show_more = "Show less...";
           $this->loadPost();
       }

        $this->dispatch('render');

    }


}

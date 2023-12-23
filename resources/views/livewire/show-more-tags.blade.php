<div>

    @foreach ($tags as $tag)
        <x-frontend.badge :url="route('frontend.tags.show', [encode_id($tag->id), $tag->slug])" :text="$tag->name" />
    @endforeach
            <br/>
        <button class="ml-2 mt-2 text-sm " wire:click="showAll">{{$text_show_more}}</button>
</div>

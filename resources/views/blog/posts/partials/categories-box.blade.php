 <div id="recommended-topics-box">
     <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
     <div class="topics flex flex-wrap justify-start gap-1">
         @forelse ($categories as $category)
         <x-badge wire:navigate href="{{ route('blog',['category'=>$category->slug]) }}" wire:navigate :textColor="$category->text_color" :bgColor="$category->bg_color">
             {{ $category->title }}
         </x-badge>
         @empty
         <h2>No Categories Found!!</h2>
         @endforelse
     </div>
 </div>

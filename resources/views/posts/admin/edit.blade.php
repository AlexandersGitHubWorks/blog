<x-app>
    <x-setting heading="Manage Post: {{ $post->title }}">
        <form method="POST" action="{{ route('post.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"/>
            <div class="flex align-bottom">
                <div class="flex-grow">
                    <x-form.input name="thumbnail"
                                  type="file"
                                  :required="false"
                                  :value="old('thumbnail', $post->thumbnail)"
                    />
                </div>

                <div class="mt-6 ml-4">
                    <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="rounded-xl" width="98">
                </div>
            </div>
            <x-form.textarea name="excerpt" rows="5">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body') ?? $post->body }}</x-form.textarea>
            <x-form.dropdown name="category_id" :items="$categories" label="category" :selected="$post->category_id"/>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-app>

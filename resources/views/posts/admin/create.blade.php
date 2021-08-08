<x-app>
    <x-setting heading="Create New Post">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt" rows="5"/>
            <x-form.textarea name="body"/>
            <x-form.dropdown name="category_id" :items="$categories" label="category"/>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-app>

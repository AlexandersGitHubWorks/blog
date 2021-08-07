<x-app>
    <section class="m-auto max-w-md border border-gray-200 rounded p-12">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt" rows="5"/>
            <x-form.textarea name="body"/>
            <x-form.dropdown name="category_id" :items="$categories" label="category"/>

            <x-form.button>Publish</x-form.button>
        </form>
    </section>
</x-app>

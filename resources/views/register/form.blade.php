<x-app>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="max-w-3xl border border-gray-200 rounded p-12 mx-auto">
            <h1 class="text-lg font-bold mb-8 pb-2 border-b">Register</h1>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="email" type="email" autocomplete="username"/>
                <x-form.input name="password" type="password" autocomplete="new-password"/>

                <x-form.button>Submit</x-form.button>
            </form>
        </div>
    </main>
</x-app>

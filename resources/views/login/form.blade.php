<x-app>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="max-w-3xl border border-gray-200 rounded p-12 mx-auto">
            <h1 class="text-lg font-bold mb-8 pb-2 border-b">
                Log In
                <span class="text-sm font-normal">(Test User: admin@example.com, 123123)</span>
            </h1>

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <x-form.input name="email" type="email" autocomplete="username"/>
                <x-form.input name="password" type="password" autocomplete="current-password"/>

                <x-form.button>Login</x-form.button>
            </form>
        </div>
    </main>
</x-app>

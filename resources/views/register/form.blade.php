<x-app>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div>
            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <x-input-errors/>

                <input class="block border border-gray-1 mt-3 p-3"
                       placeholder="name"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       type="text"
                       required
                >
                @error('name')
                    <p class="text-red-300 text-xs">{{ $message }}</p>
                @enderror

                <input class="block border border-gray-1 mt-3 p-3"
                       placeholder="username"
                       name="username"
                       id="username"
                       value="{{ old('username') }}"
                       type="text"
                       required
                >
                @error('username')
                    <p class="text-red-300 text-xs">{{ $message }}</p>
                @enderror

                <input class="block border border-gray-1 mt-3 p-3"
                       placeholder="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       type="email"
                       required
                >
                @error('email')
                    <p class="text-red-300 text-xs">{{ $message }}</p>
                @enderror

                <input class="block border border-gray-1 mt-3 p-3"
                       placeholder="password"
                       name="password"
                       id="password"
                       type="password"
                       required
                >
                @error('password')
                    <p class="text-red-300 text-xs">{{ $message }}</p>
                @enderror


                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mt-3"
                >
                    Submit
                </button>
            </form>
        </div>
    </main>
</x-app>

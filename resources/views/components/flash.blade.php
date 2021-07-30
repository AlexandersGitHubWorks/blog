@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => $el.classList.add('opacity-0'), 4000); setTimeout(() => show = false, 6000)"
         x-show="show"
         class="fixed bottom-3 right-1.5 bg-blue-500 px-4 py-2 rounded text-white transition"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif

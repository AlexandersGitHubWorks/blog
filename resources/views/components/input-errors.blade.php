@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li class="text-red-300 text-xs">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if ($errors->any())
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif

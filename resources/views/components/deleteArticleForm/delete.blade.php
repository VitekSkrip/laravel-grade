<form {{ $attributes }}>

    @csrf
    @method('DELETE')

    <x-addArticleForm.buttons.cancel>
        {{ $slot }}
    </x-addArticleForm.buttons.cancel>

</form>

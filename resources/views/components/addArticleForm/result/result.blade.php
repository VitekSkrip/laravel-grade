@if ($errors->any())
    <x-addArticleForm.result.errors/>
@endif

@if (session()->has('success_message'))
    <x-addArticleForm.result.success message="{{ session()->get('success_message') }}"/>
@endif
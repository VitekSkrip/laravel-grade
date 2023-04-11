<x-layouts.app>
    <x-slot name="title">Редактирование новости</x-slot>

    @section('page-title', 'Редактирование новости')

    {{ Breadcrumbs::setCurrentRoute('articles.edit', $article) }}

    @section('content')
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>

            <x-addArticleForm.result.result/>

            <x-addArticleForm.form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')

                    <x-addArticleForm.input.all :article="$article"/>

                    <div class="block">

                        <x-addArticleForm.buttons.submit>
                            Сохранить
                        </x-addArticleForm.buttons.submit>

                    </div>

            </x-addArticleForm.form>

            <x-deleteArticleForm.delete action="{{ route('articles.destroy', $article)}}" method="POST">
                Удалить
            </x-deleteArticleForm.delete>
        </div>
    @endsection
</x-layouts.app>

<x-layouts.admin
    page-title="Форма редактирования новости"
    title="Форма редактирования новости"
>
    <x-forms.form action="{{ route('admin.articles.update', ['article' => $article]) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')

        <x-forms.concrete-forms-fields.admin-article-form-fields :article="$article" />

        <x-forms.row>
            <x-forms.submit-button>
                Сохранить
            </x-forms.submit-button>
            <x-forms.cancel-button href="{{ route('admin.articles.edit', ['article' => $article]) }}">
                Отменить
            </x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>

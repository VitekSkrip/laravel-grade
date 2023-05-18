@csrf
<x-forms.groups.group for="fieldCarName" error="{{ $errors->first('name') }}">
    <x-slot:label>Название модели</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarName"
        name="name"
        placeholder="Stinger"
        value="{{ old('name', $car->name) }}"
        error="{{ $errors->first('name') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarMainImage" error="{{ $errors->first('image') }}">
    <x-slot:label>Основное изображение модели</x-slot:label>
    <x-forms.inputs.one-file
        id="fieldCarMainImage"
        name="image"
        value="{{ $car->imageUrl }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarPrice" error="{{ $errors->first('price') }}">
    <x-slot:label>Цена с учетом скидки</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarPrice"
        name="price"
        placeholder="1000000"
        value="{{ old('price', $car->price) }}"
        error="{{ $errors->first('price') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarOldPrice" error="{{ $errors->first('old_price') }}">
    <x-slot:label>Цена без скидки</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarOldPrice"
        name="old_price"
        value="{{ old('old_price', $car->old_price) }}"
        error="{{ $errors->first('old_price') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarCategories" error="{{ $errors->first('category_id') }}">
    <x-slot:label>Категория</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarCategories"
        name="category_id"
        error="{{ $errors->first('category_id') }}"
    >
        @foreach ($categories as $category)
            <option @isset($car->category) @selected($category->id == old('category_id', $car->category->id)) @endisset value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarDescription" error="{{ $errors->first('description') }}">
    <x-slot:label>Описание модели</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldCarDescription"
        name="description"
        :value="old('description', $car->description)"
        error="{{ $errors->first('description') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarSalon" error="{{ $errors->first('salon') }}">
    <x-slot:label>Салон</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarSalon"
        name="salon"
        placeholder="Черный, Натуральная кожа (WK)"
        value="{{ old('salon', $car->salon) }}"
        error="{{ $errors->first('salon') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarKPP" error="{{ $errors->first('kpp') }}">
    <x-slot:label>КПП</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarKPP"
        name="kpp"
        placeholder="Автомат, 6 AT"
        value="{{ old('kpp', $car->kpp) }}"
        error="{{ $errors->first('kpp') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarYear" error="{{ $errors->first('year') }}">
    <x-slot:label>Год выпуска</x-slot:label>

    <x-forms.inputs.text
        id="fieldCarYear"
        name="year"
        placeholder="2022"
        value="{{ old('year', $car->year) }}"
        error="{{ $errors->first('year') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarColor" error="{{ $errors->first('color') }}">
    <x-slot:label>Цвет</x-slot:label>

    <x-forms.inputs.text
        id="fieldCarColor"
        name="color"
        placeholder="Yacht Blue (DU3)"
        value="{{ old('color', $car->color) }}"
        error="{{ $errors->first('color') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarClass" error="{{ $errors->first('class_id') }}">
    <x-slot:label>Класс</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarClass"
        name="class_id"
        error="{{ $errors->first('class_id') }}"
    >
        @foreach ($carClasses as $class)
            <option @selected($class->id == old('class_id', $car->class_id)) value="{{ $class->id }}">{{ $class->name }}</option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarBody" error="{{ $errors->first('body_id') }}">
    <x-slot:label>Кузов</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarBody"
        name="body_id"
        error="{{ $errors->first('body_id') }}"
    >
        @foreach ($carBodies as $body)
            <option @selected($body->id == old('body_id', $car->body_id)) value="{{ $body->id }}">{{ $body->name }}</option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarEngine" error="{{ $errors->first('engine_id') }}">
    <x-slot:label>Двигатель</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarEngine"
        name="engine_id"
        error="{{ $errors->first('engine_id') }}"
    >
        @foreach ($carEngines as $engine)
            <option @selected($engine->id == old('engine_id', $car->engine_id)) value="{{ $engine->id }}">{{ $engine->name }}</option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarAdditionalImages" error="{{ $errors->first('images') }}">
    <x-slot:label>Дополнительные изображения модели</x-slot:label>
    <x-forms.inputs.multiple-files
        id="fieldCarAdditionalImages"
        name="images"
        :values="$car->images->pluck('url')->all()"
    />
</x-forms.groups.group>

<x-forms.groups.checkbox-group error="{{ $errors->first('is_new') }}">
    <x-slot:label>Новинка</x-slot:label>
    <x-forms.inputs.checkbox
        name="is_new"
        :checked="old('is_new', $car->is_new)"
    />
</x-forms.groups.checkbox-group>

<x-forms.groups.group for="fieldCarTags" error="{{ $errors->first('tags') }}">
    <x-slot:label>Теги</x-slot:label>

    <x-forms.inputs.text
        id="fieldCarTags"
        name="tags"
        placeholder="Парадигма, Архетип, Киа Seed"
        value="{{ old('tags', $car->tags->pluck('name')->implode(',')) }}"
        error="{{ $errors->first('tags') }}"
    />
</x-forms.groups.group>

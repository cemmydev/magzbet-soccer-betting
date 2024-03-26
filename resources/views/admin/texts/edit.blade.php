<div class='p-4'>
    <p class="font-bold py-4">Edit Text</p>
    @if ($errors->any())
        <ul class='text-danger-light'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="" method="post">
        @csrf
        <label for="admin_text_edit_field">field</label>
        <input class="block w-full p-2 dark:bg-darker" id="admin_text_edit_field" type="text" name="field"
            value="{{ $text->field }}">
        <label for="admin_text_edit_text">text</label>
        <textarea name="text" cols="30" rows="4" id="admin_text_edit_text"
            class="block w-full p-2 dark:bg-darker">{{ $text->text }}</textarea>
        <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
    </form>
</div>

<div class="min-w-screen bg-gray-200 px-5 py-5 dark:bg-darker">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <span class="px-3 text-danger-light">{{$error}}</span>
        @endforeach
    @endif
    <form action="" method='post'>
        @csrf
        <label for="ud_text_field">Place to show text</label>
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" name="field">
        <label for="ud_text_text">Content</label>
        <textarea name="text" id="ud_text_text" rows="10" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Type here within HTML format..."></textarea>
        <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
    </form>
</div>
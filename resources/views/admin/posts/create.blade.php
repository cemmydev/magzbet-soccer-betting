<form method="post" enctype="multipart/form-data" class="p-4">
    @csrf
    <p class="font-bold py-4">Create Bet</p>
    @if($errors->any())
        <ul class='text-danger-light'>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <label for="bet_create_hidden">hidden</label>
    <select id="bet_create_hidden" class="block w-full p-2 dark:bg-darker" name="hidden">
        <option class="w-12 p-2 dark:bg-darker" value='1'>true</option>
        <option class="w-12 p-2 dark:bg-darker" value='0'>false</option>
    </select>
    <label for="bet_create_event">event</label>
    <input id="bet_create_event" type="text" class="block w-full p-2 dark:bg-darker" name="event">
    <label for="bet_create_date">date</label>
    <input id="bet_create_date" type="date" class="block w-full p-2 dark:bg-darker" name="date">
    <label for="bet_create_description">description</label>
    <input id="bet_create_description" type="text" class="block w-full p-2 dark:bg-darker" name="description">
    <label for="bet_create_pick">pick</label>
    <input id="bet_create_pick" type="text" class="block w-full p-2 dark:bg-darker" name="pick">
    <label for="bet_create_image">image</label>
    <input id="bet_create_image" type="file" class="block border-2 p-2 dark:bg-darker" name="image">
    <label for="bet_create_subscription">subscription</label>
    <select multiple="multiple" id="bet_create_subscription" class="block w-full p-2 dark:bg-darker" name="subscription[]">
        @foreach ($subscriptions as $sub)
            <option value="{{ $sub['id'] }}">{{$sub['name']}}</option>
        @endforeach
    </select>
    <label for="bet_create_odd">odds</label>
    <input id="bet_create_odd" type="text" class="block w-full p-2 dark:bg-darker" name="odds">
    <label for="bet_create_stake">stake</label>
    <input id="bet_create_stake" type="text" class="block w-full p-2 dark:bg-darker" name="stake">
    <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
</form>
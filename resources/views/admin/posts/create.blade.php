<form method="post" class="p-4">
    @csrf
    <p class="font-bold py-4">Create Bet</p>
    <label for="bet_create_hidden">hidden</label>
    <select id="bet_create_hidden" class="block w-full p-2" name="hidden">
        <option value='1'>true</option>
        <option value='0'>false</option>
    </select>
    <label for="bet_create_event">event</label>
    <input id="bet_create_event" type="text" class="block w-full p-2" name="event">
    <label for="bet_create_date">date</label>
    <input id="bet_create_date" type="date" class="block w-full p-2" name="date">
    <label for="bet_create_description">description</label>
    <input id="bet_create_description" type="text" class="block w-full p-2" name="description">
    <label for="bet_create_pick">pick</label>
    <input id="bet_create_pick" type="text" class="block w-full p-2" name="pick">
    <label for="bet_create_image">image</label>
    <input id="bet_create_image" type="file" class="block border-2 p-2" name="image">
    <label for="bet_create_status">status</label>
    <select id="bet_create_status" class="block w-full p-2" name="status">
        <option value='pending'>PENDING</option>
        <option value='won'>WON</option>
        <option value='lose'>LOSE</option>
    </select>
    <label for="bet_create_subscription">subscription</label>
    <select id="bet_create_subscription" class="block w-full p-2" name="subscription">
        @foreach ($subscriptions as $sub)
            <option value="{{ $sub['id'] }}">{{$sub['name']}}</option>
        @endforeach
    </select>
    <label for="bet_create_odd">odds</label>
    <input id="bet_create_odd" type="text" class="block w-full p-2" name="odds">
    <label for="bet_create_stake">stake</label>
    <input id="bet_create_stake" type="text" class="block w-full p-2" name="stake">
    <label for="bet_create_gain">gain</label>
    <input id="bet_create_gain" type="text" class="block w-full p-2" name="gain">
    <label for="bet_create_profit">profit</label>
    <input id="bet_create_profit" type="text" class="block w-full p-2" name="profit">
    <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
</form>
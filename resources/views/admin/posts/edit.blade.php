<form enctype="multipart/form-data" method="post" class="p-4">
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
    <select id="bet_create_hidden" class="block w-full p-2 dark:bg-darker" name="hidden" value="{{$post['hidden']}}">
        <option value='1'>true</option>
        <option value='0'>false</option>
    </select>
    <label for="bet_create_event">event</label>
    <input id="bet_create_event" type="text" class="block w-full p-2 dark:bg-darker" name="event" value="{{$post['event']}}">
    <label for="bet_create_date">date</label>
    <input id="bet_create_date" type="date" class="block w-full p-2 dark:bg-darker" name="date" value="{{$post['date']}}">
    <label for="bet_create_description">description</label>
    <input id="bet_create_description" type="text" class="block w-full p-2 dark:bg-darker" name="description" value="{{$post['description']}}">
    <label for="bet_create_pick">pick</label>
    <input id="bet_create_pick" type="text" class="block w-full p-2 dark:bg-darker" name="pick" value="{{$post['pick']}}">
    <label for="bet_create_image">image</label>
    @if (isset($post['image']) && $post['image'] != null)
        <img src="{{asset($post['image'])}}" style="width:250px">
    @endif
    <input id="bet_create_image" type="file" class="block border-2 p-2 dark:bg-darker" name="image" value="{{$post['image']}}">
    <label for="bet_create_subscription">subscription</label>
    <select multiple id="bet_create_subscription" class="block w-full p-2 dark:bg-darker" name="subscription[]">
        @foreach ($subscriptions as $sub)
        <option value="{{ $sub['id'] }}"
            @foreach($post['subscription_plan'] as $selected_sub)
                @if($selected_sub['id'] == $sub['id'])
                    {{'selected'}}
                @endif
            @endforeach
        >{{$sub['name']}}</option>
        @endforeach
    </select>
    <label for="bet_create_status">status</label>
    <select id="bet_create_status" class="block w-full p-2 dark:bg-darker" name="status" value="{{$post['status']}}">
        <option value='pending'>PENDING</option>
        <option value='won'>WON</option>
        <option value='lose'>LOSE</option>
    </select>
    <label for="bet_create_odd">odds</label>
    <input id="bet_create_odd" type="text" class="block w-full p-2 dark:bg-darker" name="odds" value="{{$post['odds']}}">
    <label for="bet_create_stake">stake</label>
    <input id="bet_create_stake" type="text" class="block w-full p-2 dark:bg-darker" name="stake" value="{{$post['stake']}}">
    <label for="bet_create_gain">gain</label>
    <input id="bet_create_gain" type="text" class="block w-full p-2 dark:bg-darker" name="gain" value="{{$post['gain']}}">
    <label for="bet_create_profit">profit</label>
    <input id="bet_create_profit" type="text" class="block w-full p-2 dark:bg-darker" name="profit" value="{{$post['profit']}}">
    <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
</form>
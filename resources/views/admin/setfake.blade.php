@extends('admin.layouts.app')

@section('content')
<div class="min-w-screen bg-gray-200 px-5 py-5 dark:bg-darker">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <span class="px-3 text-danger-light block">{{$error}}</span>
        @endforeach
    @endif
    <form action="" method='post' class="generate-fake-page-form">
        @csrf
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Title" name="title">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Team 1" name="team1">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Team 2" name="team2">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Match Type" name="match_type">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Match Date" name="match_date">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Pay Type" name="pay_type">
        <input type="number" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Odd" name="odd">
        <div id = "extra_games"></div>
        <button type="button" class="button bg-primary p-4 text-white mt-2" id="add_game_button">Add Game</button>
        <button type="submit" class="button bg-primary p-4 text-white mt-2">Generate</button>
    </form>
</div>

<script>
    let num_games = 0, num_options = [0];
    let add_game_button = document.getElementById('add_game_button');
    function createExtraGameElement() {
        num_games++; num_options.push(0);
        let newGame = document.createElement('div');
        newGame.append(`extra game ${num_games}`);
        newGame.setAttribute('id', `extra_game${num_games}`);
        let newteam1Input = document.createElement('input');
        newteam1Input.setAttribute('class', 'block w-full p-2 dark:bg-darker mb-3');
        newteam1Input.setAttribute('placeholder', 'Team 1');
        newGame.appendChild(newteam1Input);
        let newteam2Input = document.createElement('input');
        newteam2Input.setAttribute('class', 'block w-full p-2 dark:bg-darker mb-3');
        newteam2Input.setAttribute('placeholder', 'Team 2');
        newGame.appendChild(newteam2Input);
        let addOptionButton = document.createElement('button');
        addOptionButton.setAttribute('type', 'button');
        addOptionButton.setAttribute('class', 'button bg-primary p-4 text-white mt-2');
        addOptionButton.append('AddOption');
        addOptionButton.addEventListener('click', function() {
            num_options[num_games] ++;
            let newOption = document.createElement('input');
            newOption.setAttribute('class', 'block w-full p-2 dark:bg-darker mb-3');
            newOption.setAttribute('placeholder', `NewOption ${num_options[num_games]}`);
            newGame.appendChild(newOption);
        });
        newGame.appendChild(addOptionButton);
        return newGame;
    }
    add_game_button.addEventListener('click', function() {
        let newGame = createExtraGameElement();
        document.getElementById('extra_games').append(newGame);
    })
</script>
@endsection
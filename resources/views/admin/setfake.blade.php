@extends('admin.layouts.app')

@section('content')
<div class="min-w-screen bg-gray-200 px-5 py-5 dark:bg-darker">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <span class="px-3 text-danger-light block">{{$error}}</span>
        @endforeach
    @endif
    <form action="" method='post'>
        @csrf
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Title" name="title">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Team 1" name="team1">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Team 2" name="team2">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Match Type" name="match_type">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Match Date" name="match_date">
        <input type="text" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Pay Type" name="pay_type">
        <input type="number" class="block w-full p-2 dark:bg-darker mb-3" placeholder="Gain" name="gain">
        <button type="submit" class="button bg-primary p-4 text-white mt-2">Generate</button>
    </form>
</div>
@endsection
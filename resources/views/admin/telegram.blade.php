@extends('admin.layouts.app')

@section('content')
<form method="post" class="p-4" >
    @csrf
    <p class="font-bold py-4">Edit Message Tempate</p>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <span class="px-3 text-danger-light">{{$error}}</span>
        @endforeach
    @endif
    <label for="message_title">Message Title</label>
    <input id="message_title" type="text" class="block w-full p-2 dark:bg-darker" name="message_title" value="{{$opt['message_title']}}">
    <label for="message_description">Message Description</label><small> (type $event$ where you want to display bet's event and type $odds$ to display odds.)</small>
    <input id="message_description" type="text" class="block w-full p-2 dark:bg-darker" name="message_description" value="{{$opt['message_description']}}">
    <label for="message_link">Message Link</label>
    <input id="message_link" type="text" class="block w-full p-2 dark:bg-darker" name="message_link_to" value="{{$opt['message_link_to']}}">
    <label for="message_link_text">Link Button Text</label>
    <input id="message_link_text" type="text" class="block w-full p-2 dark:bg-darker" name="message_link_text" value="{{$opt['message_link_text']}}">
    <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
</form>
@endsection
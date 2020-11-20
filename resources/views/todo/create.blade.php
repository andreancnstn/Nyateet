@extends('layouts.homeLayout')

@section('title')
    Create Todo
@endsection

@section('content')
<form action="{{ route('todo.store')}}" method="POST">
    @csrf
    <input class="" id="name" name="name" placeholder="activity name" required>
    <input type="date" class="" id="deadline" name="deadline" placeholder="deadline">
    <input class="" id="category" name="category" placeholder="category">
    <input class="" id="notes" name="notes" placeholder="notes">
    <input class="" id="isImportant" name="isImportant" placeholder="important" required>
    <button class="" type="submit">save</button>
</form>
@endsection
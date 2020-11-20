@extends('layouts.homeLayout')

@section('title')
    Create Todo
@endsection

@section('content')
<form action="{{ route('todo.store')}}" method="POST">
    @csrf

    <input class="" id="name" name="name" placeholder="activity name" required>

    <input type="date" class="" id="deadline" name="deadline" placeholder="deadline">

    <select name="category_id" id="category_id"  class="">
        <option value="" disabled selected>Select Category</option>
        @foreach($cats as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
        @endforeach 
    </select>

    <input class="" id="notes" name="notes" placeholder="notes"> <br>

    
    <label> Want to make this task important ?</label><br>
    <input type="radio" id="isImportantYes" name="isImportant" value="1">
    <label for="isImportantYes">Yes</label><br>
    <input type="radio" id="isImportantNo" name="isImportant" value="0">
    <label for="isImportantNo">No</label><br>

    <button class="" type="submit">save</button>
</form>
@endsection
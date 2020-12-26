@extends('layouts.homeLayout')

@section('title')
    Create Todo
@endsection

@section('content')
<form action="{{ route('todo.store')}}" method="POST">
    @csrf
    <div class="col=md-12">
        <h1 class="pt-2 pb-3">Create Task / Activities</h1>
        <hr>
        <div class="form-group d-flex">
            <label class="control-label col-2 pt-2">Task / Activity Name</label><span class="pt-2">&nbsp;&nbsp;&nbsp;:&nbsp;</span>
            <div class="col-10">
                <input class="form-control" id="name" name="name" placeholder="activity name" required>
            </div>
        </div>

        <div class="form-group d-flex">
            <label class="control-label col-2 pt-2">Deadline</label><span class="pt-2">&nbsp;&nbsp;&nbsp;:&nbsp;</span>
            <div class="col-10">
                <input type="date" class="form-control" id="deadline" name="deadline" placeholder="deadline">
            </div>
        </div>

        <div class="form-group d-flex">
            <label class="control-label col-2 pt-2">Category</label><span class="pt-2">&nbsp;&nbsp;&nbsp;:&nbsp;</span>
            <div class="col-10">
                <select name="category_id" id="category_id"  class="custom-select">
                    <option value="" disabled selected>Select Category</option>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="form-group d-flex">
            <label class="control-label col-2 pt-2">Notes</label><span class="pt-2">&nbsp;&nbsp;&nbsp;:&nbsp;</span>
            <div class="col-10">
                <input class="form-control" id="notes" name="notes" placeholder="Notes">
            </div>
        </div>

        <div class="form-group d-flex">
            <label class="control-label col-3 pt-2">Want to make this task important ?</label>
            <div class="col-10 d-flex pt-2">
                <div class="col-1">
                    <input type="radio" id="isImportantYes" name="isImportant" value="1">
                    <label for="isImportantYes">Yes</label>
                </div>
                <div class="col-1">
                    <input type="radio" id="isImportantNo" name="isImportant" value="0">
                    <label for="isImportantNo">No</label>
                </div>
            </div>
        </div>

        <div class="btn">
            <button type="submit" id="savebtn" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>
@endsection
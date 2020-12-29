<?php

namespace App\Http\Controllers;

use App\Category;
use App\Status;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todayIndex()
    {
        // $todo = $data->where('isStart', '=', false);
        // $inprog = $data->where('isStart', '=', true);       // tiga ini adalah logic buat page today
        // $finish = $data->where('isFinished', '=', true);

        $todos = Todo::all()->where('user_id', auth()->user()->id);
        // $todos = Todo::where('deadline', date("Y-m-d"))->get();
        $todo = $todos->where('isStart', 0)->where('isFinished', 0);
        $inprog = $todos->where('isStart', 1)->where('isFinished', 0);
        $finish = $todos->where('isStart', 0)->where('isFinished', 1);
        $cats = Category::all();

        // dd($todos, $todo, $inprog, $finish);

        return view('todo.today', compact('todos', 'todo', 'inprog', 'finish', 'cats'));
    }

    public function activeIndex()
    {
        $todos = Status::where('name', '=', 'Active')->first()->stattodos->where('user_id', auth()->user()->id);
        $cats = Category::all();

        return view('todo.active', compact('todos', 'cats'));
    }

    public function historyIndex()
    {
        $todos = Status::where('name', '=', 'History')->first()->stattodos->where('user_id', auth()->user()->id);
        $cats = Category::all();

        return view('todo.history', compact('todos', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('todo.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'category_id' => 'nullable',
            'deadline' => 'nullable|date',
            'isImportant' => 'required',
            'notes' => 'nullable'
        ]);

        Todo::create(array_merge(
            $data,
            ['user_id' => auth()->user()->id],
        ));

        return redirect()->route('todo.todayIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        $cats = Category::all();

        return view('todo.detail', compact('todo', 'cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        $cats = Category::all();
        return view('todo.edit', compact('todo','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo = Todo::findOrFail($request->id);

        $data = $this->validate($request, [
            'name' => 'required',
            'category_id' => 'nullable',
            'deadline' => 'nullable|date',
            'isImportant' => 'required',
            'notes' => 'nullable'
        ]);

        $todo->update(array_merge(
            $data
        ));

        return redirect()->route('todo.todayIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::findorFail($id)->delete();

        return redirect()->route('todo.todayIndex');
    }

    public function start(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $todo->update([
            'isStart' => 1,
        ]);

        return redirect()->route('todo.todayIndex');
    }

    public function finish($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->update([
            'isStart' => 0,
            'isFinished' => 1,
            'status_id' => 2
        ]);

        return redirect()->route('todo.todayIndex');
    }

    public function search(Request $request)
    {
        $todo = Todo::where('name', 'LIKE', '%'.$request->search.'%')->where('user_id', auth()->user()->id)->get();
        $cats = Category::all();

        return view('todo.search', compact('todo', 'cats'));
    }

    // PART OF AJAX DOCUM DO NOT DELETE
    // public function ajaxReq(Request $request) 
    // {
    //     $id = $request->get('id');
    //     $data = Todo::findOrFail($id);
    //     return $data;
    // }

    // public function getCatName(Request $request)
    // {
    //     $cat_id = $request->get('cat_id');
    //     $data = Category::findOrFail($cat_id);
    //     return $data;
    // }
}

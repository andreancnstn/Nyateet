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

        $todos = Todo::where('deadline', date("Y-m-d"))->get();

        // dd($todos);

        return view('todo.today', compact('todos'));
    }

    public function activeIndex()
    {
        $stats = Status::where('name', '=', 'Active')->first();

        return view('todo.active', compact('stats'));
    }

    public function historyIndex()
    {
        $stats = Status::where('name', '=', 'History')->first();

        return view('todo.history', compact('stats'));
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
}

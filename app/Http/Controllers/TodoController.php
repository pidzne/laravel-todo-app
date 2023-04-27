<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoLists = Todo::all();
        return view('todo.index')->with('todoLists', $todoLists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todoLists = new Todo();
        $todoLists->todo_title = $request->t_title;
        $todoLists->todo_content = $request->t_content;
        // dd($todo);
        $todoLists->save();
        return redirect()->route('todos.index')->with('msgSuccess', 'Thêm mới Todo thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todoLists = Todo::where('id', $id)->get();
        return view('todo.partials.show')->with('todoLists', $todoLists);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todoLists = Todo::findOrFail($id);
        return view('todo.partials.edit')->with('todoLists', $todoLists);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todoLists = Todo::findOrFail($id);
        $todoLists->todo_title = $request->t_title;
        $todoLists->todo_content = $request->t_content;
        $todoLists->save();
        return redirect()->route('todos.index')->with('msgSuccess', 'Cập nhật Todo thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todos.index')->with('msgSuccess', 'Xóa Todo thành công!');
    }

    public function trash() {
        $todoDeletes = Todo::onlyTrashed()->get();
        // dd($todoDeletes);
        return view('todo.partials.trash')->with('todoDeletes', $todoDeletes);
    }

    public function restoreOne($id) 
    {
        $todoDeletes = Todo::withTrashed()->where('id', $id);
        $todoDeletes->restore();
        return redirect()->route('todos.trash')->with('msgSuccess', 'Khôi phục Todo bị xóa thành công!');
    }

    public function restoreAll() 
    {
        $todoRestores = Todo::onlyTrashed();
        $todoRestores->restore();
        return redirect()->route('todos.trash')->with('msgSuccess', 'Khôi phục tất cả Todo bị xóa thành công!');
    }

    public function removeOne($id) 
    {
        $todoRemoves = Todo::withTrashed()->where('id', $id);
        $todoRemoves->forceDelete();
        return redirect()->route('todos.trash')->with('msgSuccess', 'Xóa vĩnh viễn Todo thành công!');
    }

    public function removeAll() 
    {
        $todoRemoves = Todo::onlyTrashed();
        $todoRemoves->forceDelete();
        return redirect()->route('todos.trash')->with('msgSuccess', 'Xóa vĩnh viễn tất cả Todo thành công!');
    }

    public function search(Request $request) 
    {
        $query = $request->input('search');
        $results = Todo::where('todo_title', 'LIKE', '%' . $query . '%')->orWhere('todo_content', 'LIKE', '%' . $query . '%')->get();
        return view('todo.partials.search')->with('results', $results);
    }
}

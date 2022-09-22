<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index() {
        $lists = TodoList::all();

        return view('index', compact('lists'));
    }

    public function store(Request $request) {
        $table = new TodoList();
        $table->list = $request->list;
        $table->status = $request->status;
        $table->save();

        return redirect()->route('todo.index');
    }

    public function edit($id) {
        $list = TodoList::find($id);
        return view('edit', compact('list'));
    }

    public function update(Request $request, $id) {
        $list = TodoList::find($id);
        $list->list = $request->list;
        $list->status = $request->status;
        $list->update();

        return redirect()->route('todo.index')->with('status', 'Updated');
    }

    public function destroy($id) {
        $list = TodoList::find($id);
        $list->delete();

        return redirect()->route('todo.index')->with('status', 'Deleted');
    }

    public function check($id) {
        $list = TodoList::find($id);
        $list->status = '0';
        $list->update();

        return redirect()->route('todo.index');
    }

    public function uncheck($id) {
        $list = TodoList::find($id);
        $list->status = '1';
        $list->update();

        return redirect()->route('todo.index');
    }
}

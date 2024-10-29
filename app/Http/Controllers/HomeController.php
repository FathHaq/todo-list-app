<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $todoLists = TodoList::where('user_id', $userId)->orderBy('is_done', 'asc')->get();
        return view('pages.home', compact('todoLists'));
    }

    public function todoStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $userId = Auth::user()->id;
        TodoList::create([
            'title' => $request->title,
            'user_id' => $userId,
        ]);

        return back();
    }

    public function todoUpdateStatus($id)
    {
        $todoList = TodoList::find($id);
        $todoList->is_done = !$todoList->is_done;
        $todoList->save();

        return back();
    }

    public function todoDelete($id)
    {
        $todoList = TodoList::find($id);
        $todoList->delete();

        return back();
    }
}

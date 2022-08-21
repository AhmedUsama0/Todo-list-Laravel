<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {

        //the same code for post and get request
        $user = auth()->user()->name;
        $tasks = Task::where('name', $user)->get();
        return view('pages/index', ['tasks' => $tasks]);
    }



    public function store(Request $request)
    {

        $inputs = $request->input(); //we can use all method too

        if ($request->isMethod('post')) {


            //if any field is empty the validate method flashes the input fields errors to a seesion and redirect the user to the same page and we can access this errors in view using
            //@error directive
            //it also flashs the old input so we can access it from old method
            $request->validate([
                'task' => 'required',
                'type' => 'required',
            ]);

            Task::create([
                'task' => $inputs['task'],
                'type' => $inputs['type'],
                'name' => Auth::user()->name
            ]);

            return back()->with('success', 'Task added Sucessfully!');
        } else if ($request->isMethod('get')) {

            return view('pages/create');
        }
    }



    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('show-tasks');
    }
}

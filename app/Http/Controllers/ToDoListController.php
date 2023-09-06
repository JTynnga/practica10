<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use App\Http\Requests\StoreToDoListRequest;
use App\Http\Requests\UpdateToDoListRequest;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = ToDoList::where('state', '=', 1)->get();
        return view('todolist', compact(array('tasks')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'newTask' => ['required', 'string', 'max:255'],
        ]);

        $newList = new ToDoList();
        $newList->task = $request->newTask;
        $newList->status = 1;
        $newList->state = 1;
        $newList->save();
        // return "nueva task";
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        // $request->validate([
        //     'status' => ['required', 'string'],
        // ]);
        if (ToDoList::find($id) != null) {
            $updateToDoList = ToDoList::find($id);

            if ($updateToDoList->status == 1) {
                $updateToDoList->status = 2;
            }elseif ($updateToDoList->status == 2) {
                $updateToDoList->status = 1;
            } else {
                return "'status' solo acepta los valores 2 o 1.\n 'status' sin modificaciones.\n";
            }
            $updateToDoList->save();
            // return "Trabajador Actualizado Correctamente.";
            return redirect('/');
        } else {
            return "No existe un Trabajador con ese Id o esta desactivado.";
        }
    }

    /**
     * Change state to 0.
     */
    public function delete($id)
    {
        $num = $id;
        $deleteTrabajador = ToDoList::find($id);
        if ($deleteTrabajador == null) {
            return "No existe el Trabajador N° " . $num . ".";
        }
        $deleteTrabajador->state = 0;
        $deleteTrabajador->save();
        // return "El Trabajador N° " . $num . " ha sido eliminado.";
        return redirect('/');
    }
}
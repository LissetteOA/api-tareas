<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Tag;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request)
    {
        $datos = $request->validated();

        $task = $request->user()->tasks()->create($datos);

        return response()->json([
            'message' => 'Tarea creada correctamente',
            'task' => $task,
        ], 201);
    }
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks;

        return response()->json([
        'tasks' => $tasks
        ]);
    }
    public function show(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return response()->json([
            'message' => 'No tienes permiso para ver esta tarea'
            ], 403);
            }

        return response()->json([
            'task' => $task
        ]);
    }
    public function update(UpdateTaskRequest $request, Task $task)
    {
       if ($task->user_id !== $request->user()->id) {
            return response()->json([
            'message' => 'No tienes permiso para modificar esta tarea'
            ], 403);
        } 
        $datos = $request->validated();

        $task->update($datos);

        return response()->json([
        'message' => 'Tarea actualizada correctamente',
        'task' => $task,
        ]);
    }
    public function destroy(Request $request, Task $task)
    {
      if ($task->user_id !== $request->user()->id) {
        return response()->json([
            'message' => 'No tienes permiso para eliminar esta tarea'
        ], 403);
     }  
        $task->delete();

    return response()->json([
        'message' => 'Tarea eliminada correctamente',
        ]);
    }
    public function assignTags(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return response()->json([
            'message' => 'No tienes permiso para modificar esta tarea'
            ]  , 403);
        }

        $datos = $request->validate([
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $task->tags()->sync($datos['tags']);

        return response()->json([
        'message' => 'Tags asignados correctamente',
        'task' => $task->load('tags')
        ]);
    }
    public function removeTag(Request $request, Task $task, Tag $tag)
    {
        if ($task->user_id !== $request->user()->id) {
            return response()->json([
            'message' => 'No tienes permiso para modificar esta tarea'
            ], 403);
        }

        $task->tags()->detach($tag->id);

        return response()->json([
        'message' => 'Tag eliminado de la tarea correctamente',
        'task' => $task->load('tags')
    ]);
    }
}
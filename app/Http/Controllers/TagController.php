<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return response()->json([
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'color' => 'required|string|max:7'
        ]);

        $tag = Tag::create($datos);

        return response()->json([
            'message' => 'Tag creado correctamente',
            'tag' => $tag
        ], 201);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'message' => 'Tag eliminado correctamente'
        ]);
    }
}
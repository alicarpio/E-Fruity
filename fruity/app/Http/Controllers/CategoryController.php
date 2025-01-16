<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();

            return response()->json([
                'success' => true,
                'data' => $categories
            ], 200);
        } catch (Exception $e) {
            Log::error('Error en index(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las categorías'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:50|unique:categories',
            ]);

            $category = Category::create($validated);

            return response()->json([
                'message' => 'Categoría creada exitosamente!',
                'data' => $category
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Error de validación en store(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            Log::error('Error en store(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al crear la categoría'

            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $category
            ], 200);
        } catch (ModelNotFoundException $e) {
            Log::warning('Categoría no encontrada en show(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Categoría no encontrada'
            ], 404);
        } catch (Exception $e) {
            Log::error('Error en show(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar la categoría'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Categoría eliminada exitosamente',
            ], 200);
        } catch (ModelNotFoundException $e) {
            Log::warning('Categoría no encontrada en destroy(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Categoría no encontrada'
            ], 404);
        } catch (Exception $e) {
            Log::error('Error en destroy(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la categoría'
            ], 500);
        }
    }
}

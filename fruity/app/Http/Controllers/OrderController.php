<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // get all
    {
        try {
            $orders = Order::all();

            return response()->json([
                'success' => true,
                'data' => $orders
            ], 200);
        } catch (Exception $e) {
            Log::error('Error en index(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las órdenes'
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
                'order_date' => 'required|date|unique:categories',
                'order_status' => 'required|string', // poner las categorías
                'order_total' =>'required|double'
            ]);

            $order = Order::create($validated);

            return response()->json([
                'message' => 'Orden creada correctamente!',
                'data' => $order
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
                'message' => 'Error al guardar la orden'

            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $order = Order::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $order
            ], 200);
        } catch (ModelNotFoundException $e) {
            Log::warning('Orden no encontrada en show(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Orden no encontrada'
            ], 404);
        } catch (Exception $e) {
            Log::error('Error en show(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar la orden'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orderDetails = OrderDetail::all();

            return response()->json([
                'success' => true,
                'data' => $orderDetails
            ], 200);
        } catch (Exception $e) {
            Log::error('Error en index(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el detalle de la orden'
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
                'quantity'=>'required|integer',
                'unit_price'=>'required|double',
                'subtotal'=>'required|double'
            ]);

            $orderDetail = OrderDetail::create($validated);

            return response()->json([
                'message' => 'Detalle de la orden creada correctamente!',
                'data' => $orderDetail
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
                'message' => 'Error al guardar el detalle de la orden'

            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $orderDetail = OrderDetail::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $orderDetail
            ], 200);
        } catch (ModelNotFoundException $e) {
            Log::warning('Orden Detallado no encontrada en show(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Orden Detallado no encontrada'
            ], 404);
        } catch (Exception $e) {
            Log::error('Error en show(): ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al mostrar la orden detallada'
            ], 500);
        }
    }
}

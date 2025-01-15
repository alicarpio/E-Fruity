<?php

    namespace App\Http\Controllers;

    use App\Models\Fruit;
    use Illuminate\Http\Request;

    class FruitController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $fruits = Fruit::all();

            return response()->json([
                'success' => true,
                'data' => $fruits
            ], 200);
        }


        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:50|unique:fruits',
                'url_image' => 'required|string',
                'description' => 'required|string|max:150',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
            ]);

            Fruit::create($validated);

            return response()->json(['message' => 'Fruit created successfully!'], 201);

        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $fruit = Fruit::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $fruit
            ], 200);
        }



        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:50|unique:fruits',
                'url_image' => 'required|string',
                'description' => 'required|string|max:150',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
            ]);

            $fruit = Fruit::findOrFail($id);

            $fruit->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Fruta actualizada exitosamente',
                'data' => $fruit
            ], 200);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $fruit = Fruit::findOrFail($id);

            $fruit->delete();

            return response()->json([
                'success' => true,
                'message' => 'Fruta eliminada exitosamente',
                'data' => $fruit
            ], 200);
        }
    }

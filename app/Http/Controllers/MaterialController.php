<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\MaterialProduct;
use App\Models\MaterialType;
use App\Models\Unit;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        foreach ($materials as $material) {
            $total = MaterialProduct::where('product_id', $material->id)->sum('quantity');
            $material->total = $total;
        }
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $units = Unit::all();
        $types = MaterialType::all();
        return view('materials.create', compact('units', 'types'));
    }

    public function store(MaterialRequest $request) {
        Material::create($request->validated());
        return redirect()->route('materials.index');
    }

    public function edit(Material $material)
    {
        $units = Unit::all();
        $types = MaterialType::all();
        return view('materials.edit', compact('material','units', 'types'));
    }

    public function update(MaterialRequest $request, Material $material)
    {
        $material->update($request->validated());
        return redirect()->route('materials.index');
    }
    public function show(Material $material)
    {

        $products = $material->materialProducts()
            ->with('product')
            ->get();

        return view('materials.show', compact('material', 'products'));
    }

}

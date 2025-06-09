<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class FancController extends Controller
{
    public function calculate(ProductType $productType, MaterialType $materialType, int $availableMaterial, float $p1, float $p2): int {
        try {
            if ($availableMaterial <= 0 || $p1 <= 0 || $p2 <= 0) {
                return -1;
            }
            $productType = ProductType::findOrFail($productTypeId);
            $materialType = MaterialType::findOrFail($materialTypeId);

            //Расчет сырья необходимый на один продукт
            $rawPerProduct = $p1 * $p2 * $productType->coefficient;

            // Учет потерь материала
            $pPercent = $materialType->percent;
            $rawWithPercent = $rawPerProduct * (1 + $pPercent / 100);

            // Вычисление max кол-во продукции
            $productionCount = floor($availableMaterial / $rawWithPercent);

            return $productionCount >= 0 ? (int)$productionCount : 0;

        } catch (\Exception $e) {
            return -1;
        }
    }

}

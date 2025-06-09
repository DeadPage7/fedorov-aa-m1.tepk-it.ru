<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FancController extends Controller
{
    public function calculate(ProductType $productType, MaterialType $materialType, int $availableMaterial, float $param1, float $param2): int {
        try {
            if ($availableMaterial <= 0 || $param1 <= 0 || $param2 <= 0) {
                return -1;
            }
            $productType = ProductType::findOrFail($productTypeId);
            $materialType = MaterialType::findOrFail($materialTypeId);

            // Расчёт необходимого сырья на одну единицу продукции
            $rawPerProduct = $param1 * $param2 * $productType->coefficient;

            // Учет потерь материала
            $lossPercent = $materialType->loss;
            $rawWithLoss = $rawPerProduct * (1 + $lossPercent / 100);

            // Вычисляем максимальное количество продукции
            $productionCount = floor($availableMaterial / $rawWithLoss);

            return $productionCount >= 0 ? (int)$productionCount : 0;

        } catch (\Exception $e) {
            return -1;
        }
    }

}

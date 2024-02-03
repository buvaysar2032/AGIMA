<?php

$shoppingCart = [
    ['product' => 'Телефон', 'price' => 1200],
    ['product' => 'Наушники', 'price' => 800],
    ['product' => 'Ноутбук', 'price' => 1500],
    ['product' => 'обувь', 'price' => 500],
    // Добавьте другие товары по вашему усмотрению
];

function calculateTotalPrice($shoppingCart)
{
    $totalPrice = 0;

    foreach ($shoppingCart as $item) {
        $totalPrice += $item['price'];
    }

    if ($totalPrice > 1000) {
        $totalPrice = $totalPrice * 0.9; // Применяем скидку 10%
    }

    if (count($shoppingCart) > 3) {
        $totalPrice = $totalPrice * 0.95; // Применяем скидку 5%
    }

    return $totalPrice;
}

$totalPrice  = calculateTotalPrice($shoppingCart);
echo "Общая стоимость с учетом скидки: $totalPrice рублей";

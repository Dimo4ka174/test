<?php
//Создаем 4 продукта
$products = [
    new Product('Apple', 'Fruit', 150);
    new Product('Orange', 'Fruit', 250);
    new Product('Blueberry', 'Berry', 350);
    new Product('Pumpkin', 'Vegetable', 200);
]
?>

<div class="catalog">
    <?php foreach($products as $product):?>
        <div class='product'>
        <h3>
            <?=$product->name?>
        </h3>
        <p>
            <?=$product->type?>
        </p>
        <p>
            <?=$product->price?>
        </p>
        </div>
    <?php endforeach;?>
</div>
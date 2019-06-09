<?php


class ProductFactory
{
public function create(Product $product, $avatar)
{
$productArray = [
'title' => $product->getTitle(),
'price' => $product->getPrice(),
'category_id' => $product->getCategory(),
'description' => $product->getDescription(),
'avatar' => $avatar,
];

return $productArray;
}
}
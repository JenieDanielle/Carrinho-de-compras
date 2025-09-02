<?php
require_once "shoppingCart.php";

$loja = new CartGenerator();
$loja->addToCart(1, 2); // adiciona item
$loja->addToCart(2, 6); // tenta adicionar mais do que o estoque da calça jeans
$loja->addToCart(3, 2); // adiciona normalmente o tênis
$loja->removeProducts(3); // remove o tênis do carrinho

print_r($loja->getCart());

//tirar esse dps
print_r($loja->getProducts());


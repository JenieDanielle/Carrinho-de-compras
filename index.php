<?php
require_once "CartGenerator.php";

$loja = new CartGenerator();
print_r($loja->getCart());

$loja->addToCart(1, 2); // adiciona item
$loja->addToCart(2, 6); // tenta adicionar mais do que o estoque da calça jeans
$loja->addToCart(3, 2); // adiciona normalmente o tênis
$loja->addToCart(4, 2); // adiciona normalmente o tênis
$loja->removeProducts(3); // remove o tênis do carrinho
$loja->removeProducts(4); // remove o tênis do carrinho

print_r($loja->getCart("DESCONTO10")); // cupom de desconto de 10% aplicado

//tirar esse dps
// print_r($loja->getProducts());


<?php

class CartGenerator
{
    private array $products;
    private array $cart;

    public function __construct()
    {
        $this->products = [
            ['id' => 1, 'name' => 'Camiseta', 'price' => 59.90, 'stock' => 10],
            ['id' => 2, 'name' => 'Calça Jeans', 'price' => 129.90, 'stock' => 5],
            ['id' => 3, 'name' => 'Tênis', 'price' => 199.90, 'stock' => 3]
        ];

        $this->cart = [];
    }

    public function findProduct($id)
    {
        foreach ($this->products as $key => $product) {
            if ($product['id'] == $id) {
                return $key;
            }
        }

        return null;
    }

    public function addToCart($productId, $quantity)
    {
        $key = $this->findProduct($productId);

        if ($key !== null) {
            $product = $this->products[$key];

            if ($product['stock'] >= $quantity) {
                $subtotal = $product['price'] * $quantity;
                $this->cart[] = ['id' => $productId, 'name' => $product['name'], 'quantity' => $quantity, 'subtotal' => $subtotal];
                $this->products[$key]['stock'] -= $quantity;
            } else {
                echo "Produto {$product['name']} não adicionado. O estoque é de {$product['stock']} unidades. <br>";
            }
        } else {
            echo "Produto não encontrado...<br>";
        }
    }

    public function sumTotal()
    {
        $total = 0;

        if (empty($this->cart)) {
            echo "O carrinho está vazio<br>";
            return 0;
        }

        foreach ($this->cart as $product) {
            $total += $product['subtotal'];
        }

        return $total;
    }


    public function getCart()
    {
        if (!empty($cart)) {
            echo "<p>O carrinho de compras está vazio... <br></p>";
        } else {
            echo "<p><b>Carrinho de Compras: </b></p>";
            foreach ($this->cart as $product) {
                echo "<p>- {$product['quantity']} {$product['name']} <br>R$ {$product['subtotal']}<br></p>";
            }
            echo "<p><b>Total:</b> R$ {$this->sumTotal()}<br></p>";
        }

        // return $this->cart; // mostra o array do carrinho
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function removeProducts($productId)
    {
        foreach ($this->cart as $cartKey => $cartItem) {
            $Key = $this->findProduct($productId);

            if ($Key !== null) {
                if ($cartItem['id'] == $productId) {
                    unset($this->cart[$cartKey]);
                    $this->cart = array_values($this->cart);
                    $this->products[$Key]['stock'] += $cartItem['quantity'];

                    echo "Produto {$cartItem['name']} removido do carrinho e devolvido ao estoque.<br>";
                }
            } else {
                echo "Produto não existe dentro do carrinho. <br>";
            }
        }
    }
}

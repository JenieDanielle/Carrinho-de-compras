# Carrinho de compras em PHP
Este projeto é um exemplo simples de **Carrinho de Compras** feito em PHP, que permite:
- Adicionar produtos
- Controlar o estoque
- Calcular o total do carrinho. 

O código segue as boas práticas: **PSR-12, KISS e DRY**.

---

## Funcionalidades

- Listagem de produtos com **id, nome, preço e estoque**.
- Adição de produtos ao carrinho, respeitando o estoque disponível.
- Cálculo automático do **subtotal** de cada item e do **total** do carrinho.
- Mensagem de aviso caso o estoque seja insuficiente.
- Visualização do carrinho de compras e total.

---

## Como Usar

1. Certifique-se de ter um servidor local como **XAMPP** ou **MAMP** rodando PHP.  
2. Coloque a pasta `carrinho_de_compras` dentro do diretório `htdocs` (XAMPP) ou equivalente.  
3. Abra o navegador e acesse:
http://localhost/carrinho_de_compras/index.php
4. No arquivo `index.php`, você pode adicionar produtos ao carrinho

---

## Exemplos de Uso

No arquivo `index.php`, você pode adicionar produtos ao carrinho usando:

```php
require_once "shoppingCart.php";

$loja = new CartGenerator();

// Adiciona 2 camisetas
$loja->addToCart(1, 2);

// Tenta adicionar 6 calças jeans (mais do que o estoque)
$loja->addToCart(2, 6);

// Adiciona 2 tênis
$loja->addToCart(3, 2);

// Mostrar o carrinho
$loja->getCart();

// Mostrar produtos e estoque
print_r($loja->getProducts());
Exemplo de saída:
```

Exemplo de saída:
```php
Carrinho de Compras:
- 2 Camisetas: R$ 119,80
- 2 Tênis: R$ 399,80
Total: R$ 519,60

Aviso: Produto Calça Jeans não adicionado. O estoque é de 5 unidades.
```

### Observações

- Cada produto é representado como um array com id, name, price e stock.
- O carrinho é um array com id, name, quantity e subtotal.
- O método sumTotal() retorna o total do carrinho, mostrando mensagem se o carrinho estiver vazio.
- Segue as boas práticas de código PSR-12, evitando repetição e mantendo clareza (KISS e DRY).

*Feito pelas alunas 
Jênie Danielle Fedel Teixeira RA: 1993310
Simone Siqueira de Melo RA: 2001915*

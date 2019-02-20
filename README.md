# Project Title

Exercicio

Descrição

Uma livraria vende 3 tipos de livros. Livros usados, livros novos e livros exclusivos.
Os livros exclusivos não têm desconto. Os livros novos têm desconto de 10% e os usados de 25%.
Um livro tem as seguintes propriedades:

* titulo - string
* autores - lista de autores
* ISBN - identificador unico do livro
* preço - float com 2 casas decimais

Um livro deve responder a todas as suas propriedades e quando pedido um preço, deve responder com o
preço já com o desconto aplicado.

Os livros podem ser adicionados a um cesto (basket).
Um cesto deve responder a 2 perguntas:

* Quantos livros tem no cesto?
* Qual o total a pagar com duas casas decimais?

Deve ser possivel importar um csv com um cesto. A primeira linha tem os headers e depois está um livro
por linha.

## How to run

cmd : php print_basket.php
cmd : php print_basket.php file 
cmd : php print_basket.php file -displayauthors
cmd : php print_basket.php file -displayauthors > output.txt

## Authors

* **Fábio Martins** - [papoon](https://github.com/papoon)


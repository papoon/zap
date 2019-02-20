# Book Store

##Descrição

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
Os autores estão separados pelo caracter | (barra vertical).

#Indicações

* 1. Um programa que aplique os conceitos DRY e use os principios de OOP. Classes para os diferentes
tipos de livros e para o carrinho. Cada livro deverá ser uma instancia da respetiva classe.
* 2. Usar polimorfismo
* 3. Programar em inglês

#Bônus

Conjunto de funcionalidades extra, opcionais ao exercicio:

* (I) um programa que aceite como parametro o nome de um ficheiro csv com o carrinho.
* (II) aceitar um parametro adicional (-displayauthors) que em vez de adicionar ao carrinho imprima
apenas o preço/preço com o desconto aplicado, o título e os autores dos livros.
* (III) um programa com unit testing.
* (|V) Fazer um Webservice REST numa framework MVC à escolha, com os endpoints (não é
necessário persistir dados para um base de dados):
** Adicionar livro ao carrinho
** Obter o carrinho
* (VI)Imprimir um basket com produtos agregados e quantidade.
* (VI) não usar ifs.

## How to run

```
cmd : php print_basket.php

cmd : php print_basket.php file 

cmd : php print_basket.php file -displayauthors

cmd : php print_basket.php file -displayauthors > output.txt

```

## Authors

* **Fábio Martins** - [papoon](https://github.com/papoon)


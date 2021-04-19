# README

### Installation

1. Launch Docker

<code>$ make up</code>

2. Deploy application

<code>$ make install</code>

3. Launch tests

<code>$ make ci</code>

### Interrogations

- Pourquoi vouloir faire un value object avec un article qui ne comporte que des attributs mutables en dehors de la date
  de création? Pour de la gestion de version? Je l'ai lié avec l'entité pour lui donner une identité propre mais je ne
  sais pas si c'était l'implementation attendue.

- Dans le code fourni il y a

       Assert::true($isValid, 'INVALID TYPE');

Je n'ai pas compris de quelle librairie ça provenait (le plus proche étant un appel static à une méthode PHPUnit), ni le
comportement (exception?), la signature de la méthode ne m'indiquant rien de plus j'ai préféré commenter.




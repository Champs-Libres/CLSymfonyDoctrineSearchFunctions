CLSymfonyDoctrineSearchFunctions
==============================

Symfony bundle which provide functions for fuzzy search against postgresql database.


Installation
============


1. Postgresql
-------------

Enable Fuzzy Search function in postgresql :

For double metaphone

```sql
CREATE EXTENSION fuzzystrmatch;
```
References (postgresql 9.1) : http://www.postgresql.org/docs/9.1/static/fuzzystrmatch.html

For tri-grams :
```sql
CREATE EXTENSION pg_trgm;
```
References (postgresql 9.1) : http://www.postgresql.org/docs/9.1/interactive/pgtrgm.html

2. Config.yml
-------------

Register the DQL function in config.yml :

```yaml
    orm:
        # (...)
        dql:
            string_functions:
                doublemetaphone: CL\CLSymfonyDoctrineSearchFunctionsBundle\DQL\DoubleMetaphoneFunction
```


Usage
======

```php

$q = "Name to search";

$dql = "SELECT p from MyBundle:Person p 
    WHERE DOUBLEMETAPHONE(p.name) = DOUBLEMETAPHONE(:q)"

$persons = $em->createQuery($dql)
                ->setParameter('q', $q);
                ->getResult();

```

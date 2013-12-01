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



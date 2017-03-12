[![Build Status](https://travis-ci.org/c4rl/vindaloo.svg?branch=master)](https://travis-ci.org/c4rl/vindaloo)

# Currying and partial application in PHP 7

Helpers are provided to curry and partially apply arguments to closures.

## Motivation

1. Functional patterns are helpful and interesting.
2. PHP 7 offers new features that make currying and partial application easier.
3. While some existing PHP libraries exist that claim to address partial
application and/or currying are just doing partial application and aren't using
the PHP 7 hotness.

## Helpers

### `curry(Closure $closure)`

Curries the given closure, left-precedent arguments.

### `curry_right(Closure $closure)`

Curries the given closure, right-precedent arguments.

### `bind(Closure $closure, ...$args)`

Partially applies arguments to the given closure, left-precedent arguments.

### `bind_right(Closure $closure, ...$args)`

Partially applies arguments to the given closure, right-precedent arguments.

## @todo

* Some examples in this readme pls
* bind_args with placeholders

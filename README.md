# Core


## Installation 
```
composer require nemundo/core
```

### Dev Installation
```
git submodule add https://github.com/nemundo/core.git lib/core
```

```
$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/core/src/';
$lib->namespace = 'Nemundo\\Core';
```

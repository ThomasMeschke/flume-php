# Flume - Filter Logic Unification &amp; Mapping Engine
## Compose Logic - let it flow.

### 💡 What is Flume?

Flume is a universal framework to define, combine and interpret filter logic.
Write your filter once, use it everywhere: in SQL, JSON, APIs or custom evaluators.

The Core of Flume are the easy to grasp logical components (e.g. AndFilter, OrFilter, EqualityFilter, GreaterThanFilter and more) you can combine as you like and interpret as you like using custom compilers.

### 🧱 Example Setup

Simple setup in PHP:

```php
// e.g. a filter representing (age > 18) AND (country = 'US')

$filter = new AndFilter([
    new GreaterThanFilter('age', 18),
    new EqualsFilter('country', 'DE')
]);

// used with the SQL Filter Expression Compiler:
$compiler = new SqlFilterExpressionCompiler();
$sql = $compiler->compile($filter);

echo $sql;
// => "(age > 18) AND (country = 'DE')"
```

### Installation

#### Via Composer
```bash
composer require flume/flume-php
```


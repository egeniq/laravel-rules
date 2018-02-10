# laravel-rules
Helper function to simplify defining validation rules of mixed types

The helper enables you to use mixed format when defining validation rules in a controller.
This is especially helpful when you want to add a custom rule to a list of rules that are in the string format.

```php
// Before
$validation = validator($data, [
    'id' => 'required|integer',
    'amount' => [
        'required', 
        'integer', 
        new MyCustomRule()
    ],
]);

// After
$validation = validator($data, [
    'id' => 'required|integer',
    'amount' => rules('required|integer', new MyCustomRule()),
]);
```

## Installation

```
composer require egeniq/laravel-rules
```

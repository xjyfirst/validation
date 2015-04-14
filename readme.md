### Installation

Use Laravel 5 validation as a standalone component

```
$ composer require txthinking/validation
```

### Usage

```
<?php
use Tx\Validation;

$validation = new Validation();
$validator = $validation->getValidator();

$validator = $validator->make(
    ['name' => 'Day'],
    ['name' => 'required|min:5'],
    ['name.min' => 'name is too short']
);
if ($validator->fails()){
    var_dump($validator->messages());
}
```

### Documentation

http://laravel.com/docs/5.0/validation

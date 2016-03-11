### Installation

Use Laravel 5 validation as a standalone component

```
$ composer require txthinking/validation
```

### Usage

```
<?php
use Tx\Validator;

$v = Validator::make(
    ['name' => 'Day007'],
    ['name' => 'required|max:5'],
    ['name.max' => 'who are u 007']
);
if ($v->fails()){
    var_dump($v->messages());
}
```

### Documentation

http://laravel.com/docs/5.2/validation

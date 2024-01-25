<?php

namespace App\Exceptions;

use Exception;

class MyException extends Exception
{
    public function context()
    {
        return ['data' => 'Данные'];
    }
    public function render()
    {
        return view('welcome');
    }
}

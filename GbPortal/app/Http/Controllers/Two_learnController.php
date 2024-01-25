<?php

namespace App\Http\Controllers;

use App\Exceptions\MyException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Two_learnController extends Controller
{
    public function index(): View
    {
        $quantityDigital = 11;
        $digital = [];
        for ($i=0; $i < $quantityDigital; $i++) {
            $digital[] = $i;
        }
        return view('lesson_2.index', ['digitalList' => $digital]);
    }

    public function testException()
    {
        throw new MyException;
    }
}

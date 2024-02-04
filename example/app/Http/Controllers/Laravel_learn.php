<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Throwable;

class Laravel_learn extends Controller
{
    public function test() {
        $book = Book::find(1);
        foreach($book->category as $category) {
            var_dump($category->id);
        }
    }
}

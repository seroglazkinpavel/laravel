<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Laravel_learn extends Controller
{
    //Выборка с помощью моделей Active Record
    public function test($id) {
        $books = Book::where('id', $id)->get();
        foreach($books as $book) {
            dump($book->id);
            dump($book->name);
            dump($book->price);
        }
        $book = Book::find($id);
        foreach($book->category as $category) {
            dump($category->name);
        }
        // Вставка
        // $book = new Book();
        // $book->name = 'Басни';
        // $book->price = 500;
        // $book->save;

        // Обновить
        //$book = Book::find(3);
        // $book->name = 'Стихи';
        // $book->price = 900;
        // $book->save;

        // Удалить
        // $book = Book::find(3);
        // $book->delete(3);
    }

    // Спомощью конструктора запросов к базе данных Query Builder
    public function query_builder_all() {
        $books = DB::table('books')->get();
        foreach($books as $book) {
            dump($book);
        }
    }

    public function query_builder_first($id) {
        $book = DB::table('books')->find($id);
        dump($book);
        $category_id = DB::table('bookcategory')->where('book_id', $book->id)
            ->value('category_id');
        $category = DB::table('categories')->find($category_id);
        dump($category->name);
    }

    public function query_builder_insert() {
        $book = DB::table('books')->insert([
            'name' => 'Стихи',
            'price' => 600
        ]);
        dump($book);
    }

    public function query_builder_update($id) {
        $book = DB::table('books')
        ->where('id', $id)
        ->update(['name' => 'Басни']);
        dump($book);
    }

    public function query_builder_delete($id) {
        $deleted = DB::table('books')->where('id', '=', $id)->delete();
        dump($deleted);
    }

    public function my_print($array) {
        echo '<pre>';
            print_r($array);
        echo '</pre>';
    }

    // Метод для api
    public function query_api(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'price' => 'required|min:4',
            'text' => 'required|min:4|max:225',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('title')) {
                return "В title есть ошибка!";
            } elseif ($errors->has('price')) {
                return "В price есть ошибка!";
            } elseif ($errors->has('text')) {
                return "В text есть ошибка!";
            }
        } else {
            return "Ошибок нет";
        }

    }
}

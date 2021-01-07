<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'The Two Towers',
            'author' => 'J.R.R. Tolkien'
        ]);
        Book::create([
            'title' => 'Man in Search of Meaning',
            'author' => 'Viktor Frankl'
        ]);
        Book::create([
            'title' => 'The Alchemist',
            'author' => 'Paolo Coehlo'
        ]);
        Book::create([
            'title' => 'East of Eden',
            'author' => 'John Steinbeck'
        ]);
        Book::create([
            'title' => 'Aeneid',
            'author' => 'Virgil'
        ]);
        Book::create([
            'title' => 'Paradiso',
            'author' => 'Dante Alighieri'
        ]);
    }
}

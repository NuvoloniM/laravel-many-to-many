<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //oltre ad importare dati da config o dal database con model posso crearmi unpiccolo array direttamente qua 
        $categories = [
            ['label' => 'HTML', 'color' => 'danger'],
            ['label' => 'CSS', 'color' => 'primary'],
            ['label' => 'JS', 'color' => 'info'],
            ['label' => 'LARAVEL', 'color' => 'light'],
        ];

        // ciclo l'array per pusharli nella tabella
        foreach ($categories as $category) {
            // istanzio la variabile seguendo le caratteristiche della classe del model creato
            $new_category = new Category();
            // tra parentesy perchè è un array multidimensionale e non come al solito un oggetto
            $new_category->label = $category['label'];
            $new_category->color = $category['color'];
            $new_category->save();
        }
    }
}

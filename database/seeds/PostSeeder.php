<?php

use Illuminate\Database\Seeder;
// importo model
use App\Models\Post;
// avendo collegato e aggiunto una colonna devo importare anche il model di quella 
use App\Models\Category;
// importo faker
use Faker\Generator as Faker;
// importo support\str per poter usare str::slug
use Illuminate\Support\Str;
// importo support\Arr per poter trasformare l'array delle categorie in un array normale cpsy da poterlo ciclare random
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // avendo importato il model posso prendere i dati presenti in Category e crearne un array
        // pluck mi serve per prendere solo i dati di una colonna in una determinata tabella
        // toArray li trasforma in un array semplice
        $category_ids = Category::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++){
            $post = new Post();
            // randomizzo i risultati nell'array creato. lo posso usare solo se importo illuminate\support\arr
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text();
            $post->content = $faker->paragraph(2);
            $post->image = $faker->imageUrl(250, 250);
            // al title aggiungo i trattini al posto dello spazio e rimuovo le maiuscole
            $post->slug = Str::slug( $post->title, '-');
            $post->save();
        }
    }
}

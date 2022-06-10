<?php

use Illuminate\Database\Seeder;
// importo model
use App\Models\Tag;
// importo faker
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // creo un piccolo array di nomi da assegnare al labvel tramite ciclo 
        $tag_names = [
            'FrontEnd',
            'BackEnd',
            'FullStack',
            'UI',
            'Sistemista',
            'Sicurezza',
            'DevOps',
            'Designer',
            'MarketingWeb',
            'Contabilità',
            'SocialManager',
            'Giurista',
        ];

        foreach ($tag_names as $name) {
            // creo nuoba istanza con classe del model
            $tag = new tag();
            $tag->label = $name;
            // uso faker per generare random dei colori
            $tag->color = $faker->hexColor();
            $tag->save();
        }
    }
}

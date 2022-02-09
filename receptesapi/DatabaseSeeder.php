<?php

namespace Database\Seeders;

use App\Models\Recepta;
use Illuminate\Database\Seeder;
use Stichoza\GoogleTranslate\GoogleTranslate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://random-recipes.p.rapidapi.com/ai-quotes/5",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: random-recipes.p.rapidapi.com",
                "x-rapidapi-key: "
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        $json = json_decode($response);

        $tr = new GoogleTranslate();
        $tr->setSource('en');
        $tr->setTarget('es');

        foreach ($json as $recepta) {

            Recepta::create([
                'lang' => 'en',
                'title' => $recepta->title,
                'imatge' => $recepta->image,
                'ingredients' => json_encode($recepta->ingredients),
                'pasos' => json_encode($recepta->instructions)
            ]);

            Recepta::create([
                'lang' => 'es',
                'title' => $tr->translate($recepta->title),
                'imatge' => $recepta->image,
                'ingredients' => $tr->translate(json_encode($recepta->ingredients)),
                'pasos' => $tr->translate(json_encode($recepta->instructions))
            ]);

        }

        // \App\Models\User::factory(10)->create();
    }
}

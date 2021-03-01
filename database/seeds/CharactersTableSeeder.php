<?php

use Illuminate\Database\Seeder;
use App\Character;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = config('characters');
        foreach($characters as $character){
            $newChar = new Character();
            $newChar->fill($character); //fillable nel model
            $newChar->save();
        }
    }
}

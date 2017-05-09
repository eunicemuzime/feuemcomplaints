<?php
use Faker\Generator as FakerGenerator;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

 

$factory->define(App\CategoriaReclamacao::class, function (Faker\Generator $faker) {
    
    return [
        'designacao' => $faker->name,        
    ];
});


$factory->define(App\Departamento::class, function (Faker\Generator $faker) {
    
    return [
        'designacao' => $faker->name,
        'sigla' => $faker->name,        
    ];
});



$factory->define(App\Reclamacao::class, function ($faker) use ($factory) {



    return [

    'tipo' => $faker->name,
    'descricao' => $faker->name,
    'propostaSolucao' => $faker->name,
    'data' => $faker->name,
    'estado' => $faker->name,
    'reclamante' => $faker->name,
    'departamento_id' => factory(App\Departamento::class)->create()->id,
    'categoria_id' => factory(App\CategoriaReclamacao::class)->create()->id

    ];
});

$factory->define(App\Sugestao::class, function ($faker) use ($factory) {



    return [

    'tipo' => $faker->name,
    'descricao' => $faker->name,
    'data' => $faker->name,
    'estado' => $faker->name,
    'contribuinte' => $faker->name,
    'departamento_id' => factory(App\Departamento::class)->create()->id,
    'categoria_id' => factory(App\CategoriaReclamacao::class)->create()->id

    ];
});
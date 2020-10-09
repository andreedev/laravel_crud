<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->company,
            "description" => $this->faker->paragraph(3),
            //De todos los usuarios que hay en la db, obtenemos uno de forma aleatoria
            "user_id"=> User::all()->random()->id,
            //obtener la fecha actual
            "created_at"=>now()
        ];
    }
}

<?php

namespace Tests\Infra\Factories;

use Tests\Infra\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends Factory<Manager>
 */
final class ManagerFactory extends Factory
{
    protected $model = Manager::class;

    public function definition(): array
    {
        return [
            'id' => Uuid::uuid4()->toString(),
            'name' => fake()
                ->name,
            'email' => fake()
                ->unique()
                ->safeEmail,
        ];
    }
}

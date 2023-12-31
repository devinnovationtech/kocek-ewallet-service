<?php

namespace Tests\Infra\Factories;

use Tests\Infra\Models\ItemTax;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ItemTax>
 */
final class ItemTaxFactory extends Factory
{
    protected $model = ItemTax::class;

    public function definition(): array
    {
        return [
            'name' => fake()
                ->domainName,
            'price' => random_int(1, 100),
            'quantity' => random_int(0, 10),
        ];
    }
}

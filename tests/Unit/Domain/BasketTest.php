<?php

namespace Tests\Units\Domain;

use App\Internal\Dto\BasketDto;
use App\Internal\Dto\ItemDto;
use App\Internal\Dto\ItemDtoInterface;
use Tests\Infra\Models\Item;
use Tests\TestCase;

/**
 * @internal
 */
final class BasketTest extends TestCase
{
    public function testCount(): void
    {
        $item = new Item();
        $productDto1 = new ItemDto($item, 24, null, null);
        $productDto2 = new ItemDto($item, 26, null, null);
        $basket = new BasketDto([$productDto1, $productDto2], []);

        self::assertEmpty($basket->meta());
        self::assertSame(2, $basket->count());

        $items = $basket->items();
        self::assertNotFalse(current($items));
        self::assertSame(0, key($items));
        self::assertSame(24, current($items)->count());
        self::assertNotFalse(next($items));
        self::assertSame(26, current($items)->count());
        self::assertSame(1, key($items));
    }

    public function testMeta(): void
    {
        /** @var non-empty-array<ItemDtoInterface> $items */
        $items = [];

        $basket1 = new BasketDto($items, []);
        self::assertEmpty($basket1->meta());

        $basket2 = new BasketDto($items, [
            'hello' => 'world',
        ]);
        self::assertSame([
            'hello' => 'world',
        ], $basket2->meta());
    }

    public function testEmpty(): void
    {
        /** @var non-empty-array<ItemDtoInterface> $items */
        $items = [];

        $basket = new BasketDto($items, []);
        self::assertEmpty($basket->items());
        self::assertEmpty($basket->meta());
        self::assertSame(0, $basket->count());
    }
}

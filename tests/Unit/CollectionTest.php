<?php

namespace Tests\Unit;

use App\Support\Collection;
use IteratorAggregate;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }
    /** @test */
    public function count_is_correct_for_items_passed_in()
    {

        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two'
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);

    }

    /** @test */

    public function collection_can_Be_iterated()
    {
        $collection = new Collection([
            'one', 'tow', 'three'
        ]);

        $items = [];

        foreach ($collection as $item)
        {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());

    }

    /** @test */
    public function collection_can_Be_merged_with_another_collection()
    {
        $collection1 = new Collection([
            'one', 'tow'
        ]);

        $collection2 = new Collection([
            'three', 'four', 'five'
        ]);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());

    }

    /** @test */
    public function can_Add_to_existing_collection()
    {
        $collection = new Collection([
            'one', 'tow'
        ]);
        $collection->add(['three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
    }

    /** @test */
    public function json_encodeing_a_collection_object_returns_json()
    {

        $collection = new Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);
        $encode = json_encode($collection);

        $this->assertInternalType('string', $encode);
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]',$encode);

    }

}

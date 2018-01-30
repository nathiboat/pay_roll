<?php

namespace Tests\Unit;

use App\Calculator\Addtion;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdditionTest extends TestCase
{
    /** @test */
    public function adds_up_given_operands()
    {
        $addition = new Addtion;
        $addition->setOperands([5,10]);

        $this->assertEquals(15, $addition->calculate());
    }


    /** @test */
    public function no_oprands_given_throws_exception_when_calculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new Addtion;
        $addition->calculate();
    }
}

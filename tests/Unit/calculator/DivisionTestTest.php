<?php

namespace Tests\Unit;

use App\Calculator\Division;
use Tests\TestCase;

class DivisionTest extends TestCase
{
    /** @test */
    public function divides_given_operands()
    {
        $division = new Division;
        $division->setOperands([100,2]);

        $this->assertEquals(50, $division->calculate());
    }

    /** @test */
    public function removes_division_by_zoro_operands()
    {

        $division = new Division;
        $division->setOperands([10,0,0,5,0]);

        $this->assertEquals(2, $division->calculate());

    }

     /** @test */
    public function no_operands_given()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $division = new Division;
        $division->calculate();
    }
}

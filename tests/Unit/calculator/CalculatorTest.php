<?php

namespace Tests\Unit;

use App\Calculator\Addtion;
use App\Calculator\Calculator;
use App\Calculator\Division;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function can_set_single_operation()
    {
        $addtion = new Addtion;
        $addtion->setOperands([5,10]);

        $calculator = new Calculator;
        $calculator->setOperation($addtion);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_set_multiple_operations()
    {
        $addtion = new Addtion;
        $addtion->setOperands([5,10]);

        $addtion2 = new Addtion;
        $addtion2->setOperands([5,2]);


        $calculator = new Calculator;
        $calculator->setOperations([$addtion, $addtion2]);

        $this->assertCount(2, $calculator->getOperations());

    }

    /** @test */
    public function operations_are_ignore_if_not_instance_of_operation_interface()
    {
        $addtion = new Addtion;
        $addtion->setOperands([5,10]);

        $calculator = new Calculator;
        $calculator->setOperations([$addtion, 'cats']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function cal_calculate_result()
    {

        $addtion = new Addtion;
        $addtion->setOperands([5,10]);

        $calculator = new Calculator;
        $calculator->setOperation($addtion);

        $this->assertEquals(15, $calculator->calculate());

    }

    /** @test */
    public function calculate_medthod_return_multiple_result()
    {
        $addtion = new Addtion;
        $addtion->setOperands([5,10]); //15

        $division = new Division();
        $division->setOperands([50,2]); //25

        $calculator = new Calculator;
        $calculator->setOperations([$addtion, $division]);

        $this->assertInternalType('array', $calculator->calculate());
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(25, $calculator->calculate()[1]);


    }



}

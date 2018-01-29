<?php

namespace Tests\Unit;

use App\Models\Employee;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    protected $employee;

    public function setUp()
    {
        $this->employee = new Employee();
    }

    /** @test */
    public function If_We_Can_Get_The_First_Name()
    {

        $this->employee->setFirstName('Billy');
        $this->assertEquals($this->employee->getFirstName(), 'Billy');
    }

    public function testIfWeCanGetTheLastName()
    {


        $this->employee->setLastName('Garrett');
        $this->assertEquals($this->employee->getLastName(), 'Garrett');
    }

    public function testFullNameIsRetuned()
    {

        $this->employee->setFirstName('Billy');
        $this->employee->setLastName('Garrett');

        $this->assertEquals($this->employee->getFullName(), 'Billy Garrett');

    }

    public function testFirstAddLastNameAreTrimmed()
    {
        $this->employee->setFirstName(' Billy    ');
        $this->employee->setLastName('         Garrett');

        $this->assertEquals($this->employee->getFirstName(), 'Billy');
        $this->assertEquals($this->employee->getLastName(), 'Garrett');
    }

    public function testEmailAddressCanBeSet()
    {
        $email = 'billy@email.com';
        $this->employee->setEmail($email);

        $this->assertEquals($this->employee->getEmail(), 'billy@email.com');
    }

    public function testEmailVariablesContainCorrectValue()
    {
        $this->employee->setFirstName('Alex');
        $this->employee->setLastName('Garrett');
        $this->employee->setEmail('alex@email.com');

        $emailVariables = $this->employee->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Alex Garrett');
        $this->assertEquals($emailVariables['email'], 'alex@email.com');

    }
}

<?php

namespace Tests\Unit;

use App\Models\PayDate;
use Tests\TestCase;

class PayDateTest extends TestCase
{
    protected $pay_date;

    public function setUp()
    {
        $this->pay_date = new PayDate;
    }
    /** @test */
    public function check_if_today()
    {
        $today = $this->pay_date->get_today();
        $this->assertEquals(date('Y-m-d'), $today);

    }

    /** @test */
    public function check_format()
    {

        $format = $this->pay_date->getFormat();
        $this->assertEquals("Y-m-d", $format);
        $this->pay_date->setFormat("Y");
        $newFormat = $this->pay_date->getFormat();
        $this->assertEquals($newFormat, "Y");
    }

    /** @test */
    public function check_last_day_0f_month_month()
    {
        $today = $this->pay_date->get_today();
        $last = $this->pay_date->get_last_day_of_month();
        $this->pay_date->set_day(date($today));

        $this->assertEquals(date("Y-m-t", strtotime($today)), $last);
    }

    /** @test */
    public function check_if_today_is_salary_day()
    {
        $salaryOrNo = $this->pay_date->is_salary_pay_date();

        $date = date("Y-m-d");

        $last_date_of_the_month = date("Y-m-t");

        $last_working_day_of_month = date("D", strtotime($last_date_of_the_month));

        switch ($last_working_day_of_month)
        {
            case 'Sat':
                $newdate = strtotime('-1 day', strtotime($last_working_day_of_month));
                $last_working_day_of_month = date('Y-m-j', $newdate);
                break;
            case 'Sun':
                $newdate = strtotime ('-2 day', strtotime($last_working_day_of_month));
                $last_working_day_of_month = date( 'Y-m-j' , $newdate );
        }

        if($last_working_day_of_month == $date)
        {
            $is_salary = true;
        }else
        {
            $is_salary = false;
        }

        $this->assertEquals($is_salary ,$salaryOrNo);
    }

    /** @test */
    public function check_if_is_salary_day_for_that_month()
    {
        $this->assertTrue(true);
    }
    /** @test */
    public function check_first_expenses_payday()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function check_second_expenses_payday()
    {
        $this->assertTrue(true);
    }


}

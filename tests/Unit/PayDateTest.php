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
    public function check_if_today_is_pay_day_this_month()
    {
        $this->pay_date->setDay(date('YYYY-MM-DD'));

        $this->assertEquals($this->pay_date->get_pay_day(), '2018-01-31');
    }

    /** @test */
    public function check_if_last_working_day()
    {
        $this->assertTrue(true);
    }


}

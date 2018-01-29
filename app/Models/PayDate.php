<?php

namespace App\Models;

use DateTime;

class PayDate
{
    protected $today;

    public function __construct()
    {
        $this->today = date("Y-m-d");
    }

    public function end_of_month()
    {
        return date("Y-m-t", strtotime($this->today));
    }

    public function get_pay_date()
    {

    }


}
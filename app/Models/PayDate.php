<?php

namespace App\Models;

use DateTime;

class PayDate
{
    protected $date;
    protected $format;

    public function __construct($format = "Y-m-d")
    {
        $this->date = date($format);
        $this->format = $format;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function get_today()
    {
        return $this->date;
    }

    public function set_day($date)
    {
        return date("Y-m-t", strtotime($date));
    }

    public function get_last_day_of_month()
    {
        return date("Y-m-t", strtotime($this->date));
    }

    public function is_weekend()
    {
        $day = date("D", strtotime($this->date));

        ($day == 'Sat' || $day == 'Sun')? $weekend = true : $weekend = false;

        return $weekend;
    }

    public function is_salary_pay_date()
    {
        $last_date_of_month = $this->get_last_day_of_month();

        $last_working_day_of_month = date("D", strtotime($last_date_of_month));

        switch ($last_working_day_of_month){
            case 'Sat':
                $newdate = strtotime('-1 day', strtotime($last_working_day_of_month));
                $last_working_day_of_month = date('Y-m-j', $newdate);
                break;
            case 'Sun':
                $newdate = strtotime ('-2 day', strtotime($last_working_day_of_month));
                $last_working_day_of_month = date( 'Y-m-j' , $newdate );
        }
        if($last_working_day_of_month == $this->date)
        {
            $is_salary = true;
        }else
        {
            $is_salary = false;
        }
        return $is_salary;
    }
    public function get_salary_pay_date()
    {

    }


}
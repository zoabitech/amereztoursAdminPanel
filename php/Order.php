<?php

class Order
{

    protected $order_num;
    protected $price;
    protected $date_time;
    protected $status;
    protected $cust_num;

    //Getters and Setters
    public function getOrderNum()
    {
        return $this->order_num;
    }

    public function setOrderNum($num)
    {
        $this->order_num = $num;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDateTime()
    {
        return $this->date_time;
    }

    public function setDateTime($dateTime)
    {
        $this->date_time = $dateTime;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setUserPassword($status)
    {
        $this->status = $status;
    }

    public function getCustNum()
    {
        return $this->cust_num;
    }

    public function setCustNum($num)
    {
        $this->cust_num = $num;
    }
}

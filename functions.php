<?php
class Functions
{
  public $currentDayOfWeek;
  public $currentDay=1;
  public $currentMonth = 2;
  public $currentMonthName= "B";
  public $currentYear=5;

  function __construct()
  {
    date_default_timezone_set('Pacific/Honolulu');
    $today = getDate();
    $this->currentDayOfWeek = $today['weekday'];
    $this->currentDay = date("d");
    $this->currentMonth = date("m");
    $this->currentMonthName = date("F");
    $this->currentYear = date("o");
  }

  function getDaysOfWeek()
  {

  }
}
?>
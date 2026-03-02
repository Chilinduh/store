<?php

namespace common\Helper;

class DateHelper
{

  public static function months($month = null)
  {

    $months = [
      1 => 'Январь',    2 => 'Февраль',   3 => 'Март',     4 => 'Апрель',
      5 => 'Май',       6 => 'Июнь',      7 => 'Июль',     8 => 'Август',
      9 => 'Сентябрь',  10 => 'Октябрь',  11 => 'Ноябрь',  12 => 'Декабрь'
    ];

    if ($month) {
      return $months[intval($month)]??'';
    }
    return $months;


  }

  public static function dayInWeek()
  {

    return [
      1 => 'Понедельник',
      2 => 'Вторник',
      3 => 'Среда',
      4 => 'Четверг',
      5 => 'Пятница',
      6 => 'Суббота',
      7 => 'Воскресенье',
    ];
  }

  public static function dayInWeekShort($day = null)
  {

    $days = [
      1 => 'Пн',
      2 => 'Вт',
      3 => 'Ср',
      4 => 'Чт',
      5 => 'Пт',
      6 => 'Сб',
      7 => 'Вс',
    ];

    if ($day) {
      return $days[intval($day)]??'';
    }
    return $days;
  }
}

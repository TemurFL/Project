<?php
require_once 'vendor/autoload.php';
use App\Helpers\Date;
use App\Helpers\Interval;

date_default_timezone_set('Asia/Aqtobe');



$date = new Date('2025-12-31');

echo $date->getYear(), "  -1 \n";  // выведет '2025'
echo $date->getMonth(), "  -2 \n"; // выведет '12'
echo $date->getDay(), "  -3 \n";   // выведет '31'
echo $date->getWeekDay(), "  -4 \n";     // выведет '3'
echo $date->getWeekDay('ru'), "  -5 \n"; // выведет 'среда'
echo $date->getWeekDay('en'), "  -6 \n"; // выведет 'wednesday'
echo (new Date('2025-12-31'))->addYear(1), "  -7 \n"; // '2026-12-31'
echo (new Date('2025-12-31'))->addDay(1), "  -8 \n";  // '2026-01-01'
echo (new Date('2025-12-31'))->subDay(3), "  -9 \n"; // '2025-12-28'

//

$date1 = new Date('2025-12-31');
$date2 = new Date('2026-11-28');

$interval = new Interval($date1, $date2);

echo $interval->toDays(), "  -10 \n";   // выведет разницу в днях
echo $interval->toMonths(), "  -11 \n"; // выведет разницу в месяцах 
echo $interval->toYears(), "  -12 \n";  // выведет разницу в годах
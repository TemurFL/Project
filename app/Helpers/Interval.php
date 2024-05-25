<?php
declare(strict_types=1);
namespace App\Helpers;

use App\Helpers\Date;

class Interval
{
    private Date $firstDate;
    private Date $secondDate;
    private \DateInterval $interval;
    public function __construct(Date $firstDate, Date $secondDate) {
        $this->firstDate  = $firstDate;
        $this->secondDate = $secondDate;
        $this->interval   = $firstDate->getDateTime()->diff($secondDate->getDateTime());
    }
    public function toDays() : int {
        return (int) ($this->firstDate->getTimeStamp() - $this->secondDate->getTimeStamp()) / 86400;
    }
    public function toMonths() {
        return (int) $this->interval->format('%m') + $this->interval->y * 12;
    }
    public function toYears() : int {
        return (int) $this->interval->format('%y');
    }
}


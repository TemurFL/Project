<?php
declare(strict_types=1);
namespace App\Helpers;

class Date
{
    private \DateTime $date;
    private function errorOutput() : never {
        throw new \InvalidArgumentException('Указано не верное значение');
    }
    public function __construct(string $strDate = NULL) {
        if($strDate === NULL || $strDate === '') {
            $this->date = new \DateTime();
            return;
        }
        if(strtotime($strDate)) {
            $this->date = new \DateTime($strDate);
        } else {
            throw new \InvalidArgumentException('Укажите верный формат даты "YYYY-MM-DD"');
        }
    }
    public function getDay() : int {
        return (int) $this->date->format('d');
    }
    public function getMonth($lang = NULL) : int|string {
        switch($lang) {
            case "en":
                return $this->date->format('F');
            case "ru":
                $monthNames = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
                return $monthNames[$this->date->format('n') - 1];
            default:
                return $this->date->format('m');
        }
    }
    public function getYear() : int {
        return (int) $this->date->format('Y');
    }
    public function getWeekDay($lang = NULL) : int|string {
        switch($lang) {
            case "en":
                return $this->date->format('l');
            case "ru":
                $weekNames = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
                return $weekNames[$this->date->format('w')];
            default:
                return $this->date->format('N');
        }
    }
    public function getTimeStamp() : int {
        return (int) $this->date->format('U');
    }
    public function getDateTime() : \DateTime {
        return $this->date;
    }
    public function addDay(int $value) : string {
        if($value <= 0) $this->errorOutput();
        $this->date->add(new \DateInterval('P'.$value.'D'));
        return $this->format('Y-m-d');
    }
    public function subDay(int $value) : string {
        if($value <= 0) $this->errorOutput();
        $this->date->sub(new \DateInterval('P'.$value.'D'));
        return $this->format('Y-m-d');
    }
    public function addMonth(int $value) : string {
        if($value <= 0) $this->errorOutput();
        $this->date->add(new \DateInterval('P'.$value.'M'));
        return $this->format('Y-m-d');
    }
    public function sumMonth(int $value) : string {
        if($value <= 0) $this->errorOutput();
        $this->date->sub(new \DateInterval('P'.$value.'M'));
        return $this->format('Y-m-d');
    }
    public function addYear(int $value) : string {
        if($value <= 0) $this->errorOutput();
        $this->date->add(new \DateInterval('P'.$value.'Y'));
        return $this->format('Y-m-d');
    }
    public function subYear(int $value) : string {
        if($value <= 0) $this->errorOutput();
        $this->date->sub(new \DateInterval('P'.$value.'Y'));
        return $this->format('Y-m-d');
    }
    public function format($format) : string {
        return $this->date->format($format);
    }
    public function __toString() : string {
        return $this->date->format('Y-m-d');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GroupSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'jour_semaine',   // например: 'lundi', 'mardi', ...
        'heure_debut',    // формат: HH:MM:SS
        'heure_fin',      // формат: HH:MM:SS
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Аксессор: сокращённый день недели по текущей локали
     */
    public function getDayShortAttribute()
    {
        $mapFr = [
            'lundi' => 1, 'mardi' => 2, 'mercredi' => 3,
            'jeudi' => 4, 'vendredi' => 5, 'samedi' => 6, 'dimanche' => 7,
        ];

        $dayNum = $mapFr[strtolower($this->jour_semaine)] ?? null;
        if (!$dayNum) {
            return $this->jour_semaine; // fallback если значение неизвестно
        }

        return Carbon::now()
            ->startOfWeek()                  // понедельник как начало недели
            ->addDays($dayNum - 1)           // смещаемся до нужного дня
            ->locale(app()->getLocale())     // текущая локаль приложения
            ->isoFormat('dd');               // сокращённое название дня (Пн/Mon/Lun)
    }

    /**
     * Аксессор: время начала без секунд
     */
    public function getStartHmAttribute()
    {
        return $this->formatHm($this->heure_debut);
    }

    /**
     * Аксессор: время конца без секунд
     */
    public function getEndHmAttribute()
    {
        return $this->formatHm($this->heure_fin);
    }

    protected function formatHm($time)
    {
        if (!$time) return '';
        try {
            return Carbon::createFromFormat('H:i:s', $time)->format('H:i');
        } catch (\Exception $e) {
            return substr($time, 0, 5); // если уже HH:MM
        }
    }
}

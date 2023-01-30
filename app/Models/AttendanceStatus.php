<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStatus extends Model
{
    use HasFactory;

    protected $guarded=[];

    public const PRESENT = "present";
    public const ABSENT = "absent";
    public const WFH = "wfh";
    public const HALF_DAY = "half_day";
    public const LATE = "late";

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getStatusId($name)
    {
        return self::where('identifier',$name)->first()->id;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitmentStatus extends Model
{
    static $statuses = ['interviewing', 'interested', 'onboarding', 'finished'];

    public static function GetStatus($id) {
        switch ($id) {
            case 1:
            return $statuses[0];
            case 2 :
            return $statuses[1];
            case 3:
            return $statuses[2];
            case 4:
            return $statuses[3];                        
        }
    }

    public static function isStatusFinished($id) {
        if ($id == 4) {
            return true;
        }
        return false;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Scout extends Model
{
    protected $table = 'scouts';
    protected $primaryKey = 'scout_id';
    public $timestamps = false;
    protected $membership_date;

    protected $fillable = [
        'first_name', 'last_name', 'assurance_num', 'date_of_birth',
        'membership_date', 'email', 'phone','image','scout_info','personal_info','family_status'
    ];

    public function __construct(){


    }

    private function getYear(){
        $date = $this->attributes['membership_date'];
        list($year, $month, $day) = explode('-', $date);

        return $year;
    }

    public function getFullName(){
        return $this->last_name.' '.$this->first_name;
    }
    public function  getId(){
        return $this->scout_id;
    }

    /**
     * Gets the registration number (Matricule) of this scout
     * Registration ID is of format:
     *       SF-YYNNNNN
     * Where: SF: a fixed prefix
     *        YY: two last digits of the year
     *        NNNNN: sequence number
     * @return string registration number
     */
    public function getRegistrationNumber(){
        return 'SF-'.substr($this->getYear(), 2, 2).'-'.$this->scout_id;
    }
    public function  getPicture(){
        if($this->image==""){
            $image = '/images/default.png';
        }else{
            $image = '/images/Captain/'.$this->image;
        }

        return $image;
    }

}

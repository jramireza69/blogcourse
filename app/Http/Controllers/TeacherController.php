<?php

namespace App\Http\Controllers;


use App\Traits\Teacher\ManageCoupons;
use App\Traits\Teacher\ManageCourses;
use App\Traits\Teacher\ManageUnits;
use App\Traits\Teacher\ManageProfits;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    use ManageCourses, ManageUnits, ManageCoupons, ManageProfits;

    public function index (){
        return view('teacher.index');
    }


}

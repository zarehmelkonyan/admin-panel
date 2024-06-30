<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class MembersController extends Controller
{
    public function index()
    {
       $members = Member::all();

        return view("members.index", ["members"=>$members]);
    }
}

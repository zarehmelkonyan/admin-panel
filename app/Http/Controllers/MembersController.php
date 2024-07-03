<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\MemberCreateRequest;
use Carbon\Carbon;
use Str;
class MembersController extends Controller
{
    public function index()
    {
       $members = Member::all();

        return view("members.index", ["members"=>$members]);
    }
    public function create()
    {
        return view("members.create");
    }
    public function store(MemberCreateRequest $request)
    {
        $inputs = $request->validated();
        $inputs['started_at'] = Carbon::parse($inputs["started_at"]);
        $inputs['slug'] = Str::slug(Str::random());
        Member::create($inputs);
        
        return redirect()->route("members_index");
    }
    public function show($id){
        
    }
    public function edit($id){

    }
    public function update(Request $request, $id){

    }
    public function destroy($id){

    }
}

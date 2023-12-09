<?php

namespace App\Http\Controllers;

use App\Models\details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{

    public function userDetails($id){
        $user = details::where('user_id', $id)->get()->first();
        return view('profile', ['user' => $user]);
    }

    public function sortbyjoin(){
        $users = Details::orderBy('id', 'desc')->paginate(20);
        return view('welcome', ['userss' => $users, 'sortby' => true]);
    }

    public function sortbyrelevance(){
        $users = Details::orderBy('skills', 'desc')->paginate(20);
        return view('welcome', ['userss' => $users, 'sortby' => true]);
    }

    public function updateProfile(Request $request){
        $skills = implode('", ', $request->skills);
        $skills = str_replace('",', ', ', $skills);
        $skills = str_replace('"', '', $skills);
        $skills = str_replace('[', '', $skills);
        $skills = str_replace(']', '', $skills);

        $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'location' => 'required',
            'bio' => 'required',
            'skills' => 'required',
        ]);

        $details = array(
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'rate' => $request->rate,
            'location' => $request->location,
            'bio' => $request->bio,
            'skills' => $skills,
        );

        $detail = details::where('id', $request->id)->get()->first();
        $detail->update($details);
        return redirect('/');
    }

    public function searchUser(Request $request) {
        if(empty($request->skill)) {
            $column = "location";
            $query = $request->location;
        } else if(empty($request->location)) {
            $column = "skills";
            $query = $request->skill;
        } else {
            $column = "skills";
            $query = $request->skill;
        }
        $result = details::where('location', 'LIKE', '%'.$request->location.'%')
            ->where('skills', 'LIKE', '%'.$request->skill.'%')
            ->paginate(20);
        return view('welcome', ['search' => true, 'searchUsers' => $result]);
    }

    public function saveProfile(Request $request){
        
        $skills = implode('", ', $request->skills);
        $skills = str_replace('",', ', ', $skills);
        $skills = str_replace('"', '', $skills);
        $skills = str_replace('[', '', $skills);
        $skills = str_replace(']', '', $skills);

        $details = array(
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'rate' => $request->rate,
            'location' => $request->location,
            'bio' => $request->bio,
            'skills' => $skills,
        );

        details::UpdateOrCreate($details);
        return redirect('/');
    }
}

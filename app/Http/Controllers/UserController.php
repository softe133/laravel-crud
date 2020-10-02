<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userinfo;

class UserController extends Controller
{
    public function addUser()
    {
    	return view('add-user');
    }

    public function createUser(Request $request)
    {
    	$userinfo = new Userinfo();
    	$userinfo->full_name = $request->full_name;
    	$userinfo->father_name = $request->father_name;
    	$userinfo->cnic = $request->cnic;
    	$userinfo->email = $request->email;
    	$userinfo->contact_no = $request->contact;
    	$userinfo->address = $request->address;
    	$userinfo->password = $request->password;
    	$userinfo->save();
    	return back()->with('user_created','User has been added Successfully!');

    }

    public function getUser()
    {
    	$userinfos = Userinfo::orderBy('id','DESC')->get();
    	return view('alluser',compact('userinfos'));
    }

    public function getUserById($id)
    {
    	$userinfo = Userinfo::where('id',$id)->first();
    	return view('single-user',compact('userinfo'));
    }

    public function deleteUser($id)
    {
    	Userinfo::where('id',$id)->delete();
    	return back()->with('user-deleted','user has been deleted successfully!');

    }

    public function editUser($id)
    {
    	$userinfo = Userinfo::find($id);
    	return view('edit-user',compact('userinfo'));
    }

    public function updateUser(request $request)
    {
    	$userinfo = Userinfo::find($request->id);
    	$userinfo->full_name = $request->full_name;
    	$userinfo->father_name = $request->father_name;
    	$userinfo->cnic = $request->cnic;
    	$userinfo->email = $request->email;
    	$userinfo->contact_no = $request->contact;
    	$userinfo->address = $request->address;
    	$userinfo->password = $request->password;
    	$userinfo->save();
    	return back()->with('user-updated','user has been updated successfully!');

    }
}

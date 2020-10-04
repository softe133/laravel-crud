<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function addUser()
    {
    	return view('add-user');
    }

    public function createUser(Request $request)
    {
    	$user = new User();
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->cnic = $request->cnic;
    	$user->email = $request->email;
    	$user->contact_no = $request->contact;
    	$user->address = $request->address;
    	$user->password = $request->password;
    	$user->save();
    	return back()->with('user_created','User has been added Successfully!');

    }

    public function getUser()
    {
    	$user = User::orderBy('id','DESC')->get();
    	return view('alluser',compact('user'));
    }

    public function getUserById($id)
    {
    	$user = User::where('id',$id)->first();
    	return view('single-user',compact('user'));
    }

    public function deleteUser($id)
    {
    	User::where('id',$id)->delete();
    	return back()->with('user-deleted','user has been deleted successfully!');

    }

    public function editUser($id)
    {
    	$user = User::find($id);
    	return view('edit-user',compact('user'));
    }

    public function updateUser(request $request)
    {
    	$user = User::find($request->id);
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->cnic = $request->cnic;
    	$user->email = $request->email;
    	$user->contact_no = $request->contact;
    	$user->address = $request->address;
    	$user->password = $request->password;
    	$user->save();
    	return back()->with('user-updated','user has been updated successfully!');

    }
}

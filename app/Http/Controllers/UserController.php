<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function addUsers()
    {
    	return view('add-edit-user');
    }

    public function createUsers(Request $request)
    {
    	$user = new User($request->all());
        // $user->roles = $request->input('roles');
        // User::create($user);
    	// $user->name = $request->name;
    	// $user->father_name = $request->father_name;
    	// $user->cnic = $request->cnic;
    	// $user->email = $request->email;
    	// $user->contact_no = $request->contact;
    	// $user->address = $request->address;
    	// $user->password = $request->password;
    	$user->save();
        return response()->json($user);
    	//return back()->with('user_created','User has been added Successfully!');

    }

    public function getUsers()
    {
        // return $user ? $user->firstname : '';
    	$user = User::orderBy('id','DESC')->get();
    	return view('users',compact('user'));
    }

    public function getUsersById($id)
    {
    	$user = User::where('id',$id)->first();
    	return view('single-user',compact('user'));
    }

    public function deleteUsers($id)
    {
    	$user = User::where('id',$id)->delete();
    	return back()->with('user-deleted','user has been deleted successfully!');

    }

    public function editUsers($id)
    {
    	$user = User::find($id);
    	return view('add-edit-user',compact('user'));
    }

    public function updateUsers(request $request)
    {
    	$user = User::find($request->id);
        $user->update($request->all());
    	// $user->name = $request->name;
    	// $user->father_name = $request->father_name;
    	// $user->cnic = $request->cnic;
    	// $user->email = $request->email;
    	// $user->contact_no = $request->contact;
    	// $user->address = $request->address;
    	// $user->password = $request->password;
    	$user->save();
        return response()->json($user);
    	// return back()->with('user-updated','user has been updated successfully!');

    }
}

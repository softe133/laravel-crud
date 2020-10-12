<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DB;


class UserController extends Controller
{
    public function addUsers()
    {
    	return view('add-edit-user');
    }

    public function createUsers(Request $request)
    {

    	// $user = new User($request->all());
        // $user->roles = $request->input('roles');
        // User::create($user);
        $user = new User();
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->cnic = $request->cnic;
    	$user->email = $request->email;
    	$user->contact_no = $request->contact_no;
    	$user->address = $request->address;
    	$user->password = $request->password;
    	$user->save();

        $role = new Role();
        $role->title = $request->roles;
        $role->save();

        return response()->json($user);
    	//return back()->with('user_created','User has been added Successfully!');

    }

    public function getUsers()
    {
        // return $user ? $user->firstname : '';
    	// $user = User::orderBy('id','DESC')->get();
         $user = DB::table('users')
        ->select('users.id','users.name','users.father_name','users.cnic','users.email','users.contact_no','users.address','roles.title')
        ->join('roles','roles.id','=','users.id') ->get();    
    	return view('users',compact('user'));
    }

    public function getUsersById($id)
    {
        $user = DB::table('users')
        ->select('users.id','users.name','users.father_name','users.cnic','users.email','users.contact_no','users.address','users.password','roles.title')
        ->join('roles','roles.id','=','users.id')->where('users.id',$id)->first();
    	// $user = User::where('id',$id)->first();
    	return view('single-user',compact('user'));
    }

    public function deleteUsers($id)
    {
    	$user = User::where('id',$id)->delete();
    	return back()->with('user-deleted','user has been deleted successfully!');

    }

    public function editUsers($id)
    {
    	// $user = User::find($id);
        $user = DB::table('users')
        ->select('users.id','users.name','users.father_name','users.cnic','users.email','users.contact_no','users.address','users.password','roles.title')
        ->join('roles','roles.id','=','users.id')->where('users.id',$id)->first();
    	return view('add-edit-user',compact('user'));
    }

    public function updateUsers(request $request)
    {
    	$user = User::find($request->id);
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->cnic = $request->cnic;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->update();
        // $user->save();
        
        $role = Role::find($request->id);
        $role->title = $request->roles;
        $role->update();
        // $role->save();
    	// $user->name = $request->name;
    	// $user->father_name = $request->father_name;
    	// $user->cnic = $request->cnic;
    	// $user->email = $request->email;
    	// $user->contact_no = $request->contact;
    	// $user->address = $request->address;
    	// $user->password = $request->password;
    	// $user->save();
        return response()->json($user);
    	// return back()->with('user-updated','user has been updated successfully!');

    }
}

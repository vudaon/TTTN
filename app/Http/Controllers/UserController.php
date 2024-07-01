<?php

namespace App\Http\Controllers;

use App\Models\AfterCategory;
use App\Models\BeforeCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index() {
    $users = User::paginate(6);
    return view('users.index',[
        'users' => $users,
    ]);
   }
   public function create() {

        $users = user::all();
        return view('users.create',[
            'users' => $users,

        ]);
    }    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5|string',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:nam,nữ,khác',
        ]);
        $user = user::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'phone_number' => $request->input('phone'),
        ]);

        $user->save();
        return redirect('/users');
    }
     
    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit')->with('users',$users);
    }

    public function update (Request $request, $id) {
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5|string',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:nam,nữ,khác',
        ]);
        $users = User::where('id',$id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'address' => $request->input('address'),
                'gender' => $request->input('gender'),
                'phone_number' => $request->input('phone'),
            ]);
            return redirect('/users');
    }
    public function destroy($id){
        $prelist = BeforeCategory::where('user_id',$id)->first();
         if($prelist != null){
            $prelist->delete();
        }
        $afterlist = AfterCategory::where('user_id',$id)->first();
        if($afterlist != null){
            $afterlist->delete();
        }
        $users = user::find($id);
        $users->delete();
        return redirect('/users');
    }
    
    public function show($id) {
        $user = User::find($id);
        return view('users.show')->with('user',$user);
    }
    
}

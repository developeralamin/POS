<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Group;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users']  = User::all();
        return view('users.users',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $this->data['groups']    = Group::arrayforSelectGroup();
        $this->data['mode']      ='create';
       return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        if(User::create($data)){
            Session::flash('message', 'User Added Successfully');
        }
        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user']       =User::find($id);
        $this->data['tab_menu']   ='user_info';

        return view('users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']      = User::findOrFail($id);
        $this->data['groups']    = Group::arrayforSelectGroup();
        $this->data['mode']      = 'edit';
        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
         $data             = $request->all();
         $user             = User::find($id);
         $user->group_id   = $data['group_id'];
         $user->name       = $data['name'];
         $user->email      = $data['email'];
         $user->phone      = $data['phone'];
         $user->address    = $data['address'];
      
         if($user->save()) {
            Session::flash('message', 'User Update Successfully');
        }
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(User::find($id)->delete())  {
            Session::flash('message', 'User Deleted Successfully');
        }
        return redirect()->to('users');
    }
}

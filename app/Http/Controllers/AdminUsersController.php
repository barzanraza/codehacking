<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::lists('name', 'id')->all();  // lists() arraykman bo dagarenetawa law du columna ba sheway {"1":"administrator","2":"author","3":"subscriber"} balam abet orderi name u id yaka bam shewaya bnuset kanusrawa bo away anjamakai wak aw array yay sarawa begarenetawa
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        if (trim($request->password) == '') {
            $input = $request->except('password');
        
        }else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }



        if($file = $request->file('photo_id')){         // photo_id nawi input file akaya
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        
        User::create($input);

        return redirect('/admin/users');




        //return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(usersEditRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);


        if (trim($request->password) == '') {
            $input = $request->except('password');  // wata value y hamu fieldakan bxara naw aw variable awa bejga la fieldi password
        
        }else{

            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }



        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        return redirect('/admin/users');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->file); // unlink() function deletes a file it returns TRUE on success and FALSE on failure, The public_path() function returns the fully qualified path to your application's public directory, pewest nakat bnusin 'images/'.$user->photo->file chunka ema lanaw photo accessor man bo nusewa
        $user->delete();
        Session::flash('deleted_user', 'The user has been deleted');    // use to create a message
        return redirect('/admin/users');

    }
}

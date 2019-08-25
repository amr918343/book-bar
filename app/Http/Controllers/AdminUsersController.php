<?php

namespace App\Http\Controllers;

use App\Models\user\Gender;
use App\Models\user\Role;
use App\Models\user\User;
use App\Models\user\UserPhoto;
use Illuminate\Http\Request;

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
        $users = User::paginate(5);

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
        $genders = Gender::all();
        $roles = Role::all();

        return view('admin.users.create', compact(['roles', 'genders']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required',
            'gender_id' => 'required',
            'photo_id' => 'mimes:jpeg,jpg,png,gif,webp',
        ]);

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images/users', $name);

            $photo = UserPhoto::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('auth/users');
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
        $genders = Gender::all();
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact(['roles', 'user', 'genders']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->password == '') {
            $input = $request->except(['password', '_token', '_method', 'password_confirmation']);
        } else {
            $input = $request->except(['_token', '_method', 'password_confirmation']);
            $input['password'] = bcrypt($request->password);
        }

        //
        $this->validate($request, [
            'name' => 'required',
            'email' => '',
            'password' => 'sometimes',
            'password_confirmation' => 'sometimes|required_with:password|same:password',
            'role_id' => 'required',
            'photo_id' => 'mimes:jpeg,jpg,png,gif,webp',
        ]);



        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images/users', $name);

            $photo = UserPhoto::create(['file' => $name]);

            $input['photo_id'] = $photo->id;

        }



        User::whereId($id)->update($input);

        return redirect('auth/users');
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
        unlink(ltrim($user->photo->file, '/'));
        $user->delete();

        return redirect('auth/users');
    }

    public function deleteSelected(Request $request) {

        $users = User::findOrFail($request->checkBoxArray);
        foreach ($users as $user) {
            unlink(ltrim($user->photo->file, '/'));
            $user->delete();

        }
        return redirect()->back();
    }
}

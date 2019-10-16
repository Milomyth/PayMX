<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Str;

use App\User;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::select()->where('users.id', '=', $id)
                ->first();
        //dd($user);
        return view('dashboard.user_profile', compact('user'));
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

      
        $request = request()->except(['_token','id', '_method']);

        if($request['password'] == null){


            $request =  array('full_name' => $request['full_name'] ,
                              'email'     => $request['email']);

            $request = array_filter($request);


            User::where('id', $id)->update($request);



        }else{


            $request =  array('full_name' => $request['full_name'] ,
                              'email'     => $request['email'],
                              'password'  => bcrypt($request['password']));

            $request = array_filter($request);


            User::where('id', $id)->update($request);

        };

        return Redirect()->back()->with('message', 'Cambios guardados con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request, $id)
    {

        
        if ($request->has('avatar')) {
            // toma la imagen
            $image = $request->file('avatar');
            // Make a image name based on user name and current timestamp
            //$name = $request->file('avatar')->getClientOriginalName();
            // Define folder path
            //$folder = '/uploads/avatars';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            //$filePath = $folder . $name;
            // Upload image
            $file = Storage::disk('public')->put('uploads/avatars', $image);
            $fileName = basename($file);
 
            // Set user profile image path in database to filePath
            //$user->avatar = $filePath;
            User::where('id', $id)->update([
                'avatar' => $fileName
            ]);
        }
        // Persist user record to database
        return Redirect()->back()->with('message', 'Avatar guardado con exito');
    }
    public function destroy($id)
    {
        //
    }
}

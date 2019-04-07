<?php

namespace mybusllc\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use mybusllc\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Autenticacion
     *
     * 
     */
    public function autenticar(Request $request)
    {   
       $email=$request->usuario;
       $password=$request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {   
            //Auth::login();
            return response()->json(['message' => 'Ok', 'error'=>false]);
        }

        return response()->json(['message' => 'Error', 'error'=>true]);

    }


     public function logout(Request $request)
    {   
        Auth::logout();
        return response()->json(['message' => 'Ok', 'error'=>false]);

    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])){
            return response()->json(['message' => 'Ok', 'error'=>false]);
        }else{
            return response()->json(['message' => 'Error', 'error'=>true]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the all users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::all();

        return response()->json(['error'=>false, 'data'=>$users]);

    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password=Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Ok', 'error'=>false]);
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
        //
    }

    /**
     * Remove the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return response()->json(['message' => 'Ok', 'error'=>false]);
    }
}

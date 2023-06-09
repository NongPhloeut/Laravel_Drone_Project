<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $users = UserResource::collection($users);
        return response()->json(['success'=>true, 'data'=>$users],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       
        $user = User::store($request);
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => 'The record with ID ' . $id . ' was not found.'], 404);
        }
        $user = new ShowUserResource($user);
        return response()->json(['success' =>true, 'data' => $user],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        $user = User::store($request,$id);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => 'The record with ID ' . $id . ' was not found.'], 404);
        }
        $user->delete();
        return response()->json(['success' =>true, 'message' => 'Data delete successfully','data'=>$user],200);
    }
}

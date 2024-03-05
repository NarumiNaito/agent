<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;


// public function index(Request $request)
// {    
//     $user_id = Auth::id(); 
//     $users = User::where('id', $user_id)
//     ->select('name','email','password','tel','postcode','address','detail','created_at','updated_at')
//     ->get();

//     return Inertia::render('Profile/Index',[
//         'users' =>$users,
//         // 'user_id' =>$user_id
//     ]);
// }


// public function show(Request $request)
// {
    
//     $users = User::searchUsers($request->search)
//     ->select('id','name','tel','postcode','address','detail','created_at','updated_at')
//     ->orderBy('created_at','desc')
//     ->paginate(10);   
    
// // dd($users);

//     return Inertia::render('Profile/Show',[
//         'users' => $users,            
//     ]);
// }


class ProfileController extends Controller
{
    

    public function index(Request $request)
    {    
        $users = User::searchUsers($request->search)
        ->select('id','name','tel','postcode','address','detail','created_at','updated_at')
        ->orderBy('created_at','desc')
        ->paginate(10);   
        
    // dd($users);

        return Inertia::render('Profile/Index',[
            'users' => $users,            
        ]);
    }


    public function show(Request $request)
    {
        
        $user_id = Auth::id(); 
        $users = User::where('id', $user_id)
        ->select('name','email','password','tel','postcode','address','detail','created_at','updated_at')
        ->get();

        return Inertia::render('Profile/Show',[
        'users' =>$users,
        // 'user_id' =>$user_id
    ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request ): Response
    {
        
        $user_id = Auth::id(); 
        $users = User::where('id', $user_id)
        ->select('id','email','name','tel','postcode','address','detail',)
        ->first();
        
        // dd($request);
        // dd($users);
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $users,
            
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $user ): RedirectResponse
    {

        // dd($user->id);
        $user -> id = $request -> id;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> tel = $request -> tel;
        $user -> postcode = $request -> postcode;
        $user -> address = $request -> address;
        $user -> detail = $request -> detail;

        // $user ->save();

        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        

        return Redirect::route('profile.show')
        ->with([
            'message' => '更新しました' ,
            'status' => 'success' 
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')
        ->with([
            'message' => 'ご利用ありがとうございました' ,
            'status' => 'success' 
            ]); 
    }
}

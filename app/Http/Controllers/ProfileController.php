<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
  
    public function index(User $user)
    {
       $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

       $countPosts = $user->posts->count();

       $countFollowers = $user->profile->followers->count();

       $countFollowing = $user->following->count();


  
        return view('profiles.index', compact('user','follows', 'countPosts', 'countFollowers', 'countFollowing'));
    }
    public function edit(User $user)
    { 
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
       $this->authorize('update', $user->profile);
       $data =  $request->validate([
            'title' => 'required', 
            'description' => 'required', 
            'url' => 'url', 
            'image' =>'',
        ]);
        if($request->image)
        {
            $file = $request->image->store('profile','public');
            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $file]
            )); //array_merge function is margeing 2 arrays together
        }else{
            auth()->user()->profile->update($data);
        }
     
        // auth()->user()->profile->update($data);//de esta forma esta mas protegido
      
        return redirect("/profile/{$user->id}");
    }
}

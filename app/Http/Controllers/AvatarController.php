<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCategoryFormRequest;

class AvatarController extends Controller
{

    public function  findAvatar($email){ /* Function to find the avatar */
        return Avatar::with('user')->where('email',"=", $email)->first();
    }

    public function addAvatarSubmit(CreateCategoryFormRequest $request){ /* Function to charge the avatar in the database */


        $avatars = Avatar::all();

        foreach ($avatars as $avatar){ /* Foreach to know if the email entered is already in the database */
            if($request->email_form==$avatar->email){
                echo "<script language='javascript'>alert('Attention, ce courriel a déjà un avatar, choissisez un autre');</script>";

                return redirect()->route('insertAvatar');
            }
        }

        $auth = Auth::user()->email; /* Charge the user in the variable $auth */

        $users = User::all();
        foreach ($users as $user){ /* To find the id of the user authentified */
            if ($user->email==$auth){
                $user_id=$user->id;
            }
        }
        $url = 'avatar_'.time().'.png'; /* The name of the url for the avatar has the current time */
        $request->image->storeAS('images', $url); /* The image submit in the form is stocked in storage folder */


        $m = new avatar; /* It stores the avatar in the database with the url and the user's identifier */
        $m->user_id = $user_id;
        $m->email = $request->email_form;
        $m->name = $url;
        $m->save();

        $email = $m->email;


        return view('insertAvatarSubmit') /* Return to insertAvatarSubmit table view */
            ->with('email', $email);
    }

    public function downloadAvatar($email) /* Function to show the avatar's image */
    {
        // Find avatar model
        $avatar = Avatar::where('email', '=', $email)->first(); /* Finds the avatar of the email sended */

        if(is_null($avatar) || empty($avatar->name)){
            // Get file path from model
            $avatarFilePath = storage_path('app/public/w.png'); // storage/images/e.png
        }else{
            // Get file path from model
            $avatarFilePath = storage_path('app/images/'.$avatar->name); // storage/images/e.png
        }

        return response()->download($avatarFilePath);
    }

    public function listerAvatars() /* Catch all the avatars linked */
    {
        $auth = Auth::user()->email;

        $users = User::all(); /* Finds all the avatars linked to the user's email */
        foreach ($users as $user){
            if ($user->email==$auth){
                $user_id=$user->id;
            }
        }

        $avatars = Avatar::where('user_id', '=', $user_id)->get();

        return view('listerAvatars') /* Send the avatars to de view */
            ->with('avatars', $avatars);
    }

    public function deleteAvatar($email) /* Drops the avatar row */
    {

        Avatar::where('email', '=', $email)->delete(); /* Query for delete the row */

        echo "<script language='javascript'>alert('Your user has been deleted');</script>";


        return redirect()->route('listerAvatars'); /* Redirects to listerAvatars View */

    }

}

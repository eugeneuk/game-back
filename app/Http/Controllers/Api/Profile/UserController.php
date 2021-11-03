<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailUpdateRequest;
use App\Http\Requests\NameUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Resources\Profile\UserResource;
use App\Http\Traits\ImageTrait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ImageTrait;

    // update Avatar
    public function updateAvatar(Request $request)
    {
        $image = $this->fileBase64Upload($request);

        $request->user()->image = $image['image'];
        $request->user()->save();

        return json_encode([
            'success' => true,
            'image' => $image['image']
        ]);
    }

    // Update Email
    public function updateEmail(EmailUpdateRequest $request)
    {
        if (!Hash::check($request->current_password, $request->user()->password))
            return abort(403);

        $request->user()->email = $request->email;
        $request->user()->save();
        return json_encode([
            'success' => true,
            'email' => $request->user()->email
        ]);
    }

    // Update Password
    public function updatePassword(PasswordUpdateRequest $request)
    {
        if (!Hash::check($request->oldpassword, $request->user()->password))
            return abort(403);

        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        return json_encode([
            'success' => true
        ]);
    }

    // Update name
    public function updateName(NameUpdateRequest $request)
    {
        $request->user()->name = $request->name;
        $request->user()->save();

        return json_encode([
            'success' => true,
            'name' => $request->user()->name,
        ]);
    }


    public function me(Request $request)
    {
        return new UserResource(Auth::user());
    }



}

<?php
namespace App\Services;

use App\Contracts\ProfileServiceInterface;
use Illuminate\Support\Facades\Auth;

class ProfileService implements ProfileServiceInterface
{
    public function getUser($user)
    {
        return $user;
    }

    public function updateUser($user, array $data)
    {
        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
    }

    public function deleteUser($user, $password)
    {
        if (!Auth::validate(['email' => $user->email, 'password' => $password])) {
            abort(403, 'La contraseña es incorrecta.');
        }

        Auth::logout();
        $user->delete();

        session()->invalidate();
        session()->regenerateToken();
    }
}

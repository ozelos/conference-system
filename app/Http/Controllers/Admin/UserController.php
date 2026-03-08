<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        // Jei slaptažodis nepakeistas – išmetame jį
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Naudotojo duomenys atnaujinti sėkmingai.');
    }
}

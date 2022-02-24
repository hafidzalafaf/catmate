<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email', Rule::unique(User::class)],
            'password' => ['required', Password::min(6)->mixedCase()],
            're-password' => ['required', 'same:password', Password::min(6)->mixedCase()],
        ]);

        // ddd($request);
        // ddd($request);

        User::create([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => 'alamat e paino',
            'no_wa' => '089876543210',
            'is_admin' => 1,
            'level' => 'admin',
        ]);

        return redirect()->to(route('admin.table'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->to(route('admin.table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // ddd($user);
        // $user->load('category');
        // $user = User::get();
        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', Rule::unique(User::class)->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($user->id)],
        ]);
        if (isset($request->password)) {
            $request->validate([
                'password' => [Password::min(6)->mixedCase()],
            ]);
        }

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ];
        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        return redirect()->to(route('admin.table'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encyclopedia  $encyclopedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->level != 'root') {
            $user->delete();
            return 'success';
        } elseif ($user->level == 'root') {
            return 'error . # Root can\'t be delet!.';
        }

        // return redirect()->to(route('admin.table'));
    }
}

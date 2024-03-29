<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if ($is_admin) {
            $users = User::all();
        } else {
            $users = User::where('role', 'staff')->get();
            ;
        }


        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $request['password'] = Hash::make($request['password']);

        $userLogin = Auth::user();
        $is_admin = $userLogin->is_admin;
        if ($is_admin) {
            $user->create($request->all());
        } else {
        }

        return redirect()->route('user.index')
            ->with('success', 'User Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $userLogin = Auth::user();
        $is_admin = $userLogin->is_admin;
        if ($is_admin) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if (!empty($request['password'])) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
        } else {
            if ($request->hasFile('ktp')) {
                // Delete old image
                Storage::disk('public')->delete('images/fotoktp/' . $user->ktp);
                // Upload new image
                $file = $request->file('ktp');
                $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('images/fotoktp/', $file, $path);

                // Update product with new image path
                $user->ktp = $path;

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'ttl' => $request->ttl,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->email,
                    'ktp' => $path
                ]);

                if (!empty($request['password'])) {
                    $user->update([
                        'password' => Hash::make($request->password),
                    ]);
                }
            }
        }

        return redirect()->route('user.index')
            ->with('success', 'User Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User Delete Successfully.');
    }
}
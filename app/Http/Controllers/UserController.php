<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index()
{
    $users = User::all();
    return view('users-data.index', compact('users'));
}

public function create()
{
    return view('users-data.create');
}

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_user' => 'required|unique:users,id_user|max:20|min:5',
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'role' =>'required',
        ],[
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal berisi :min character',
            'id_user.required' => 'ID User wajib diisi',
            'id_user.unique' => 'ID User sudah ada',
            'id_user.max' => 'ID User maksimal berisi :max character',
            'id_user.min' => 'ID User minimal berisi :min character',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal berisi :min character',
            'role.required' => 'Role wajib diisi',
        ]);
        $data = ([
            'id_user' => $request->id_user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if($user = User::create($data)){
            if($request->role === 'admin'){
                $user->assignRole('admin');
            } elseif($request->role === 'operator'){
                $user->assignRole('operator');
            } elseif($request->role === 'staff'){
                $user->assignRole('staff');
            }
            return redirect()->route('user.index')->with('success', "Data user ".$data['name']." berhasil disimpan!");
        } else{
            return redirect()->back();
        }
    }


    public function edit(string $id)
    {
        $user =  User::findOrFail($id);
        return view('users-data.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request ,[
            'name' => 'required|min:5',
            'email' => 'required|unique:users,password,'.$user->id,
            'role' =>'required',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal berisi :min character',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah ada',
            'role.required' => 'Role wajib diisi',
        ]);

        // dd($request->all());

        // update hanya berdasarkan findorfail id
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if($user->update()){
            if($request->role === 'admin'){
                $user->syncRoles('admin');
            }elseif($request->role === 'staff'){
                $user->syncRoles('staff');
            }elseif($request->role === 'operator'){
                $user->syncRoles('operator');
            }
            return redirect()->route('user.index')->with('success','Data user '.$user->name.' berhasil diedit!');
        }
    }

    public function destroy(string $id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success-delete','Data user '.$user->name.' berhasil dihapus!');
    }
}

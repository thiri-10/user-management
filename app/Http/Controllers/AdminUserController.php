<?php

namespace App\Http\Controllers;

use App\Models\Admin_user;
use App\Http\Requests\StoreAdmin_userRequest;
use App\Http\Requests\UpdateAdmin_userRequest;
use App\Models\Role;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Policies\AdminUserPolicy;


class AdminUserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorizeResource('viewAny', Admin_user::class);

        $users = Admin_user::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where('name', 'Like', '%'.$keyword.'%');
        })
            ->when(request()->has('sort'), function ($query) {
                $sortType = request()->sort ?? 'asc';
                $query->orderBy('name', $sortType);
            })->paginate(10)->withQueryString();

            if($users)
            {
                return view('Users.index', compact('users'));
            }
            else{
                return view('Users.index')->with('No user yet');
            }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorizeResource('create', Admin_user::class);
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdmin_userRequest $request)
    {
        $this->authorizeResource('create', Admin_user::class);
         
         $user = new Admin_user();
        //  $prefix = $request->prefix ;
        //  $fName = $request->name;
        //  $lName = $request->lname;
        //  $user->name = $prefix+'.'+ $fName+$lName;
        $user->name = $request->name;
         $user->username = $request->username;
         $user->role_id = $request->role_id;

         $user->phone = $request->phone;

         $user->email = $request->email;
         $user->address = $request->address;
         $user->password = Hash::make($request->password);

         $user->gender = $request->gender;
         $user->is_active = $request->has('is_active') ? true : false;
       
         $user->save();
         return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin_user $admin_user,$id)
    {
        $this->authorizeResource('view', $admin_user);

        $user = Admin_user::findOrFail($id);
        return view('Users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin_user $admin_user,$id)
    {
        $this->authorizeResource('update', $admin_user);
        
        $user = Admin_user::findOrFail($id);
        return view('Users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdmin_userRequest $request,$id,Admin_user $admin_user)
    {
        $this->authorizeResource('update', $admin_user);

        $adminUser = Admin_user::findOrFail($id);
        
        $adminUser->name = $request->name;
        $adminUser->username = $request->username;
        $adminUser->role_id = $request->role_id;

        $adminUser->phone = $request->phone;
        $adminUser->email = $request->email;
        $adminUser->address = $request->address;
        $adminUser->password = Hash::make($request->password);
        $adminUser->gender = $request->gender;
        $adminUser->is_active = $request->is_active;

        $adminUser->update();
        return redirect()->route('user.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin_user $admin_user,$id)
    {
        $this->authorizeResource('delete', $admin_user);
        
        $admin_user = Admin_user::findOrFail($id);
        if($admin_user)
        {
            $admin_user->delete();
            return redirect()->back();
        }
        
    }
}

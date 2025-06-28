<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Faker\Factory;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        //  $users = DB::select('select * from users order by id asc limit 10 offset 10');

        $users = DB::table('users')->paginate(10);

        return view('users/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $inputs = $request->all();
        $time = Carbon::now();
        $allData = $request->safe()->merge($inputs)->merge([
            'created_at' => $time
        ])->except(['_token', '_method', 'password_comfirmation']);

        DB::table('users')->insert($allData);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')->find($id);

        return view('users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersUpdateRequest  $request, string $id)
    {
        $inputs = $request->all();

        $allData = $request->safe()->merge($inputs)->except(['_token', '_method', 'password_comfirmation']);

        DB::table('users')->where('id', $id)->update($allData);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back();
    }


    public function created_dummy_users(Request $request)
    {
        $fake = Factory::create();


        for ($i = 0; $i < 100; $i++) {

            DB::table('users')->insert([

                'name' => $fake->name,
                'email' => $fake->email,
                'password' => Hash::make($fake->password(8)),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),


            ]);
        }
        return redirect()->back();


        // $users = Storage::disk('public')->get('users.json');
        // $datas = json_decode($users, true);
        // $time = Carbon::now();

        // foreach ((array)$datas  as $user) {
        //     DB::table('users')->insertOrIgnore([
        //         'name' => $user['name'],
        //         'email' => $user['email'],
        //         'password' => Hash::make($user['email']),
        //         'created_at' => $time->addHour(),
        //         'updated_at' => $time->addHour(),
        //     ]);
        // }

        // return redirect()->back();
    }


    public function delete_dummy_users()
    {
        DB::table('users')->truncate();

        return redirect()->back();
    }
}

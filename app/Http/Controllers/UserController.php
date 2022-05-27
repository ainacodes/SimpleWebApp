<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $req)
    {
        //return $req -> all();

        $user= User::where(['email'=>$req->email])->first();
        $password= User::where(['password'=>$req->password])->first();

        //return 'User:' . $user . '<br>Password:' . $password;

        if(!$user || !$password)
        {
            //return "Username or password is not matched";
            return back()->with('success', 'Username or password is not matched');
        }
        else
        {
            $req->session()->put('user', $user);
            return redirect('/');
        }

    }

    function getuser(Request $req)
    {
        $data= DB::table('users')
        //->join('table2','table2.id', '=','user.id')
        ->where('id', $req->rid)
        ->first();

        return view('edituser', ['users'=>$data]);
    }   
        
    function edituser(Request $req) 
    {
        DB::table('users')->where('id', $req->rid)
        ->update(array(
            'name' => $req->fullname,
            'password' => $req->password,
            'email' => $req->email,
            //'updated_at' => now() //--> this one is php punya time
            'updated_at' => DB::raw('now()') // --> this one from mySQL
        ));

        /*
        catch (\Exception) {
            return redirect('editmyuser?rid='.$req->rid.'&success=2');
        }
        */  
          
        //return redirect('editmyuser?rid='.$req->rid.'&success=1');
        return redirect('/userlist')->with('success', 'You have edited successfully!');
    }

    function register(Request $req)
    {
        //return $req->input();
        //try {
            DB::insert('insert into users
            (name, email, password, created_at) values (?,?,?,?)',
            [$req->fullname,$req->email,$req->password, now()]);
        /*
        }
        
        catch (\Exception) {
            return "Failed to register!";
        }
        */
        //return "Successfully register";
        // return back()->with('success', 'You have registered successfully! Please verify your email address.');
        return redirect('/')->with('success', 'You have registered successfully! Please verify your email address.');

    }

    

    function listuser()
    {
        //return view('listuser',['listofuser' => DB::table('users')->paginate(3)]);
    }

    function search (Request $req) 
    {
        return view('listuser',['listofuser' => DB::table('users')
        ->select(DB::raw('id, name, email, password, created_at'))
        ->where('email', 'like', '%' . $req->search . '%')
        ->orWhere('name', 'like', '%' . $req->search . '%')->paginate(15)]
    );
    }

    function deleteuser(Request $req)
    {
        //return $req->input():
        DB::table('users')->where('id', $req->rid)->delete();
        //return "Successfully deleted";
        return back()->with('success', 'You have deleted successfully!');

    }

}
<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use function PHPUnit\Framework\returnSelf;
class authenticationController extends Controller
{
    public function newLogin()
    {
        return view('Authenticaiton/login');
    }
    public function submitLogin(Request $request)
    {
       $validate=$request->validate([
            "Email"=>"required|email",
            "Password"=>"required"
       ]);
       $cridential= DB::table('authentication')->get();
       if($cridential[0]->username==$request->Email)
       {
            if($cridential[0]->password==$request->Password)
            {
                session()->put('username',$request->Email);
                return redirect('/allMaterials');
            }
            else{
                return redirect('/invalidCredintial')->with('status','پاسورد  غلط ده!!');
            }
       }
       else
       {
        return redirect('/invalidCredintial')->with('status','ایمیل غلط ده!!');
       }
    }
    public function invalidCredintial()
       {
          return view('Authenticaiton/loginError');
       }
       public function logout()
       {
            session()->forget('username');
            return redirect('/');
       }
}

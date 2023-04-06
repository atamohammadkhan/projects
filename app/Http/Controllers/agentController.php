<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;
use App\Models\material;
use App\Models\bill;
use App\Models\agent;
use PDF;
use illuminate\Http\Response;

class agentController extends Controller
{
    public function newAgent()
    {
        $departments= DB::table('departments')->get();
        return  view("Agents/newAgent",compact('departments'));
     }


     public function addAgent(Request $request)
    {
       //Validator::make($request->all(),[

        $validator = $request->validate([
        'name'=>'required | max:50',
        'fName'=>'required',
        'jobTitle'=>'required',
        'department'=>'required',
        'phone'=>'required',
       ]);

        $agent = new agent();
        $agent->name = $request->name;
        $agent->fName = $request->fName;
        $agent->jobTitle = $request->jobTitle;
        $agent->departmentID = $request->department;
        $agent->phone = $request->phone;
        $agent->save();
        return redirect('agentIndex')->with('status',' معلومات اضافه شول!!!' );
    }


    public function index()
    {
        $agents=DB::table('agents')->join('departments','agents.departmentID','departments.id')->select('agents.id as id','agents.name as name','agents.fName as fName','agents.jobTitle as jobTitle','agents.phone as phone','departments.name as department')->get();
        return view("Agents/index",compact('agents'));
    }
    public function searchAgent(Request $req)
    {
        $agents=DB::table('agents')->join('departments','agents.departmentID','departments.id')->where('agents.name','LIKE',"%{$req->search}%")->select('agents.id as id','agents.name as name','agents.fName as fName','agents.jobTitle as jobTitle','agents.phone as phone','departments.name as department')->get();
        return view('Agents/searchAgent',compact('agents'));
    }

    public function delAgent($id)
    {

        $id = $_GET['id'];

        DB::table('agents')->where('id',$id)->delete();
       // return response()->json(['status'=>200]);
        return Response()->json(['status'=>200]);
     }

    public function editAgent($id)
    {
        $departments= DB::table('departments')->get();
        $agents=DB::table('agents')->join('departments','agents.departmentID','departments.id')->select('agents.id as id','agents.name as name','agents.fName as fName','agents.jobTitle as jobTitle','agents.phone as phone','departments.name as department','agents.departmentID as department')
        ->where('agents.id',$id)
        ->get();
        return  view("Agents/editAgent",compact('departments','agents'));
     }
    public function updateAgent(Request $req)
    {
        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'fName'=>'required',
            'jobTitle'=>'required',
            'department'=>'required',
            'phone'=>'required',
           ]);
                    DB::table("agents")
                    ->where('agents.id',$req->id)
                    ->update([
                    'name' => $req->name,
                    'fName' => $req->fName,
                    'jobTitle' => $req->jobTitle,
                    'phone' => $req->phone,
                    'departmentID' => $req->department,
                ]);
                return redirect('/agentIndex')->with('status','  ریکارد تغیر شو!!!');
        }

    }


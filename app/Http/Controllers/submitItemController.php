<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;
use App\Models\material;
use App\Models\bill;
use App\Models\agent;
use App\Models\submitItems;
use illuminate\Http\Response;
use PDF;
use function PHPUnit\Framework\returnSelf;
class submitItemController extends Controller
{
    public function newSubmission(){ 
        $agents= DB::table('agents')->get();
        $materials=DB::table ('materials')->get();
        $types= DB::table('types')->get();
        $category=DB::table('category')->get();
        $units=DB::table('units')->get();
        $stocks=DB::table ('stock')->get();
        $departments=DB::table ('departments')->get();
        return view("submitItems/newSubmission",compact('departments','agents','materials','types','category','units','stocks'));
     }
     function getAgents($id)
     { 
         $id = $_GET['id'];
         $res= DB::table('agents')->get();
          $res= DB::table('agents')->join('departments','agents.departmentID','departments.id')
         ->where('agents.id',$id)
         ->select('agents.id as id','agents.name as name','agents.fName as fName','agents.jobTitle as jobTitle','agents.phone as phone','departments.name as department')
         ->get();
         return Response()->json($res);
     }
     function getItems($id)
     { 
         $id = $_GET['id'];
      $res=DB::table('materials')
      ->join('category','category.id','materials.categoryID')
      ->join('types','types.id','materials.typeID')
      ->join('units','units.id','materials.unitID')
      ->join('stock','stock.id','materials.stockID')
      ->select('materials.id as id','materials.name as name','types.name as type','category.name as category','stock.name as stock','units.name as unit','materials.quantity as quantity','materials.consideration as consideration')
      ->where('materials.id',$id)
      ->get();
         return Response()->json($res);
     }
     public function addSubmission(Request $req)
     {
        $validator=Validator::make($req->all(),[
            'agentID'=>'required',
            'id'=>'required',
            'reqQuantity'=>'required',
            'date'=>'required',
           ]); 
            DB::table('submission')->insert(['agentID'=>$req->agentID,'date'=>$req->date]);
            $record= DB::table('submission')->latest("id")->first();

            $submissionID= $record->id;
            foreach ($req->id as $key => $value) {
               
                $availableItems=DB::table('materials')->where('materials.id',$req->id[$key])->pluck('quantity')->first();
                $required= $req->reqQuantity[$key];
                if($availableItems >= $req->reqQuantity[$key])
                {    
                $itemsLeft= $availableItems-$required;
                DB::table('materials')
                ->where('id',$req->id[$key])
                ->update(['quantity'=>$itemsLeft]);
                         
                $item = new submitItems();
                DB::table('items')->insert([
                    'materialID'=>$req->id[$key],
                    'submissionID'=>$submissionID,
                    'quantity'=>$req->reqQuantity[$key]
                ]);
                }   
                else {
                    DB::table('submission')->where('id',$submissionID)->delete();
                    DB::table('items')->where('submissionID',$submissionID)->delete();
                    return "اندازه زیات است";
                }
        }
         return redirect('/submitIndex')->with('status','  ریکارد اضافه شد!!!');
     }
     public function index()
     {
        $agents=DB::table('agents')->get();
        $records=DB::table('submission')->get();
        return view('submitItems/index',compact('records','agents'));
     }

     public function deleteSubmission($id)
     {
         DB::table('submission')->where('submission.id',$id)->delete(); 
         DB::table('items')->where('items.submissionID',$id)->delete();       
         return redirect('/submitIndex')->with('status',' ریکارد لغوه شد!!!' );
     }

     public function details($id)
     {
        $records=DB::table('submission')
        ->join('agents','agents.id','submission.agentID')
        ->join('items','items.submissionID','submission.id')
        ->join('materials','materials.id','items.materialID')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->where('submission.id',$id)
        ->select('submission.id as id','agents.name as agentName','submission.date as date','submission.agentID as agentID','materials.name as name','types.name as type','category.name as category','stock.name as stock','units.name as unit','items.quantity as quantity')
        ->get();
        return view('submitItems/details',compact('records'));
    }

    public function downloadPDF($id)
    {
        $records=DB::table('submission')
        ->join('agents','agents.id','submission.agentID')
        ->join('items','items.submissionID','submission.id')
        ->join('materials','materials.id','items.materialID')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->where('submission.id',$id)
        ->select('submission.id as id','agents.name as agentName','submission.date as date','submission.agentID as agentID','materials.name as name','types.name as type','category.name as category','stock.name as stock','units.name as unit','items.quantity as quantity')
        ->get();
        
        $pdf = new \Mpdf\Mpdf(['mode' => 'UTF-8','format' => 'A4', 'autoScriptToLang' => true, 'autoLangToFont' => true]);
        $pdf->SetDirectionality('rtl');
        $view = view('submitItems/print', compact('records'))->render();
        $pdf->WriteHtml("");
        $pdf->WriteHtml($view);
        return $pdf->Output('records.pdf','I');
    }
}

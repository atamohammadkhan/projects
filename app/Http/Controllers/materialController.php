<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;
use App\Models\material;
use App\Models\bill;
use Barryvdh\DomPDF\Facade\Pdf;

class materialController extends Controller
{
    public function newMaterial(){
        $types= DB::table('types')->get();
        $category=DB::table('category')->get();
        $units=DB::table('units')->get();
        $stocks=DB::table ('stock')->get();
        return  view("Materials/addMaterials",compact('types','category','units','stocks'));
     }
    public function Store(Request $request)
    {
       $validator=Validator::make($request->all(),[
        'name'=>'required',
        'unit'=>'required',
        'category'=>'required',
        'type'=>'required',
        'scan'=>'required',
        'billNumber'=>'required',
        'quantity'=>'required',
        'stock'=>'required',
        'consideration'=>'required',
       ]);
        $bill = new bill();
        $scan = $request->scan;
        if ($scan) {
            $img_name = time() . '.' . $scan->getClientOriginalExtension();
            $scan->move('BillFile', $img_name);
            $bill->scan = $img_name;
        }
        $bill->id=$request->billNumber;
        $bill->date=$request->date;
        $bill->save();
        foreach ($request->name as $key => $value) {
            $item = new material();
            $item = material::where('name', $request->name[$key])->first();
            if ($item) {
                $item->quantity += $request->quantity[$key];
            }
            else {
                $item = new material();
                $item->quantity = $request->quantity[$key];
                $item->name = $request->name[$key];
                $item->categoryID = $request->category[$key];
                $item->unitID = $request->unit[$key];
                $item->typeID = $request->type[$key];
                $item->stockID = $request->stock[$key];
                $item->billID = $request->billNumber;
                $item->consideration = $request->consideration[$key];
                $item->save();
            }
        }
             return redirect('/allMaterials')->with('status','رکارد اضافه شو !!');
    }
    //index of bills
    public function index()
    {
        $records= DB::table('bills')->select('bills.id as billID','bills.date as date')->get();
        $materials=DB::table('materials')->join('bills','bills.id','materials.billID')->select('bills.id as billID','bills.date as date','materials.id as id','materials.billID as bill','materials.name as name')->get();
        return view("Materials/index",compact('records','materials'));
    }
    public function editBill($id)
    {
        $category= DB::table('category')->get();
        $types=DB::table('types')->get();
        $stocks=DB::table('stock')->get();
        $units=DB::table('units')->get();

        $records=DB::table('bills')
        ->join('materials','bills.id','materials.billID')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->where('bills.id',$id)
        ->select('bills.id as billNumber','bills.date as date','bills.scan as scan','materials.id as id','materials.name as name','materials.typeID as type','materials.categoryID as category','materials.stockID as stock','materials.unitID as unit','materials.quantity as quantity','materials.consideration as consideration')
        ->get();
        return view('Materials/editBill',compact('records','category','units','stocks','types'));
    }
    public function updateBill(Request $req)
    {
            $validator=Validator::make($req->all(),[
            'id'=>'required',
            'name'=>'required',
            'unit'=>'required',
            'category'=>'required',
            'type'=>'required',
            'scan'=>'required',
            'billNumber'=>'required',
            'quantity'=>'required',
            'stock'=>'required',
            'consideration'=>'required',
           ]);
            $scan = $req->scan;
            $image=$req->file;
            if ($scan != "" && $scan != $req->file) {
                $img_name = time() . '.' . $scan->getClientOriginalExtension();
                $scan->move('BillFile', $img_name);
                $image = $img_name;
            }
            DB::table('bills')->where('bills.id',$req->billNumber)->update(['date'=>$req->date,'scan'=>$image]);
            DB::table('materials')->join('bills','bills.id','materials.billID')->where('materials.billID',$req->billNumber)->delete();
            foreach ($req->name as $key => $value) {

                    DB::table("materials")
                    ->insert([
                    'name' => $req->name[$key],
                    'categoryID'=>$req->category[$key],
                    'unitID'=> $req->unit[$key],
                    'typeID'=>$req->type[$key],
                    'stockID'=>$req->stock[$key],
                    'billID' => $req->billNumber,
                    'quantity'=>$req->quantity[$key],
                    'consideration' => $req->consideration[$key]]);
         }
                  return redirect('/index')->with('status','  ریکارد اپدیت شد!!!');
    }
    public function allMaterials()
    {
        $records=DB::table('materials')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->select('materials.id as id','materials.name as name','types.name as type','category.name as category','stock.name as stock','units.name as unit','materials.quantity as quantity','materials.consideration as consideration')
        ->get();
        return view('Materials/allMaterials',compact('records'));
    }
    public function searchMaterials(Request $req)
    {
        $records=DB::table('materials')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->select('materials.id as id','materials.name as name','types.name as type','category.name as category','stock.name as stock','units.name as unit','materials.quantity as quantity','materials.consideration as consideration')
        ->where('materials.name',$req->search)
        ->get();
        return view('Materials/searchMaterials',compact('records'));
    }
    public function viewMaterials($billID)
    {
        $records=DB::table('bills')
        ->join('materials','materials.billID','bills.id')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->where('bills.id',$billID)
        ->select('bills.id as billNumber','bills.date as date','materials.name as name','bills.scan as scan','types.name as type','category.name as category','stock.name as stock','units.name as unit','materials.quantity as quantity','materials.consideration as consideration')
        ->get();
        return view('Materials/viewBillMaterials',compact('records'));
    }
    public function deleteBill($id)
    {
        DB::table('bills')->where('id',$id)->delete();
        return redirect('index');
    }
    public function downloadPDF($billID)
    {
        $records=DB::table('bills')
        ->join('materials','materials.billID','bills.id')
        ->join('category','category.id','materials.categoryID')
        ->join('types','types.id','materials.typeID')
        ->join('units','units.id','materials.unitID')
        ->join('stock','stock.id','materials.stockID')
        ->where('bills.id',$billID)
        ->select('bills.id as billNumber','bills.date as date','bills.scan as scan','materials.name as name','types.name as type','category.name as category','stock.name as stock','units.name as unit','materials.quantity as quantity','materials.consideration as consideration')
        ->get();
        $pdf = new \Mpdf\Mpdf(['mode' => 'UTF-8','format' => 'A4', 'autoScriptToLang' => true, 'autoLangToFont' => true]);
        $pdf->SetDirectionality('rtl');
        $view = view('Materials/print', compact('records'))->render();
        $pdf->WriteHtml("");
        $pdf->WriteHtml($view);
        return $pdf->Output('records.pdf','I');
    }
    public function searchBill(Request $req)
    {
        $bills= DB::table('bills')->where('bills.id',$req->input('search'))->first();
        $materials=DB::table('materials')->join('bills','bills.id','materials.billID')->select('materials.*')->get();
        return view('Materials/searchBill',compact('bills','materials'));
    }


}

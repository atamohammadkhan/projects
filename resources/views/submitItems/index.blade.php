@extends('test1')
@section("search")
<div  style="direction:rtl;">
        <form action="{{route('searchBill')}}" method="post" class="d-flex" >
            @csrf
            <input type="text" name="search" name="search" id="" class="form-control " style="width: 150px;margin-top:15px">
            <input type="submit" value="جستجو"  class="btn btn-outline-success" style="margin-right:30px;margin-top:18px;">
         </form>
</div>
@endsection

@section('contents')
<div class="row mt-5" style="direction: rtl;">
    @if(session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>تشکر </strong> {{session('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="row mt-5" style="direction: rtl;">
    <div class="col-sm-4" style="margin-bottom: 20px;">
        <a href="/newSubmission"><input type="button" class="btn btn-primary" value="  اضافه کردن"></a> 
    </div>
</div>
 <table class="table table-striped center table-responsive " style="text-align:center;direction:rtl;"  >
     <tr style="background-color: lightblue; text-align:center;">
         <th>  شماره بیل</th>
         <th> نام معتمد</th>
         <th>تاریخ</th>
         <th colspan="2"> 
            انجام دادن
         </th>
       
     </tr>
     
    @foreach ($records as  $record)
        <tr>

            <td>{{$record->id}}</td>
            <td>
                @foreach($agents as $agent)
                    @if($record->agentID==$agent->id)
                        {{$agent->name}}
                    @endif
                @endforeach
            </td>
          
            <td>{{$record->date}}</td> 
            <td colspan="2" style="text-align:center;">
            <a href="{{url('deleteSubmission/'.$record->id)}}" title="Delete Entry" class="btn btn-danger"><img src="{{asset('delete.png')}}" alt="Error" width="20" height="20"></a>
            <a class="btn btn-primary" href="#" ><img src="{{asset('edit.png')}}" alt="Error" width="20" height="20"></a>
            <a class="btn btn-primary" href={{"details/".$record->id}} ><img src="{{asset('info.png')}}" alt="Error" width="20" height="20"></a>
         </td>  
        </tr>
       @endforeach
</table>

@endsection
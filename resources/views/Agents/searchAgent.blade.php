@extends('Layout/master')
@section("search")

<div  style="direction:rtl;">
        <form action="{{route('searchAgent')}}" method="post" class="d-flex" >
            @csrf
            <input type="text" name="search" name="search" id="" class="form-control " style="width: 150px;">
            <input type="submit" value="جستجو"  class="btn btn-outline-success" style="margin-right:30px;">
         </form>
</div>
@endsection

@section('contents')
<div class="row mt-5">
    <div class="col-sm-4" style="margin-bottom: 50px;">
        <a href="/agentIndex"><input type="button" class="btn btn-primary" value=" صفحه اصلی" ></a> 
    </div>
</div>
 <table class="table table-striped center table-responsive " style="text-align:center;direction:rtl;"  >
     <tr style="background-color: lightblue; text-align:center;">
         <th>نام معنتمد </th>
         <th>نام پدر</th>
         <th>وظیفه</th>
         <th>ریاست</th>
         <th>شماره تلفن</th>
         <th colspan="2"> 
            انجام دادن
         </th>
     </tr>
    @foreach ($agents as  $agent)
        <tr>
            <td>{{$agent->name}}</td>
            <td>{{$agent->fName}}</td> 
            <td>{{$agent->jobTitle}}</td>
            <td>{{$agent->department}}</td>
            <td>{{$agent->phone}}</td>
            <td colspan="2" style="text-align:center;">
            <a href={{"deleteAgent/".$agent->id}} class="btn btn-danger"><img src="{{asset('delete.png')}}" alt="Error" width="20" height="20"></a>
            <a class="btn btn-primary" href={{"editBill/".$agent->id}} ><img src="{{asset('edit.png')}}" alt="Error" width="20" height="20"></a>
         </td>  
        </tr>
       @endforeach
</table>

@endsection
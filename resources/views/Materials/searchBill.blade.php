@extends('test1')
@section("search")
<div  style="direction:rtl;">
        <form action="{{route('searchBill')}}" method="post" class="d-flex" >
            @csrf
            <input type="text" name="search" name="search" id="" class="form-control " style="width: 150px;">
            <input type="submit" value="Search"  class="btn btn-outline-success" style="margin-right:30px;">
         </form>
</div>
@endsection
@section('contents')
 <table class="table table-striped center; " style="direction:rtl;"  >
     <tr style="background-color: lightgray;">
         <th>بل نمبر</th>
         <th>اجناس</th>
         <th>تاریخ</th>
         <th>
         <a href="/billDetails" style="text-decoration: none; " class="text text-primary" >نوی</a>
         </th>
     </tr>
        <tr>
            <td>{{$bills->id}}</td>
            <td>
                @foreach($materials as $item)
                    @if($item->billID==$bills->id)
                    {{$item->name}}/
                    @endif

                @endforeach
            </td>
            <td>{{$bills->date}}</td>
            <td>
            <a href={{"deleteBill/".$bills->id}} class="btn btn-danger">دیلیت</a>
            <a class="btn btn-primary" href={{"viewMaterials/".$bills->id}} >معلومات</a>
         </td>
        </tr>
</table>
@endsection

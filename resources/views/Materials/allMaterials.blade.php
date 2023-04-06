@extends('test1')
@section("search")
<div  style="direction:rtl;">
        <form action="{{route('searchMaterials')}}" method="post" class="d-flex" >
            @csrf
            <input type="text" name="search" name="search" id="" class="form-control "style="width: 150px;margin-top:15px">
            <input type="submit" value="پلټل"  class="btn btn-outline-success" style="margin-right:30px;margin-top:18px; ">
         </form>
</div>
@endsection

@section('contents')
<div class="row mt-5" style="direction: rtl;">
    <div class="col-sm-4" style="margin-bottom: 20px;">
        <a href="/newMaterial"><input type="button" class="btn btn-primary" value="اضافه کول"></a>
    </div>
</div>
 <table class="table table-striped center table-responsive " style="direction:rtl;"  >
     <tr style="background-color: lightgray;">
        <th>شماره</th>
         <th>د جنس نوم</th>
         <th>د جنس نوعه</th>
         <th>کتګوری</th>
         <th>تعداد</th>
         <th>ډیپو</th>
         <th>ملاحظات</th>
     </tr>
     <?php $count=1; ?>
    @foreach ($records as  $record)
        <tr>
            <td>{{$count}}</td>
            <td>{{$record->name}}</td>
            <td>{{$record->type}}</td>
            <td>{{$record->category}}</td>
            <td>{{$record->quantity}}</td>
            <td>{{$record->stock}}</td>
            <td>{{$record->consideration}}</td>
        </tr>
        <?php $count++; ?>
       @endforeach
</table>

@endsection

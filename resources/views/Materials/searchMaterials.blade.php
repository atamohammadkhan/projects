@extends('test1')
@section('contents')
<div class="row mt-5" style="margin-bottom: 20px; direction:rtl;" >
    <div class="col-sm-4">
    <a href="/allMaterials"><input type="button" class="btn btn-primary" value="صفحه اصلی"></a>
    </div>
    <div class="col-sm-4"  >

    </div>
    <div class="col-sm-4"></div>
</div>
 <table class="table table-striped center table-responsive " style="direction:rtl;"  >
     <tr style="background-color: lightgray;">
        <th>شماره</th>
         <th>د جنس نوم</th>
         <th>نوع</th>
         <th>کټګوری</th>
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
            <td>
            <a href={{"deleteBill/".$record->id}} class="btn btn-danger">دیلیت</a>
            <a class="btn btn-primary" href={{"viewMaterials/".$record->id}} >معلومات</a>
         </td>
        </tr>
        <?php $count++; ?>
       @endforeach
</table>
@endsection

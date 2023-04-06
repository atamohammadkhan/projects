<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <link rel="stylesheet" href={{asset('/bootstrap5/css/bootstrap.min.css')}}>
    <style>
      thead tr{
        color:red;
        font-size: 18px;
      }
    </style>
</head>
<body>




    <table class="table table-borderles w-100" style="width: 100%;">
        <tr >
        <th style=" text-align: right;">
                 د بل نمبر :  {{$records[0]->billNumber}}
            </th>
            <th style=" text-align: center;" >
                تاریخ : {{$records[0]->date}}
            </th>
            <th style=" text-align: center; vertical-align: center;">
              <a href={{"/downloadPDF/".$records[0]->billNumber}}>
              </a>
            </th>
        </tr>
</table>
  <table class="table  center w-100" style="width: 100%;">
    <thead>
    <tr style="background-color: lightgray;">
         <th>جنس </th>
         <th>نوعیت</th>
         <th>واحد</th>
         <th>تعداد</th>
         <th>کټګوری</th>
         <th>ډیپو</th>
         <th>ملاحظات</th>
     </tr>
    </thead>
    <tbody>
    @foreach ($records as  $record)
        <tr>
            <td>{{$record->name}}</td>
            <td>{{$record->type}}</td>
            <td>{{$record->unit}}</td>
            <td>{{$record->quantity}}</td>
            <td>{{$record->category}}</td>
            <td>{{$record->stock}}</td>
            <td>{{$record->consideration}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href={{asset('/bootstrap5/css/bootstrap.min.css')}}>
</head>
<body>
<div class="card">
  <div class="card-header">
    <table class="table table-borderless" style="direction:rtl; width:100%;" >
        <tr >
        <th style=" text-align: right;">
                
                 نام معتمد :  {{$records[0]->agentName}}
                
            </th>
            <th style=" text-align: center;" >
               
                تاریخ : {{$records[0]->date}}
                
            </th>
           
        </tr>
</table>
  </div>
  <div class="card-body">
  <table class="table table-striped center; " style="direction:rtl;  width:100%;"  >
     <tr style="background-color: lightgray;">
         <th>جنس </th>
         <th>نوعیت</th>
         <th>واحد</th>
         <th>تعداد</th>
         <th>کټګوری</th>
         <th>ډیپو</th>
        
       
     </tr>
    @foreach ($records as  $record)
        <tr>
            <td>{{$record->name}}</td>
            <td>{{$record->type}}</td>
            <td>{{$record->unit}}</td>
            <td>{{$record->quantity}}</td>
            <td>{{$record->category}}</td>
            <td>{{$record->stock}}</td>
           
          
        </tr>
        @endforeach
</table>
  </div>
  

</div>
</div>


</body>
</html>



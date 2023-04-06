
 @extends('test1')

@section('contents') 
<div class="container-fluid"   style="float: right;" >
        <form action="{{route('addSubmission')}}" id="frm" method="post" class="container" enctype="multipart/form-data" style="direction: ltr;">
        @csrf
        <fieldset style="border: 2px solid green; border-radius: 15px;">
        <div class="row mt-5" style="direction: rtl; padding:10px;" >
        <div class="col-sm-3" >
        <div class="form-group">
                <?php $select=" " ?>
                <label for="angenName">نام معتمد    </label>
                       
                <select name="agentName" id="agentName" class="form-control">
                        <option disabled selected >-- انتخاب --</option>
                            @foreach ($agents as $agent)
                                <option   value="{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                        </select>
                </div> <input type="hidden" name="agentID" id="agentID"> 
        </div>
        <div class="col-sm-2" >
                <div class="form-group">
                        <label for="fName" class="form-label">نام پدر </label>
                        <input type="text" name="fName" id="fName" class="form-control" disabled>
                </div>
        </div>
        <div class="col-sm-2" >
                <div class="form-group">
                        <label for="jobTitle" class="form-label"> وظیفه </label>
                        <input type="text" name="jobTitle" id="jobTitle" class="form-control" disabled>
                </div>
        </div>
        <div class="col-sm-2" >
                <div class="form-group">
                        <label for="department" class="form-label"> ریاست </label>
                        <input type="text" name="department" id="department"  class="form-control" disabled>
                </div>
        </div>
        <div class="col-sm-3" >
                <div class="form-group">
                        <label for="phone" class="form-label"> شماره تلفن </label>
                        <input type="text" name="phne" id="phone" class="form-control" disabled>
                </div>
        </div>
    </div>
   
    <div class ="row mt-5" style="direction:rtl;">
                <div class="col-md-4" >
                    <div class="form-group"style="padding:20px 40px;" >
                        <label for="date" class="form-label"  >تاریخ</label>
                        <input type="date" name="date" id="date" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4" >
                
                </div>
                
                <div class="col-md-4" style="position:relative;right:90px;">
                        <div class="form-group">
                                <input type="button" name="add" id="btn1" class="btn btn-primary" value=" اجناس را اضافه کنید" style="margin-bottom:20px;">
                        </div>
                </div>
        </div>
        <div id="div1" class="row">
        
        </div>


<div class=row mt-5" id="div1">

</div>
<div class="row mt-5"  style="direction: rtl; margin-bottom:50px;">
                <div class="col-md-4" style="direction:rtl;" >
                    <div class="form-group" >
                    <input type="reset" value=" پاک کردن" style="position:relative; right: 30px; " class='btn btn-warning' >
                    </div>
                </div>
                <div class="col-md-4" >
                </div>
                <div class="col-md-4" style="direction:ltr;">
                    <div class="form-group" >
                      
                        <input type="submit" value="دخیره کردن" style="position:relative; left: 30px;" class='btn btn-success'>
                    </div>
                </div>
        </div>
        </fieldset>
</form>
</div>

<script>
             var c = 1;
             $(document).ready(function(){
             $('#btn1').click(function(e){
            $('#div1').append('<div class="container" style="direction:rtl;" id="div'+c+'">\
            <fieldset style="border: 1px solid gray; border-radius: 15px; margin:30px; padding:20px;"  >\
            <div class="row mt-5"  style="direction:rtl;margin-top:20px;" >\
                    <div class="form-group col-md-3">\
                    <input hidden type="text" name="id[]" id="id'+c+'" class="form-control">\
                    <label for="itemName"> نام جنس</label>\
                        <select  name="itemName[]" id="itemName'+c+'" class="form-control item"  >\
                        <option disabled selected >-- انتخاب --</option>\
                            @foreach ($materials as $item)\
                                <option value="{{ $item->id }}">{{ $item->name }}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="form-group col-md-3">\
                        <label for="itemType">  نوع جنس</label>\
                        <input type="text" name="itemType" id="itemType'+c+'" class="form-control" disabled>\
                    </div>\
                    <div class="form-group col-md-3">\
                        <label for="itemUnit">واحد جنس</label>\
                        <input type="text" name="itemUnit" id="itemUnit'+c+'" class="form-control" disabled>\
                     </div>\
                    <div class="form-group col-md-3">\
                        <label for="itemCategory"> کتګوری </label>\
                        <input type="text" name="itemCategory" id="itemCategory'+c+'" class="form-control" disabled>\
                    </div>     \
        </div>         \
            <div class="row mt-5"  style="direction:rtl;">\
                    <div class="col-md-3">\
                         <div class="form-group">\
                            <label for="itemQuantity">مقدار</label>\
                            <input disabled type="number" name="itemQuanitity[]" id="itemQuanitity'+c+'" class="form-control">\
                        </div>\
                    </div>\
                    <div class="form-group col-md-2">\
                         <label for="itemStock">دیبو </label>\
                         <input type="text" name="itemStock" id="itemStock'+c+'" class="form-control" disabled>\
                    </div>\
                    <div class="col-md-4">\
                        <div class="form-group">\
                            <label for="itemConsideration" class="form-label"> ملاحظات</label>\
                            <input disabled type="text" name="itemConsideration[]" id="itemConsideration'+c+'" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-md-2">\
                        <div class="form-group">\
                            <label for="reqQuantity" class="form-label"> تعداد درخواست</label>\
                            <input  type="number" name="reqQuantity[]" id="reqQuantity" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-md-1">\
                        <div class="form-group">\
                            <input  type="button" name="remove" id="remove" onclick="removeDiv('+c+')" value="دیلت" class="btn btn-danger" style="margin-top:30px;">\
                        </div>\
                    </div>\
                </div>\
</fieldset>\
                   </div>');
                   c++;
        });
    });
    </script>
    <script>
        $(document).ready(function(){



        $('#frm1').on('submit',function(e){

               $('input').html('');
               $('#billNumber').html('');
             
        })

        });

    </script>
    <script>
         function removeDiv(id){
            $('#div'+id).remove();
        }
    </script>
<script>
    //Fetching Agents
$(document).ready(function(){
        $('#agentName').change(function(){
           var id = $('#agentName').val();
            $.ajax({
              url:'/getAgents/{id}',
              type:'GET',
              data:{id:id},
              dataType: "json",
              success:function(data)
              {
                $.each(data, function(key, agent)
                 {         
                    $('#agentID').val(agent.id);
                    $('#fName').val(agent.fName);
                    $('#jobTitle').val(agent.jobTitle);
                    $('#department').val(agent.department);
                    $('#phone').val(agent.phone);
                });
              }
          });
        });
      });
//Fetching items  
$(document).on("change", ".item" , function() {
    var id = $(this).attr("id");
    var len= id.length;
    var index = parseInt(id.charAt(len-1)); 
           var id = $("#"+id).val();
            $.ajax({
              url:'/getItems/{id}',
              type:'GET',
              data:{id:id},
              dataType: "json",
              success:function(data)
              {
                $.each(data, function(key, item)
                 {         
                    $('#id'+index).val(item.id);
                    $('#itemType'+index).val(item.type);
                    $('#itemUnit'+index).val(item.unit);
                    $('#itemQuanitity'+index).val(item.quantity);
                    $('#itemConsideration'+index).val(item.consideration);
                   $('#itemStock'+index).val(item.stock);
                    $('#itemCategory'+index).val(item.category);
                });
              }
          });
        });
    
</script>
@endsection

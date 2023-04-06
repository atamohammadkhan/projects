@extends('test1')
@section('contents')
<div class=""   style="float: right;" >
        <form action="{{route('save')}}" id="frm" method="post" class="container" enctype="multipart/form-data" style="direction: ltr;">
        @csrf
        <fieldset>
        <div class="row mt-5" style="direction: rtl; padding:10px;" >
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="number" class="form-label">د بل نمبر</label>
                        <input type="text" name="billNumber" id="" class="form-control" style="direction: ltr;" >
                </div>
        </div>
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="date" class="form-label">تاریخ </label>
                        <input type="date" name="date" id="date" class="form-control">
                </div>
        </div>
        <div class="col-sm-4">
                <div class="form-group">
                        <label for="scan" class="form-label">سکن شوی فایل</label>
                        <input type="file" name="scan" id="" class="form-control">
                </div>
        </div>
        </div>

        </fieldset>
        <div class ="row mt-5" style="direction:rtl;" id="addbtn">
                <div class="col-md-4" ></div>
                <div class="col-md-4" style="position:relative;right:90px;">
                        <div class="form-group">
                                <input type="button" name="add" id="btn1" class="btn btn-success" value="د اجناسو اضافه کول" style="margin-bottom:20px;">
                        </div>
                </div>
                <div class="col-md-4" ></div>
        </div>

        <div class="row mt-5" id="div1">
                   </div>
                   <div class="row mt-5"  style="direction: rtl; margin-bottom:50px;">
                <div class="col-md-4" style="direction:rtl;" >
                    <div class="form-group" >
                     </div>
                </div>
                <div class="col-md-4" >

                </div>
                <div class="col-md-4" style="direction:ltr;">
                    <div class="form-group" >

                        <input type="submit" value="دخیره کول" style="position:relative; left: 30px;" class='btn btn-success'>
                    </div>
                </div>
        </div>
</form>
</div>
@endsection
@section('scripts')
<script>
             var c = 1;
        $('#btn1').click(function(e){
                $("#addbtn").hide();


             $('#div1').append('<fieldset id= "feld'+c+'" style="border-radius: 15px; margin-top:10px" id="feld'+c+'">\
            <div class="" style="direction:rtl;" id="div'+c+'">\
            <div class="row"  style="">`<div class="form-group col-md-3">\
                   <label for="">نوم </label>\
                            <input type="text" name="name[]" class="form-control">\
                        </div><div class="form-group col-md-3">\
                        <label for=""> نوع </label>\
                        <select name="type[]" id="type" class="form-control">\
                            @foreach ($types as $type)\
                                <option value="{{ $type->id }}">{{ $type->name }}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="form-group col-md-2">\
                        <label>واحد </label>\
                        <select name="unit[]" id="unit" class="form-control">\
                            @foreach ($units as $unit)\
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>\
                            @endforeach\
                        </select>\
                     </div>\
                        <div class="form-group col-md-3">\
                        <label for=""> کتګوری </label>\
                        <select name="category[]" id="category" class="form-control">\
                            @foreach ($category as $cat)\
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>\
                            @endforeach\
                        </select></div>\
                        </div>\
                        <div class="row mt-5 style="direction: rtl;">\
                                <div class="col-md-2">\
                                        <div class="form-group">\
                                                <label for="quantity">تعداد</label>\
                                                <input type="number" name="quantity[]" id="quantity" class="form-control">\
                                        </div>\
                                </div>\
                                <div class="form-group col-md-3">\
                                        <label for="stock">دیبو </label>\
                                        <select name="stock[]" id="stock" class="form-control">\
                                                @foreach ($stocks as $stock)\
                                                <option value="{{ $stock->id }}">{{ $stock->name }}</option>\
                                                @endforeach\
                                        </select>\
                                </div>\
                                 <div class="col-md-4">\
                                        <div class="form-group">\
                                                <label for="consideration" class="form-label"> ملاحظات</label>\
                                                <textarea name="consideration[]" id="consideration" cols="30" rows="3" placeholder=" ملاحظات ولیکی!"></textarea>\
                                        </div>\
                                </div>\
                                <div class="col-md-3" style="margin-top:30px;">\
                                                <input type="Button" class="btn btn-danger del" onclick="removeDiv('+c+')" value="پاکول">\
                                                <input type="button" name="add" id="btn2" class="btn btn-success add" value="اضافه کول" >\
                                </div>\
                   </div>\
                   </hr>\
                   </div>\
                   </fieldset>');
                   c++;
        });

    </script>
    <script>
        $(".del:last").click(function(e){
                $("#addbtn").show();
        })
        $(document).ready(function(){
        $('#frm1').on('submit',function(e){
               $('input').html('');
               $('#billNumber').html('');
        })
        });
        function removeDiv(id){
            $("#feld"+id).remove();
            $('#div'+id).remove();
            $(".add:last").show();
        }

        $(document).on('click','#btn2', function(){

            $(".add").hide();
            newElement();
        });
        c=1;
        function newElement(){
                $("#addbtn").hide();
                $('#div1').append('<fieldset style="" id="feld'+c+'">\
            <div class="container new" style="direction:rtl;" id="div'+c+'" >\
            <div class="row mt-5"  style="direction:rtl;">`<div class="form-group col-md-3">\
                   <label for="">نوم </label>\
                            <input type="text" name="name[]" class="form-control">\
                        </div><div class="form-group col-md-3">\
                        <label for=""> نوع </label>\
                        <select name="type[]" id="type" class="form-control">\
                            @foreach ($types as $type)\
                                <option value="{{ $type->id }}">{{ $type->name }}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="form-group col-md-2">\
                        <label>واحد </label>\
                        <select name="unit[]" id="unit" class="form-control">\
                            @foreach ($units as $unit)\
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>\
                            @endforeach\
                        </select>\
                     </div>\
                        <div class="form-group col-md-3">\
                        <label for=""> کتګوری </label>\
                        <select name="category[]" id="category" class="form-control">\
                            @foreach ($category as $cat)\
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>\
                            @endforeach\
                        </select></div>\
                        </div>\
                        <div class="row mt-5 style="direction: rtl;">\
                                <div class="col-md-2">\
                                        <div class="form-group">\
                                                <label for="quantity">تعداد</label>\
                                                <input type="number" name="quantity[]" id="quantity" class="form-control">\
                                        </div>\
                                </div>\
                                <div class="form-group col-md-3">\
                                        <label for="stock">دیبو </label>\
                                        <select name="stock[]" id="stock" class="form-control">\
                                                @foreach ($stocks as $stock)\
                                                <option value="{{ $stock->id }}">{{ $stock->name }}</option>\
                                                @endforeach\
                                        </select>\
                                </div>\
                                 <div class="col-md-4">\
                                        <div class="form-group">\
                                                <label for="consideration" class="form-label"> ملاحظات</label>\
                                                <textarea name="consideration[]" id="consideration" cols="30" rows="3" placeholder="ملاحظات ولیکی"></textarea>\
                                        </div>\
                                </div>\
                                <div class="col-md-3" style="margin-top:30px;">\
                                                <input type="Button" class="btn btn-danger del" onclick="removeDiv('+c+')" value="پاکول">\
                                                <input type="button" name="add" id="btn2" class="btn btn-success add" value="اضافه کول" >\
                                </div>\
                   </div>\
                   </hr>\
                   </div>\
                   </fieldset>')
                   c++;
        }
    </script>
    @endsection

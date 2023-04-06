@extends('test1')
@section('contents')
<div class="container-fluid"   style="float: right;" >
        <form action="{{route('addAgent')}}" id="frm" method="post" class="container" enctype="multipart/form-data" style="direction: ltr;">
        @csrf
        <fieldset>
        <div class="row mt-5" style="direction: rtl; padding:10px;" >
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="name" class="form-label">د معتمد نوم <span style="color:red;">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" style="direction: ltr;"  value="{{old('name')}}">

                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                 </div>
        </div>
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="fName" class="form-label"> د پلار نوم <span style="color:red;">*</span></label>
                        <input type="text" name="fName" id="fName" class="form-control" value="{{old('fName')}}">
                        @error('fName')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                 </div>
        </div>
        <div class="col-sm-4">
                <div class="form-group">
                        <label for="jobTitle" class="form-label">  وظیفه <span style="color:red;">*</span> </label>
                        <input type="text" name="jobTitle" id="jobTitle" class="form-control" value="{{old('jobTitle')}}">
                        @error('jobTitle')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                 </div>
        </div>
    </div>
        <div class="row mt-5" style="direction: rtl; padding:10px;" >
        <div class="col-sm-4" >
                <div class="form-group">
                <label for="department">  ریاست <span style="color:red;">*</span></label>
                        <select name="department" id="department" class="form-control" value="{{old('department')}}">
                        <option selected disabled value="">ریاست انتخاب کړی</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                 </div>
        </div>
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="phone" class="form-label">د تلفون شمیره<span style="color:red;">*</span></label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                 </div>
        </div>
    </div>
    <div class="row mt-5"  style="direction: rtl; margin-bottom:50px;">
                <div class="col-md-4" style="direction:rtl;" >

                </div>
                <div class="col-md-4" >

                </div>
                <div class="col-md-4" style="direction:ltr;">
                    <div class="form-group" >

                        <input type="submit"  value="دخیره کول" style="position:relative; left: 30px;" class='btn btn-success'>
                    </div>
                </div>
        </div>
</form>
</div>
@endsection
@section('scripts')
{{-- <script>
        // $("#name").click(function(){
        //         $("#n").hide();
        // });
        // $("#fName").click(function(){
        //         $("#f").hide();
        // });
        // $("#jobTitle").click(function(){
        //         $("#j").hide();
        // });
        // $("#phone").click(function(){
        //         $("#p").hide();
        // });
        // $("#department").click(function(){
        //         $("#d").hide();
        // });

    //     $("#submitButton").click(function (e){
    //             var status=true;
    //             e.preventDefault();
    //             var fName   = $('#fName').val();
    //             var department   = $('#department').val();
    //             var phone   = $('#phone').val();
    //             var jobTitle   = $('#jobTitle').val();
    //             var name   = $('#name').val();
    //             if(name =="")
    //             {
    //                     $("#n").text("نام ضرور است");
    //                     $("#n").show();
    //                     status=false;
    //             }
    //             else{
    //                     var regArabic= /\p{Script=Arabic}+/u;
    //                     if(!regArabic.test(name)){
    //                             $("#n").text(" تنها الفبا قابل قبول است ");
    //                             $("#n").show();
    //                             status=false;
    //                     }
    //              }
    //              if(phone =="")
    //             {
    //                     $("#p").text("نام ضرور است");
    //                     $("#p").show();
    //                     status=false;
    //             }
    //             else{
    //                     var regArabic= /\p{Script=Arabic}+/u;
    //                     if(!regArabic.test(name)){
    //                             $("#p").text(" تنها الفبا قابل قبول است ");
    //                             $("#p").show();
    //                             status=false;
    //                     }
    //              }

    //              if(fName =="")
    //             {
    //                     $("#f").text("نام ضرور است");
    //                     $("#f").show();
    //                     status=false;
    //             }
    //             else{
    //                     var regArabic= /\p{Script=Arabic}+/u;
    //                     if(!regArabic.test(fName)){
    //                             $("#f").text(" تنها الفبا قابل قبول است ");
    //                             $("#f").show();
    //                             status=false;
    //                     }
    //              }
    //              if(jobTitle =="")
    //             {
    //                     $("#j").text("نام ضرور است");
    //                     $("#j").show();
    //                     status=false;
    //             }
    //             else{
    //                     var regArabic= /\p{Script=Arabic}+/u;
    //                     if(!regArabic.test(name)){
    //                             $("#j").text(" تنها الفبا قابل قبول است ");
    //                             $("#j").show();
    //                             status=false;
    //                     }
    //              }
    //              if(department =="")
    //             {
    //                     $("#d").text("نام ضرور است");
    //                     $("#d").show();
    //                     status=false;
    //             }

    //             if(status === true) $('#frm').submit();
    //    });
</script> --}}
@endsection


<link rel="stylesheet" href={{asset('/bootstrap5/css/bootstrap.min.css')}}> 
<script src={{asset('/jquery/jqueryDevelopment.js')}} ></script> 
     <script  src={{asset('/bootstrap5/js/bootstrap.min.js')}}> </script> 
<style>
    .row{
        margin:0px;
    }
</style>
<div class="container">

    <div class="row" style="margin-top: 150px;">
        <div class="col-md-6 offset-md-3" >
        <div class="card" style="background-color:beige">
        <div class="card-header" style="direction: rtl;">
           ورود به سیستم
        </div>
        <div class="card-body">
            <form action="{{route('submitLogin')}}" method="post">
                @csrf
                   <div class="row mt-5" style="direction: rtl;">
                        <div class="col-sm-10">
                        <div class="form-group">
                        <label for="Email" class="form-label">ایمیل ادرس</label>
                        <input type="email" name="Email" id="Email" class="form-control">
                        </div>
                        @error('Email')
                      <span class="text-danger">{{$message}}</span> 
                         @enderror     
                    </div>
                        <div class="col-sm-2" style="margin-top:25px">
                        <img src="{{asset('Login/mail.ico')}}" alt="error">
                        </div>
                   </div> 
               </div>
               <div class="row mt-5" style="direction: ltr; margin-top:0px;">
                   <div class="col-sm-2" style="margin-top: 25px;">
                        <img style="margin-left: 20px;" src="{{asset('Login/lock.ico')}}" alt="error">
                   </div>
                    <div class="col-sm-10" style="direction: rtl;">
                        <div class="form-group" style="position:relative; right:20px">
                        <label for="Password" class="form-label">پاسورد</label>
                        <input type="password" name="Password" id="Password" class="form-control" style="width:390px;">
                        </div>
                         @error('Password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror 
                    </div>
                </div>
                <div class="form-group">
                @if(session()->has('status'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="direction: rtl;">
                    <strong>توجه </strong> {{session('status')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </div>
                <div class="form-group" style="margin-top: 20px; margin-bottom:20px; position:relative; margin-left:200px;">
                    <input type="submit" value="ورود"  class="btn btn-success">
                    <input type="reset" value="لغو"  class="btn btn-danger">    
               </div>
            </div>  
        </form> 
    </div>
</div>
</div>
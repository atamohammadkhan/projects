@extends('test1')
@section('contents')

<div class="container-fluid"   style="float: right;" >
        <form action="{{route('updateAgent')}}" id="frm" method="post" class="container" enctype="multipart/form-data" style="direction: ltr;">
        @csrf
        <fieldset>
        <div class="row mt-5" style="direction: rtl; padding:10px;" >
        <div class="col-sm-4" >
                <div class="form-group">
                <input type="hidden" name="id" id="" hidden class="form-control" style="direction: ltr;"  value= {{$agents[0]->id}} >
                        <label for="name" class="form-label">د معتمد نوم</label>
                        <input type="text" name="name" id="" class="form-control" style="direction: rtl;" value={{$agents[0]->name}} >
                </div>
        </div>
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="fName" class="form-label">د پلار نوم</label>
                        <input type="text" name="fName" id="date" class="form-control" value={{$agents[0]->fName}}>
                </div>
        </div>
        <div class="col-sm-4">
                <div class="form-group">
                        <label for="jobTitle" class="form-label">  وظیفه  </label>
                        <input type="text" name="jobTitle" id="" class="form-control" value={{$agents[0]->jobTitle}}>
                </div>
        </div>
    </div>
        <div class="row mt-5" style="direction: rtl; padding:10px;" >
        <div class="col-sm-4" >
                <div class="form-group">
                    <?php $select=" " ?>
                <label for="department"> ریاست</label>
                        <select name="department" id="" class="form-control">
                        <option selected disabled value="">ریاست انتخاب کړی</option>
                            @foreach ($departments as $department)
                                @if($department->id == $agents[0]->department)
                                <?php $select="selected" ?>
                                @endif
                                <option  {{$select}} value="{{ $department->id }}">{{ $department->name }}</option>
                                <?php $select="" ?>
                                @endforeach
                        </select>
                </div>
        </div>
        <div class="col-sm-4" >
                <div class="form-group">
                        <label for="phone" class="form-label">د تلفون شمیره</label>
                        <input type="text" name="phone" id="phone" class="form-control" value={{$agents[0]->phone}}>
                </div>
        </div>
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

                        <input type="submit" value="ذخیره کول" style="position:relative; left: 30px;" class='btn btn-success'>
                    </div>
                </div>
        </div>

</form>
</div>
@endsection

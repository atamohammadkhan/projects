@extends('test1')
@section('contents')
    <div class="row mt-5" style="direction: rtl;">
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>مننه </strong> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="row mt-5" style="direction: rtl; margin-top:0%;">
        <div class="col-sm-4" style="margin-bottom: 20px;">
            <a href="/newAgent"><input type="button" class="btn btn-primary" value=" اضافه کول"></a>
        </div>
    </div>
    <table class="table table-striped center table-responsive " style="text-align:center;direction:rtl;">
        <tr style="background-color: lightblue; text-align:center;">
            <th>د معتمد نوم</th>
            <th>د پلار نوم</th>
            <th>وظیفه</th>
            <th>ریاست</th>
            <th>د تلفون شمیره</th>
            <th colspan="2">
                معلومات
            </th>
        </tr>
        @foreach ($agents as $agent)
            <tr>
                <input type="hidden" name="" id="valButton">
                <td>{{ $agent->name }}</td>
                <td>{{ $agent->fName }}</td>
                <td>{{ $agent->jobTitle }}</td>
                <td>{{ $agent->department }}</td>
                <td>{{ $agent->phone }}</td>
                <td colspan="2" style="text-align:center;">
                    <button value="{{ $agent->id }}" id="btnDel" onclick="del({{ $agent->id }})"
                        class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        پاکول
                    </button>

                    <a class="btn btn-primary" href={{ 'editAgent/' . $agent->id }}>تغیرات</a>
                </td>
            </tr>
        @endforeach
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:ghostwhite;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="position:relative; right:400px;"></button>
                    <h5 class="modal-title" id="exampleModalLabel">اخطار</h5>
                </div>
                <div class="modal-body" style="direction: rtl;" style="background-color:lightgoldenrodyellow;">
                    <span style="color:blue;">ایا تاسو مطمین یاست چی دا معتمد حذف کړی ؟</span>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save" class="btn btn-success">هو</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close">نه</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')


    <script>
        function del(id) {

            $("#save").val(id);
        }
        $(document).ready(function() {

            $("#btnDel").click(function(e) {

                alert($(this).val())

            });


            $("#save").click(function(e) {
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url: "{{ route('delAgent') }}/" + id,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#exampleModal').modal('hide');
                        location.reload(true);
                    }
                });
            });
        });
    </script>
@endsection

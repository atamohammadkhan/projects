{{-- !-- Delete Warning Modal -->  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href={{asset('/bootstrap5/css/bootstrap.min.css')}}  >
    <script  src={{asset('/bootstrap5/js/bootstrap.min.js')}}> </script> 
     <script src={{asset('/jquery/jqueryDevelopment.js')}} ></script> 
</head>
<body>
    
    <div id="del">
    <form action="{{ route('delAgent',$record[0]->id) }}" method="get" id="frm">
    <div class="modal-body">
        @csrf
        <h5 class="text-center">Are you sure you want to delete {{ $record[0]->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel" >Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
    </div>
</form>
    </div>



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('delAgent',$record[0]->id) }}" method="get" id="frm">
    <div class="modal-body">
        @csrf
        <h5 class="text-center">Are you sure you want to delete {{ $record[0]->name }} ?</h5>
    </div>
    <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel" >Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
    </div> -->
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        console.log("yes");
        event.preventDefault();
        let href = $(this).attr('data-attr');
        console.log(href);
        $.ajax({
            url: href,
            method: "get"
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
    $("cancel").click(function(){
        $("#frm").remove();
    });

</script>


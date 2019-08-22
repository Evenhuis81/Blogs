@extends('layout')
@section('title', 'Laravel Multiple File Upload Example')
@section('pagetitle', 'ImageLoader')
@section('content')

<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div> 
      @endif
       
    <h3 class="jumbotron">Laravel File Upload</h3>
<form method="post" action="{{url('form')}}" enctype="multipart/form-data">
  {{csrf_field()}}

        <div class="input-group control-group increment" >
          <input type="file" name="filename" class="form-control" >
          {{-- <div class="input-group-btn">  --}}
            {{-- <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button> --}}
          {{-- </div> --}}
        </div>
        {{-- <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="file" name="filename[]" class="form-control">
              <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
          </div> --}}
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
  </form>        


  <br><br><br>
  <a href="/blogs/{{ $blog->id }}/edit">Return to previous page</a>
  </div>

  {{-- <script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script> --}}

@endsection
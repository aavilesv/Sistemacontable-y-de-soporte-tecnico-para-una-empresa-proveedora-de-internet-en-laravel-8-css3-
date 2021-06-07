
@if($success= Session::get("success"))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
    <p class="mb-0">{{$success}}.</p>
  </div>

  @endif

  @if($message= Session::get("error"))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Error por revisar!</h4>
    <p class="mb-0">{{$message}}.</p>
  </div>

  @endif
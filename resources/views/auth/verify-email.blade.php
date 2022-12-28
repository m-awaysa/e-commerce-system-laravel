@include('layouts.publicHeader')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Verify Email</h2>
        @if (Session('message'))
        <div class="text-danger">{{ Session('message')}}</div>
        @endif
        <form action="{{route('verification.send')}}" method="post">
            @csrf
        <div class="d-grid">
               
               <button class="btn btn-primary" type="submit">send verification link again?</button>
           
       </div>
  
        </form>
 
    </div>
</div>
@include('layouts.publicFooter')
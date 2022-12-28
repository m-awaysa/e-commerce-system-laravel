@include('layouts.publicHeader')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Forget Password</h2>

        @if(session('status'))
        <div class="text-success">{{session('status')}}</div>
        @endif
        <form action="{{route('password.email')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="inputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control border border-primary" id="inputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="d-grid">

                <button class="btn btn-primary" type="submit">send password reset</button>

            </div>
        </form>
   
    </div>
</div>
@include('layouts.publicFooter')
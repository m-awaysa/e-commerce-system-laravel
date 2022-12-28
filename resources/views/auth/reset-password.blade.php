@include('layouts.publicHeader')

<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Forget Password</h2>
        @if(session('status'))
        <div class="text-danger">{{session('status')}}</div>
        @endif
        @error('token')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <form action="{{route('password.update',['token'=>$token])}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="inputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control border border-primary" id="inputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control border border-primary">
            </div>
            @error('password')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control border border-primary">
            </div>
            @error('password_confirmation')
            <div class="text-danger">{{$message}}</div>
            @enderror

            <div class="d-grid">

                <button class="btn btn-primary" type="submit">reset password</button>

            </div>
        </form>

    </div>
</div>
@include('layouts.publicFooter')
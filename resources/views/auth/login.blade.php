@include('layouts.publicHeader')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Login Form</h2>
       @if (Session('message'))
        <div class="text-danger">{{ Session('message')}}</div>
        @endif
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="inputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control border border-primary" id="inputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control border border-primary" id="inputPassword1">
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <p class="small"><a class="text-primary" href="#">Forgot password?</a></p>
            <div class="d-grid">
               
                    <button class="btn btn-primary" type="submit">Login</button>
                
            </div>
        </form>
        <div class="mt-3">
            <p class="mb-0  text-center">Don't have an account? <a href="{{route('register')}}" class="text-primary fw-bold">Sign
                    Up</a></p>
                    <p class="mb-0  text-center"><a href="{{route('password.request')}}" class="text-primary fw-bold">Forget Password? </a></p>
        </div>
    </div>
</div>
@include('layouts.publicFooter')
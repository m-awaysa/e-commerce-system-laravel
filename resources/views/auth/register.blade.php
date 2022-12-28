@include('layouts.publicHeader')


<div class="w-100 d-flex justify-content-center align-items-center mt-5 pt-5 ">
    <div class="col-md-8 col-xl-5 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Login Form</h2>
        <form action="{{route('register.create')}}" method="post">
            @csrf
            <div><p> This website is for commercial sale only.</p></div>
            <div><p> We will look at your information and contact you back if its true.</p></div>
            @if(session('message'))
                <div class="text-success">
                    {{session('message')}}
                </div>
                @endif
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control border border-primary" value="{{old('first_name')}}">
            </div>
            @error('first_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control border border-primary" value="{{old('last_name')}}"> 
            </div>
            @error('last_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control border border-primary" value="{{old('email')}}">
            </div>
            @error('email')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control border border-primary"value="{{old('address')}}">
            </div>
            @error('address')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control border border-primary"value="{{old('company_name')}}">
            </div>
            @error('company')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="company_number" class="form-label">Company Number</label>
                <input type="number" name="company_number" class="form-control border border-primary"value="{{old('company_number')}}">
            </div>
            @error('company_number')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="phone_number" class="form-label">phone Number</label>
                <input type="number" name="phone_number" class="form-control border border-primary"value="{{old('phone_number')}}">
            </div>
            @error('phone_number')
            <div class="text-danger">{{$message}}</div>
            @enderror
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
                <button class="btn btn-primary" type="submit">Send register request</button>
            </div>
        </form>
        <div class="mt-3">
            <p class="mb-0  text-center">Do you have an account? <a href="{{route('login')}}" 
            class="text-primary fw-bold">Login</a></p>
        </div>
    </div>
</div>

@include('layouts.publicFooter')
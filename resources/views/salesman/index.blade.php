@include('layouts.publicHeader')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{session('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="vh-100 d-flex justify-content-center align-items-center pt-5 ">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Your Information</h2>
        <form action="{{route('salesman.info.edit')}}" method="post">
            @csrf
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="{{$salesman->first_name}}">
                @error('first_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="{{$salesman->last_name}}">
                @error('last_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="mt-2">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{$salesman->email}}">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-2">
                <label for="company_name">Company:</label>
                <input type="text" name="company_name" value="{{$salesman->company_name}}">
                @error('company_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="company_number">Company Number:</label>
                <input type="number" name="company_number" value="{{$salesman->company_number}}">
                @error('company_number')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="address">Address:</label>
                <input type="text" name="address" value="{{$salesman->address}}">
                @error('address')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-2">
                <label for="phone_number">Phone Number:</label>
                <input type="number" name="phone_number" value="{{$salesman->phone_number}}">
                @error('phone_number')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-5">Save</button>
        </form>

    </div>
</div>
@include('layouts.publicFooter')
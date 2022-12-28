@include('layouts.adminHeader')



<div class="text-dark">
    <label class="mb-1 text-lg">Editing {{$user->first_name}} {{$user->last_name}}</label>
</div>
<form action="{{route('salesman.edit',$user)}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="row">



    <div class="input text-dark">
        <!--Product Name -->
        <div>
            <label for="first_name">User first name: </label>
            <input type="text" name="first_name" value="{{$user->first_name}}">
            @error('first_name')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
          <!--Product color -->
          <div>
            <label for="last_name">User last name: </label>
            <input type="text" name="last_name" value="{{$user->last_name}}">
            @error('last_name')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
        
            
           
           
        <!--Product amount -->
        <div>
            <label for="address">Address: </label>
            <input type="text" name="address" value="{{$user->address}}">
            @error('address')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
      
        <!--Product company -->
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" value="{{$user->email}}">
            @error('email')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
      
        <!--Description-->
        <div>
            <label for="company_name">Company name: </label>
            <textarea type="text" name="company_name" >{{$user->company_name}}</textarea>
            @error('company_name')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
     
        <!--Product discount -->
        <div>
            <label for="company_number">Company number</label>
            <input type="number" name="company_number" value="{{$user->company_number}}">
            @error('company_number')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
   
   
      <!--price -->
        <div>
            <label for="discount">discount Ratio: %</label>
            <input type="number" name="discount" value="{{$user->discount}}">
            @error('discount')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
          <!--phone number -->
          <div>
            <label for="phone_number">Phone number</label>
            <input type="number" name="phone_number" value="{{$user->phone_number}}">
            @error('phone_number')
           <div class="text-danger">{{$message}}</div>
           @enderror
        </div>
    

    </div>

</div>


<div>
    <button type="submit"class="btn btn-primary">Edit user</button>
</div>
</form>



@include('layouts.adminFooter')
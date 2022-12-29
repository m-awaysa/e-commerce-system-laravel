@include('layouts.publicHeader')



<div class="container text-center text-warning  pt-5">
    <h2>Contact Us</h2>
    @if(session('message'))
    <div class="text-success">{{session('message')}}</div>
@endif
</div>
<div class=" container border shadow border-secondary   ">

    <!-- send mail form  -->
    <form action="{{route('contactUs.sent')}}" class="  container  align-items-center" method="post">
        @csrf
        <!--   Name -->
        <div class="mb-3 mail-group">
            <label class="mail-label" for="mail_name ">Email:</label>
            <input type="text " id="email" name="email" placeholder="Email" class="p-1 mail-item row m-1 col-lg-5 border col-11 shadow " value="{{old('email')}}">
            @error('email')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <!--   Mail subject -->
        <div class="mb-3  mail-group">
            <label class="mail-label" for="mail_subject">Mail Subject:</label>
            <input type="text " id="mail_subject" name="mail_subject" placeholder="Mail subject" class="p-1 mail-item row m-1 col-lg-5 border col-11 shadow" value="{{old('mail_subject')}}">
        </div>

        @error('mail_subject')
        <div class="text-danger">{{$message}}</div>
        @enderror


        <!--   Mail body -->

        <div class="mb-3  mail-group">
            <label class="mail-label" for="mail_body">Mail Body:</label>
            <textarea name="mail_body" id="mail_body" cols="30" rows="4" class="p-1 mail-item col-lg-5 col-11 placeholder-glow row mx-1 shadow bg-gray rounded-0 " placeholder="Description"> {{old('mail_body')}}</textarea>
            @error('mail_body')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <!--  send button  -->
            <button id="sent" type="submit" class="btn btn-md mt-2 mb-2 rounded border btn-dark text-warning">
                Send
            </button>
        </div>
    </form>

</div>
@include('layouts.publicFooter')
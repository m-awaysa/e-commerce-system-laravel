@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Home</h1>

</div>

<!--- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- -- -->

<div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Home Page Carousel photos: Add, hide, delete or show photo in home carousel part</h6>
            @error('image')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <button class="btn btn-sm btn-primary shadow-sm mt-2" type="button" data-bs-toggle="modal" data-bs-target="#addImageModal">
                <i class="fa-solid fa-plus"></i> Add Image
            </button>
            @if(session('imageStatus'))
            <div class="text-danger">
                {{session('imageStatus')}}
            </div>
            @endif

        </div>
        <!-- Card Body -->
        <div class="card-body">


            <div class="  bg-light ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Visibility</th>
                            <th>Delete</th>
                            <th>Show/Hide</th>
                        </tr>
                    </thead>

                    @if ($homeImages->count())

                    @foreach($homeImages as $homeImage)
                    <tr>
                        <td data-label="photo">

                            <div>
                                <img src="{{asset('images/productImages/'.$homeImage->image)}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 100px;">
                            </div>
                        </td>





                        <td data-label="Visibility"> <?php if ($homeImage->active) {
                                    echo "true";
                                } else   echo "false"   ?>
                        </td>

                        <td >
                            <!-- delete button form -->
                            <div >
                                <a class="btn btn-danger btn-sm" onclick="confirmDelete( '<?php echo route('layout.home.image.delete', $homeImage) ?>' )">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>

                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('layout.home.image.toggle',$homeImage)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">

                                    Show/Hide
                                </button>
                            </form>


                        </td>
                    </tr>

                    @endforeach

                    {{$homeImages-> links()}}



                    @else
                    <p class="text-danger justify-content-md-end">There is no home images!! </p>
                    @endif

                </table>
            </div>

        </div>
    </div>
</div>





<div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Home Page parts</h6>
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            <button class="btn btn-sm btn-primary shadow-sm mt-2" type="button" data-bs-toggle="modal" data-bs-target="#addPartModal">
                <i class="fa-solid fa-plus"></i> New Part
            </button>

        </div>
        <!-- Card Body -->
        <div class="card-body">


            <div class="  bg-light ">
                <table class=" table container " id="category">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    @if ($homeParts->count())

                    @foreach($homeParts as $homePart)
                    <tr>
                        <td data-label="name">
                            {{$homePart->name}}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('layout.home.part.edit',$homePart)}}">

                                Show/Edit
                            </a>
                        </td>
                        <td>
                            <!-- delete button form -->
                            <div >
                                <a class="btn btn-danger btn-sm" onclick="confirmDelete( '<?php echo route('layout.home.part.delete', $homePart) ?>' )">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>

                                </a>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                    {{$homeParts-> links()}}

                    @else
                    <p class="text-danger justify-content-md-end">There is no home Parts!! </p>
                    @endif

                </table>
            </div>

        </div>
    </div>
</div>




<!-- delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p> Deleting here means an actual delete from database,are you sure?</p>
            </div>
            <div class="modal-footer">

                <button id="cancelbutton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <button type="submit" id="confirmdelete" class="btn btn-primary">Sure</button>


            </div>
        </div>
    </div>
</div>

<!--add image  Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>

            </div>
            <div class="modal-footer">
                <form action="{{route('layout.home.add')}}" method="post" class="w-100" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <div>
                            <!-- photo -->
                            <label for="image">Add new photo:</label>
                        </div>
                        <input type="file" name="image">

                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary shadow-sm mt-2" type="submit">
                            <i class="fa-solid fa-plus"></i> Save Image
                        </button>

                        <button type="button" class="btn btn-secondary mt-2 btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--add part  Modal -->
<div class="modal fade" id="addPartModal" tabindex="-1" aria-labelledby="addPartModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>

            </div>
            <div class="modal-footer">
                <form action="{{route('layout.home.part.add')}}" method="post" class="w-100">
                    @csrf

                    <div>
                        <div>
                            <!-- photo -->
                            <label for="image">Part Name:</label>
                        </div>
                        <input type="text" name="name">

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2 btn-sm">New Part</button>


                        <button type="button" class="btn btn-secondary mt-2 btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



@include('layouts.adminFooter')
@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800  cate-gory">Categories</h1>

    <form action="{{route('category.add')}}">
        <button class="btn btn-md btn-primary shadow-sm " type="submit">
            <i class="fa-solid fa-plus"></i> Add Category
        </button>

    </form>

</div>
<!--- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- -- -->

<div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
            @if(session('imageStatus'))
            <div class="text-danger">
                {{session('imageStatus')}}
            </div>
            @endif

        </div>
        <!-- Card Body -->
        <div class="card-body">


            <div class=" bg-light ">
                <table class=" table ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>visibility</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    @if ($categories->count())
                    <tbody>
                        @foreach($categories as $category)

                        <tr>
                            <td data-label="Name">{{$category->name}}</td>


                            <td data-label="visibility"> <?php if ($category->visibility) {
                                                                echo "true";
                                                            } else   echo "false"   ?></td>
                            <td data-label="Edit">
                                <!--  edit button form  -->
                                <form action="{{route('category.edit',$category)}}" method="get">
                                    @csrf
                                    <button class="btn btn-primary btn-sm" type="submit">
                                    
                                        Edit
                                    </button>
                                </form>
                            </td>

                            <td data-label="Delete">
                                <!--  delete button form  -->
                                <a class="btn btn-danger btn-sm" onclick="confirmDelete( '<?php echo route('category.delete', $category) ?>' )">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </a>

                            </td>
                        </tr>




                        @endforeach
                    <tbody>
                        {{$categories-> links()}}

                        @else
                        <p class="text-danger justify-content-md-end">There is no Categories!! </p>
                        @endif

                </table>
            </div>

        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p> Deleting a categories here means an actual delete from database,are you sure?</p>
            </div>
            <div class="modal-footer">
                
                    <button id="cancelbutton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>


                  

                    <button type="submit" id="confirmdelete" class="btn btn-primary">Sure</button>

                  
              

            </div>
        </div>
    </div>
</div>

@include('layouts.adminFooter')

<!--- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- -- -->
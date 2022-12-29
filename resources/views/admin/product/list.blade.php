@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>

    <div class="dropdown">
        <button class="btn btn-sm btn-primary shadow-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa-solid fa-plus"></i> Add Product
        </button>
        <ul class="dropdown-menu">
            @foreach($categories as $category)
            <li><a class="dropdown-item" href="{{route('product.add',$category)}}">{{$category->name}}</a></li>
            @endforeach


        </ul>
    </div>

</div>
<!---------------------------------------------------------------------------------------------------->

<div>

    <div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>

            <div class="card-header py-3 ">

                <form action="{{route('product')}}" method="get">
                    @csrf
                    <button type="submit" class="my-1 btn btn-primary btn-md ">Filter</button>
                    <select multiple data-style="bg-secondary shadow-sm text-warning " class="selectpicker w-100"
                        name="categories[]">
                        @foreach($categories as $category)
                        <option class="skill-select fs-6" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categories')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    @if(session('status'))
                    <div class="text-danger">
                        {{session('status')}}
                    </div>
                    @endif
                    <div>


                </form>


            </div>





            @if(session('imageStatus'))
            <div class="text-danger">
                {{session('imageStatus')}}
            </div>
            @endif

        </div>
        <!-- Card Body -->
        <div class="card-body">





            <div class="  bg-light ">
                <table class=" big-table table ">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Company</th>
                            <th>Visibility</th>
                            <th>Discount</th>
                            <th>Price</th>
                            <th>Final Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach( $arrayProducts as $products)
                    @if ($products->count())

                    @foreach($products as $product)
                    <tr>
                        <td data-label="Amount">{{$product->amount}}</td>
                        <td data-label="Name">{{$product->name }}</td>
                        <td data-label="Category">{{$product->category->name }}</td>
                        <td data-label="Company">{{$product->company }}</td>
                        <td data-label="Visibility">
                            <?php if ($product->visibility) {
                                                            echo "true";
                                                        } else   echo "false"   ?>
                        </td>
                        <td data-label="Discount">{{$product->discount }}%</td>
                        <td data-label="Price">{{$product->price}} NIS</td>
                        <td data-label="Final Price">
                            <?php echo (int)($product->price - ((($product->discount) / 100) * $product->price)) . ' NIS'   ?>
                        </td>
                        <td data-label="Edit">
                            <!--  edit button form  -->
                            <form action="{{route('product.edit',$product)}}" method="get">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Edit
                                </button>
                            </form>
                        </td>

                        <td data-label="Delete">
                            <!--  delete button form  -->
                            <a class="btn btn-danger btn-sm" href="#"
                                onclick="confirmDelete( '<?php echo route('product.delete', $product) ?>' )">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                    </tr>




                    @endforeach

                    {{$products-> links()}}



                    <!-- Modal -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> Deleting a Product here means an actual delete from database,are you sure?</p>
                                </div>
                                <div class="modal-footer">

                                    <button id="cancelbutton" type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>




                                    <button type="submit" id="confirmdelete" class="btn btn-primary">Sure</button>




                                </div>
                            </div>
                        </div>
                    </div>


                    @else
                    <p class="text-danger justify-content-md-end">There is no Product!! </p>
                    @endif
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>

</div>
</div>

@include('layouts.adminFooter')
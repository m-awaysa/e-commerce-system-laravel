@include('layouts.adminHeader')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
</div>
<div class="m-3">
    <form action="{{route('category.add.put')}}" method="post" enctype="multipart/form-data">
        @csrf



        <div class="row">
            <div>
                <div>

                    <img width="300" src="{{asset('images/default.png')}}"
                        onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="no img">

                </div>

                <div>
                    <!--category photo -->
                    <input type="file" name="image">
                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div>




            <div class="input text-dark">
                <!--category Name -->
                <div>
                    <label for="category_name">Category Name: </label>
                    <input type="text" name="category_name" value="{{old('category_name')}}">
                    @error('category_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>


                <!--Description-->
                <div>
                    <label for="description">Description: </label>
                    <textarea type="text" name="description">{{old('description')}}</textarea>
                    @error('description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>



                <!--visibility -->
                <div>
                    <label for="visibility">Visibility</label>
                    <input type="checkbox" name="visibility" value="true" checked>
                </div>



            </div>

        </div>

        <div class="mt-4 text-dark">
            <h4>Features:</h1>


                <!------------------------------------------------------------------------------------------------------------>
                <div>
                    <div>
                        <div class="col-lg-12">


                            <div id="newinput"></div>
                            @error('feature')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('feature*')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <button id="rowAdder" type="button" class="btn btn-dark">
                                <span class="bi bi-plus-square-dotted">
                                </span> ADD Feature
                            </button>
                        </div>
                    </div>

                </div>
                <!------------------------------------------------------------------------------------------------------------>

        </div>


        <div class="mt-2">
            <button type="submit"  class="btn btn-primary">Add category</button>
        </div>

    </form>
</div>


@include('layouts.adminFooter')
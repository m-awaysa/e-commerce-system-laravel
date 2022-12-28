@include('layouts.adminHeader')



<div class="text-dark">
    <label class="mb-1 text-lg">Editing {{$category->name}}</label>
</div>
<form action="{{route('category.edit',$category)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div>
            <div>

                <img width="300" src="{{asset('images/productImages/'.$category->image)}}" onerror="this.src='  <?php echo asset('images/default.png') ?>  ' " alt="no img">

            </div>

            <div>
                <!--category photo -->
                <label for="image">New Image</label>
                <input type="file" name="image">
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

        </div>


        <div class="input text-dark">
            <!--category Name -->
            <div>
                <label for="">category Name: </label>
                <input type="text" name="category_name" value="{{$category->name}}">
                @error('category_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


            <!--Description-->
            <div>
                <label for="description">Description: </label>
                <textarea type="text" name="description">{{$category->description}}</textarea>
                @error('description')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


            <!--visibility -->
            <div>
                <label for="visibility">Visibility</label>
                <input type="checkbox" name="visibility" <?php if ($category->visibility) {
                                                                echo "checked";
                                                            } else   echo "unchecked"   ?>>
            </div>


        </div>

    </div>

    <div class="mt-4 text-dark">
        <h4>Features:</h1>
            <div>
                <div class="col-lg-12">
                    @foreach($category->feature as $feature)
                    <div id="row">

                        @error('feature*')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="input-group m-3">
                            <div class="input-group-prepend">
                                <label class="text-dark">Feature {{$i++}}: </label>
                                <button class="btn btn-danger" id="DeleteRow" type="button">
                                    <i class="bi bi-trash"></i>
                                    Delete
                                </button>
                            </div>

                            <input type="text" name="feature[{{$feature->id}}]" value="{{$feature->feature_name}}">

                        </div>
                    </div>
                    @endforeach
                    <div id="newinput"></div>
                    <button id="rowAdder" type="button" class="btn btn-dark">
                        <span class="bi bi-plus-square-dotted">
                        </span> ADD Another Feature
                    </button>
                </div>

            </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Edit category</button>
    </div>
</form>



@include('layouts.adminFooter')
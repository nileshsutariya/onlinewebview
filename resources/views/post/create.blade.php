@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>categorys</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-category"><a href="#">Home</a></li>
                    <li class="breadcrumb-category active">POST</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Post</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($post))
                            <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-1">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control mt-1">
                                        @if (!isset($post))
                                            <option value="">-- Select Category Group --</option>
                                        @endif
                               
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class=" col-form-label ">Category Name</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : old('title') }} ">
                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="image">Banner</label>
                                    <div class="form-group">
                                    <input type="file" name="image" id="image" placeholder=" enter your image">
                                </div>
                                    @php
                                        if (isset($post)) {
                                            echo $id = str_replace('public/imageuploaded/', '', $post->image);
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="link" class=" col-form-label ">URL</label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{ isset($post) ? $post->link : old('link') }} ">
                                    @error('link')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description" class=" col-form-label text-dark">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description">{{ isset($post) ? $post->description : old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="active" name="status"
                                                {{ isset($post) && $post->status == '1' ? 'checked' : '' }}>
                                            <label for="active">Visible</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 m-2">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="active" name="status"
                                                {{ isset($post) && $post->status == '1' ? 'checked' : '' }}>
                                            <label for="active">is Suggested</label>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ isset($post) ? $post->id : '' }}">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            <div class="col-md-7">
                <div class="card card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Post Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-responsive table-bordered">
                            <thead >
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>category Group Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Qauntity</th>
                                    <th>Status</th>
                                    @if (!isset($post))
                                        <th class="text-center">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="m-3 p-3" id="category_table_body">
                                @php
                                    $i = 1;
                                @endphp
                                @if(isset($posts))
                                @foreach ($posts as $value)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td scope="row">
                                            {{ $value->name }}
                                        </td>
                                        <td>
                                            {{$value->groupname}}
                                        </td>
                                        <td>
                                            {{ $value->description }}
                                        </td>
                                        <td>
                                            {{ $value->price }}
                                        </td>
                                        @if($value->qty==0)
                                        <td>
                                          <span class="text-danger">Out of Stock</span>
                                        </td>
                                          @else
                                          <td>
                                              {{$value->qty}}
                                            </td>
                                            @endif
                                        <td class="text-center">
                                            @if ($value->status == '1')
                                                <button class="btn btn-md btn-success" id="a" data-val="{{$value->id}}">Active</button>
                                            @else
                                                <button class="btn btn-md btn-danger" id="a" data-val="{{$value->id}}">Inactive</button>
                                            @endif
                                        </td>
                                        @if (!isset($post))
                                            <td>
                                                <a class="btn" href="{{ route('post.edit', $value->id) }}">
                                                    <i class="fa fa-pen text-warning"></i>
                                                    Edit
                                                </a>
                                                <a class="btn" href="{{ route('post.delete', $value->id) }}">
                                                    <i class="fa fa-trash text-danger"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <script type="text/javascript">
     $(document).ready(function() {
        $(document).on("click", "#a", function() {
             var id=$(this).attr("data-val");  
            $.ajax ({     
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                 url: "{{route('post.index')}}", 
                data: {
                    'id':id,
                },
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#category_table_body').html($(data).find('#category_table_body').html());
                    $('#pagination_links').html($(data).find('#pagination_links').html());                
                }
            });
        });
    });
</script> -->
@include('layouts.footer')

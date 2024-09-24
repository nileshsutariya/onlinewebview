@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>POST</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-category"><a href="#">Home/</a></li>
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
                                <div class="form-group  ">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control mt-1">
                                        @if (!isset($post))
                                            <option value="">Select Category</option>
                                        @endif
                                        @foreach ($category as $c)
                                            <option value="{{ $c->id }}"
                                                {{ isset($post) && $post->group_id == $c->id ? 'selected' : '' }}>
                                                {{ $c->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class=" col-form-label ">Title of Post</label>
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
                            <div class="form-group mt-2">
                                    <label for="image">Banner</label>
                                    <div class="form-group">
                                    <input type="file" name="image" id="image" placeholder=" enter your image">
                                </div>
                                    @php
                                        if (isset($post)) {
                                            echo $banner =  "<b>Banner name </b>= " .str_replace('public/imageuploaded/', '', $post->banner);
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="link" class=" col-form-label ">URL</label>
                                    <input type="link" class="form-control" id="link" name="link" value="{{ isset($post) ? $post->link : old('link') }} ">
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
                            <div class="col-md-6 mt-1">
                                    <div class="form-group clearfix">
                                        <label for="visible" class=" col-form-label text-dark">Visible</label><br>
                                        <label>
                                            <input type="radio" name="visible" value="true" {{ isset($post) && $post->is_visible == '1' ? 'checked' : '' }}> True
                                        </label>
                                        <label>
                                            <input type="radio" name="visible" value="false" {{ isset($post) && $post->is_visible == '0' ? 'checked' : '' }}> False
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="suggested" name="suggested" 
                                                {{ isset($post) && $post->is_suggested == '1' ? 'checked' : '' }}>
                                            <label for="suggested">is Suggested</label> <!-- Corrected 'for' attribute -->
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
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>link</th>
                                    <th>Is_suggested</th>
                                    <th>Is_visible</th>
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
                                            {{ $value->title }}
                                        </td>
                                        <td>
                                            {{$value->categoryname}}
                                        </td>
                                        <td>
                                            {{ $value->description }}
                                        </td>
                                        <td>
                                            {{ $value->link }}
                                        </td>
                                        <td class="text-center">
                                            @if ($value->is_suggested== '1')
                                                Suggested
                                            @else
                                              not Suggested
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($value->is_visible== '1')
                                                Visible
                                            @else
                                              not Visible
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
                        <div>
                                {{ $posts->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')

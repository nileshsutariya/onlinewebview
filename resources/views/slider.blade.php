@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>Slider</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-category"><a href="#">Home/</a></li>
                    <li class="breadcrumb-category active">Slider</li>
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
                        <h3 class="card-title">Slider</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($slider))
                            <form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ isset($slider) ? $slider->title : old('title') }} ">
                                </div>
                                <div class="form-group">
                                    <label for="description" class=" col-form-label text-dark">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description">{{ isset($slider) ? $slider->description : old('description') }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="image">Images</label>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $slider->id ?? '' }}">
   
                                    <input type="file" name="image" id="image" placeholder=" enter your image">
                                </div>
                                    @php
                                        if (isset($slider)) {
                                            echo $slider =  "<b>Image name </b>= " .str_replace('public/slider/', '', $slider->slider);
                                        }
                                    @endphp
                                </div>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control" id="id" name="id" 
                                value="{{ isset($slider) && is_object($slider) ? $slider->id : '' }}">                                 --}}
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Slider Data</h3>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    {{-- @if (!isset($slider)) --}}
                                        <th class="text-center">Action</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody class="m-3 p-3">
                                @php
                                    $i = 1;
                                @endphp
                                @if(isset($sliders))
                                @foreach ($sliders as $value) 
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{$value->title}}
                                        </td>
                                        <td>
                                            <img src="{{asset('slider/'.$value->slider)}}"
                                            style="width: 100px; height:100px;">
                                        </td>
                                        @if (!isset($slider))
                                            <td>
                                                <a class="btn" href="{{route('slider.edit', $value->id)}}">
                                                    <i class="fa fa-pen text-warning"></i>
                                                    Edit
                                                </a>
                                                <a class="btn" href="{{route('slider.delete', $value->id)}}">
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
                            {{ $sliders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')

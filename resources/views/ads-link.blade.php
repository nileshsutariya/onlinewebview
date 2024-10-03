@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h1>Ads</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-category"><a href="#">Home/</a></li>
                    <li class="breadcrumb-category active">Ads</li>
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
                        <h3 class="card-title">Ads</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($adsLink))
                            <form action="{{ route('ads.update') }}" method="post">
                        @else
                            <form action="{{ route('ads.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $adsLink->id ?? '' }}">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ isset($adsLink) ? $adsLink->title : old('title') }}" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Link</label>
                                    <input type="url" name="link" id="link" class="form-control" value="{{ isset($adsLink) ? $adsLink->link : old('link') }} ">
                                </div>
                            </div>
                        </div>
                        
                            <div class="col-md-12">                          
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                            </form>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Ads Data</h3>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    {{-- @if (!isset($adsLink)) --}}
                                        <th class="text-center">Action</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody class="m-3 p-3">
                                @php
                                    $i = 1;
                                    @endphp
                                @if(isset($adslinks))
                                @foreach ($adslinks as $value)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{$value->title}}
                                        </td>
                                        <td>
                                            {{$value->link}}
                                        </td>
                                        @if (!isset($adsLink))
                                            <td>
                                                <a class="btn" href="{{route('ads.edit', $value->id)}}">
                                                    <i class="fa fa-pen text-warning"></i>
                                                    Edit
                                                </a>
                                                <a class="btn" href="{{route('ads.delete', $value->id)}}">
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
                            {{ $adslinks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')

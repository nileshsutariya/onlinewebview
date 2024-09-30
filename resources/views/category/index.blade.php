@include ('layouts.header')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card mb-3 mt-4 card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if (isset($category))
                            <form action="{{route('categories.update')}}" method="POST" enctype="multipart/form-data">
                        @else
                            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <input type="hidden" name="id" value="{{isset($category)? $category->id : old('id')}}">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                            value="{{ isset($category)? $category->name : old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <div class="form-group">
                            <input type="file" name="icon" id="icon">
                            {{-- value="{{ isset($category)? $category->icon : old('icon')}}"> --}}
                            </div>
                            @php
                            if (isset($category)) {
                                echo $id = str_replace('public/imageuploaded/', '', $category->icon);
                            }
                            @endphp
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status" value="1" {{ isset($category) && $category->status == '1' ? 'checked' : '' }} >
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mb-3 mt-4 card-outline card-primary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Category List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="overflow-x:auto;">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    {{-- <th>Icon</th> --}}
                                    <th>Status</th>
                                    @if(!isset($category))
                                    <th> Action </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="category_table_body" >
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($categories as $value)
                                    
                                <tr>           
                                    <td>{{$i++}}</td>
                                    <td>{{$value->name}}</td>
                                    {{-- <td><img src="{{asset('public/imageuploaded/'.$value->icon)}}"
                                        style="width: 100px; height:100px;">
                                    </td> --}}
                                    <td class="text-center">
                                        @if ($value->status == '1')
                                            <button class="btn btn-sm btn-success" id="a" data-val="{{$value->id}}">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-danger" id="a" data-val="{{$value->id}}">Inactive</button>
                                        @endif
                                    </td>
                                    @if (!isset($category))
                                    <td>
                                        <a class="btn update" href="{{ route('categories.edit', $value->id) }}">
                                            <i class="bi bi-pencil-square text-success"></i> Edit
                                        </a>
                                        <a class="btn delete" href="{{route('categories.delete', $value->id)}}">
                                            <i class="fa fa-trash text-danger"></i> Delete
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
<!-- /.container-fluid -->
</section>
<script type="text/javascript">
    $(document).ready(function() {
       $(document).on("click", "#a", function() {
            var id=$(this).attr("data-val");  
           $.ajax ({     
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
                url: "{{route('categories.index')}}", 
               data: {
                   'id':id,
               },
               type: 'GET',
               success: function(data) {
                   console.log(data);
                   $('#category_table_body').html($(data).find('#category_table_body').html());
                //    $('#pagination_links').html($(data).find('#pagination_links').html());                
               }
           });
       });
   });
</script>
@include ('layouts.footer')

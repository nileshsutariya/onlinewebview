@include ('layouts.header')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card mb-3 mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        {{-- @if (isset($categories)) --}}
                            <form action="" method="post" enctype="multipart/form-data">
                            {{-- @else --}}
                                <form action="" method="POST" enctype="multipart/form-data">
                        {{-- @endif --}}
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Icon</label>
                            <div class="form-group">
                            <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status" value="1"  >
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mb-3 mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Category List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a class="btn update">
                                                <i class="bi bi-pencil-square text-success"></i> Edit
                                            </a>
                                            <a class="btn delete">
                                                <i class="fa fa-trash text-danger"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>

                        </table>
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
@include ('layouts.footer')

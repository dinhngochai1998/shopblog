@extends('layouts.admin')
@section('content')
<div class="wrapper">

    @include('includes.adminSidebar')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Category Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">                                             
                                <div class="form-group">
                                    <label for="inputDescription">Name</label>
                                    <input type="text" name="name" id="" class="form-control" required />
                                </div>                       
                            </div>
                            <div class="form-group">
                                    <label for="inputDescription">Sub category</label>
                                    <select name="parent_id" id="">
                                    @foreach ($category as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach                                     
                                    </select>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Create new Category" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection
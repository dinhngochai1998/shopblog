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
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Tag Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        @can('publish articles')
        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('tag.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">                                             
                                <div class="form-group">
                                    <label for="inputDescription">Name</label>
                                    <input type="text" name="name" id="" class="form-control" required />
                                    @error('education')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>                       
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Create new Tag" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        @endcan
        <!-- /.content -->
    </div>

</div>


@endsection
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
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> User Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">                       
                                <input type="hidden" name="id" value="{{ $category->id }}" />
                                <div class="form-group">
                                    <label for="inputName">Name<span style="color:red;">*</span></label>
                                    <input type="text" name="name" value="{{ $category->name }}" id="inputName" class="form-control" required />
                                </div>                      
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Edit new category" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
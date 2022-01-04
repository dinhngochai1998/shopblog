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
            <form novalidate="novalidate" method="POST" action="{{ route('editUser.update.avatar') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">                      
                                <div class="col-md-6">
                                    @if (Auth::user())
                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Avatar<span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <input type="file"  id="adBanner" class="form__file-control" name="avatar" />
                                                        <label for="adBanner" class="form__banner form__file-presenter">
                                                            <img class="form__file-thumb" style="max-width: 200px;" src="{{ asset('storage/avatars/'. Auth::user()->avatar) }}" />
                                                        </label>
                                                    </div>
                                                    @error('avatar')
                                                    <div class="mt-1 text-red-500 error">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>                                                          
                                    @endif
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Edit new user" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
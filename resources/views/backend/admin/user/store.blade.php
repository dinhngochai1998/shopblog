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
        @can('publish articles')
        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name<span style="color:red;">*</span></label>
                                    <input type="text" name="name" id="inputName" class="form-control" required />
                                    @error('name')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email<span style="color:red;">*</span></label>
                                    <input type="email" name="email" id="inputName" class="form-control" required />
                                    @error('email')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <label for="inputName">Gerder<span style="color:red;">*</span></label><br>
                                    <input class="form-check-input" type="radio" value="1" name="gender" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                       Nam
                                    </label>
                                    <br>
                                    <input class="form-check-input" value="0" type="radio" name="gender" id="flexRadioDefault1">
                                    <label class="form-check-label"  for="flexRadioDefault1">
                                       Nu
                                    </label>
                                    @error('gender')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Password<span style="color:red;">*</span></label>
                                    <input type="password" name="password" id="inputName" class="form-control" required />
                                    @error('password')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Title</label>
                                    <input type="text" name="title" id="inputName" class="form-control" required />
                                    @error('title')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Education</label>
                                    <input type="text" name="education" id="" class="form-control" required />
                                    @error('education')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Skill</label>
                                    <input type="text" name="skills" id="" class="form-control" required />
                                    @error('skills')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Location</label>
                                    <input type="text" name="location" id="" class="form-control" required />
                                    @error('location')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Note</label>
                                    <input type="text" name="notes" id="" class="form-control" required />
                                    @error('note')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Birthday</label>
                                    <input type="date" name="birthday" id="" class="form-control" required />
                                    @error('birthday')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Avatar<span style="color:red;">*</span></label>
                                                <div class="input-group">
                                                    <input type="file" id="adBanner" class="form__file-control" name="avatar" />
                                                    <label for="adBanner" class="form__banner form__file-presenter">
                                                        <img class="form__file-thumb" src="" />
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
                        <input type="submit" value="Create new user" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
            @endcan
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection
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
        @can('edit articles')
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                            
                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                <div class="form-group">
                                    <label for="inputName">Name<span style="color:red;">*</span></label>
                                    <input type="text" name="name" value="{{ $user->name }}" id="inputName" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email<span style="color:red;">*</span></label>
                                    <input type="email" name="email" value="{{ $user->email }}"  id="inputName" class="form-control" required />
                                    @error('email')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                             
                                <div class="form-group">
                                    <label for="inputName">Title</label>
                                    <input type="text" name="title" value="{{ $user->title }}" id="inputName" class="form-control" required />
                                    @error('title')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Gender</label>
                                    <select name="gender" id="">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Education</label>
                                    <input type="text" value="{{ $user->education }}" name="education" id="" class="form-control" required />
                                    @error('education')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Skill</label>
                                    <input type="text" value="{{ $user->skills }}" name="skills" id="" class="form-control" required />
                                    @error('skills')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Location</label>
                                    <input type="text" value="{{ $user->location }}" name="location" id="" class="form-control" required />
                                    @error('location')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Note</label>
                                    <input type="text" value="{{ $user->notes }}" name="notes" id="" class="form-control" required />
                                    @error('note')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Birthday</label>
                                    <input type="date" value="{{ $user->birthday }}" name="birthday" id="" class="form-control" required />
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
                                                    <input type="file"  id="adBanner" class="form__file-control" name="avatar" />
                                                    <label for="adBanner" class="form__banner form__file-presenter">
                                                        <img class="form__file-thumb" style="max-width: 150px;" src="{{ asset('storage/avatars/'. $user->avatar) }}" />
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
                        <input type="submit" value="Edit new user" class="btn btn-success float-left mr-2" />
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
@extends('layouts.admin')
@section('content')
<div class="wrapper">

    @include('includes.adminSidebar')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('editUser.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                @if (Auth::user())                                          
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                                <div class="form-group">
                                    <label for="inputName">Name<span style="color:red;">*</span></label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" id="inputName" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email<span style="color:red;">*</span></label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}"  id="inputName" class="form-control" disabled />
                                    @error('email')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                             
                                <div class="form-group">
                                    <label for="inputName">Title</label>
                                    <input type="text" name="title" value="{{ Auth::user()->title }}" id="inputName" class="form-control" required />
                                    @error('title')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Gender</label>
                                    <select name="gender" id="">
                                        <option value="Name">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Education</label>
                                    <input type="text" value="{{ Auth::user()->education }}" name="education" id="" class="form-control" required />
                                    @error('education')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Skill</label>
                                    <input type="text" value="{{ Auth::user()->skills }}" name="skills" id="" class="form-control" required />
                                    @error('skills')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Location</label>
                                    <input type="text" value="{{ Auth::user()->location }}" name="location" id="" class="form-control" required />
                                    @error('location')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Note</label>
                                    <input type="text" value="{{ Auth::user()->notes }}" name="notes" id="" class="form-control" required />
                                    @error('note')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Birthday</label>
                                    <input type="date" value="{{ Auth::user()->birthday }}" name="birthday" id="" class="form-control" required />
                                    @error('birthday')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Update infomation" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
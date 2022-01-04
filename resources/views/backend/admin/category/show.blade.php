@extends('layouts.admin')
@section('content')

<div class="wrapper">

    @include('includes.adminSidebar')
    @include('components.alert')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1875.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-address-book"></i> Category</h1>
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-left mr-2"><i class="fas fa-plus"></i> Add new</a>
                        <button class="btn btn-danger float-left delete_all" data-url=""><i class="fas fa-trash"></i> Bulk Delete</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" id="search-post" data-url="" class="form-control search" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-post">
                                     @include('backend.admin.category.search')
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <!-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div> -->
                    </div>
                    <div class="col-sm-12 col-md-7">

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <div id="sidebar-overlay"></div>
</div>

@endsection
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $("#search").keyup(function() {
        var title = $('#search').val();
        var url = $(this).attr('data-url');
        console.log(title);
        $.ajax({
                url: url,
                type: "GET",
                data: {
                    title
                },
            })
            .done(function(data) {
                if (data.html == " ") {
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.list-post tr').remove();
                $(".list-post").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    });
</script>
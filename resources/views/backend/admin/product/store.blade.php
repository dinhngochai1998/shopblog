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
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Product Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        @can('publish articles')
        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputDescription">Name</label>
                                    <input type="text" name="name" onkeyup="ChangeToSlug()" id="name" class="form-control" required />
                                    @error('name')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required />
                                    @error('slug')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Code</label>
                                    <input type="text" name="code" id="" class="form-control" required />
                                    @error('code')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <div class="form-group">
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                    </div>
                                    @error('description')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">price</label>
                                    <input type="number" name="price" id="" class="form-control" required />
                                    @error('price')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Category</label>
                                    <select name="category_id" id="">
                                        @foreach ($category as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control abc" name="tag_id[]" multiple="multiple">
                                        @foreach ($tag as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Publish and Unpublish</label>
                                    <select name="schedule_status" id="">
                                        <option value="1">Publish</option>
                                        <option value="2">Unpublish</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Schedule a product</label>
                                    <input type="date" id="" name="schedule_product">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image Description</label>
                                    <div class="input-group">
                                        <input type="file" id="adBanner" class="form__file-control" name="product_image[]" multiple />
                                        <label for="adBanner" class="form__banner form__file-presenter">
                                            <img class="form__file-thumb" src="" />
                                        </label>
                                    </div>
                                    @error('image_description')
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
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <input type="file" id="adBanner" class="form__file-control" name="image" />
                                    <label for="adBanner" class="form__banner form__file-presenter">
                                        <img class="form__file-thumb" src="" />
                                    </label>
                                </div>
                                @error('image')
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

                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Create new Product" class="btn btn-success float-left mr-2" />
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

<script src="{{ asset('backend/js/jquery-1.8.3.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<script language="javascript">
    function ChangeToSlug() {
        var name, slug;
        //L???y text t??? th??? input title 
        name = document.getElementById("name").value;
        //?????i ch??? hoa th??nh ch??? th?????ng
        slug = name.toLowerCase();
        //?????i k?? t??? c?? d???u th??nh kh??ng d???u
        slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
        slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
        slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
        slug = slug.replace(/??|???|???|???|???/gi, 'y');
        slug = slug.replace(/??/gi, 'd');
        //X??a c??c k?? t??? ?????t bi???t
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
        slug = slug.replace(/ /gi, "-");
        //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
        //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox c?? id ???slug???
        document.getElementById('slug').value = slug;
    }
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
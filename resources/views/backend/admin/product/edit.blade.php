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
        @can('edit articles')
        <!-- Main content -->
        <section class="content">
            <form novalidate="novalidate" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">                                             
                                <div class="form-group">                            
                                    <label for="inputDescription">Name</label>
                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                    <input type="text" name="name" onkeyup="ChangeToSlug()" value="{{ $product->name }}" id="name" class="form-control" required />
                                    @error('name')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" id="slug" class="form-control" required />
                                    @error('slug')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Code</label>
                                    <input type="text" name="code" value="{{ $product->code }}" id="" class="form-control" required />
                                    @error('code')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>  
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <div class="form-group">
                                        <textarea class="ckeditor form-control" value ="" name="description">{{ $product->description }}</textarea>
                                    </div>
                                    @error('description')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">price</label>
                                    <input type="number" name="price" value="{{ $product->price }}" id="" class="form-control" required />
                                    @error('price')
                                    <div class="mt-1 text-red-500 error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Old Category</label>
                                    <input type="text" value="{{ $product->categories->name }}" id="" class="form-control" required  disabled/>
                           
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
                                <label for="inputDescription">Old tag</label>
                                    <select class="form-control abc"  multiple="multiple" disabled>
                                        @foreach ($product->tags as $value)               
                                                <option selected = "{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="inputDescription">New Tag</label>
                                    <select class="form-control abc" name="tag_id[]" multiple="multiple">
                                        @foreach ($tag as $value)               
                                                <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                        @endforeach
                                    </select>
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
                                            <input type="file" id="adBanner" class="form__file-control" name="product_image[]" multiple/>
                                            <label for="adBanner" class="form__banner form__file-presenter">
                                                @foreach ($product->productImage as $value)
                                                    <img class="form__file-thumb" style="max-width: 100px;" src="{{ asset('storage/avatars/'. $value->product_image) }}" />
                                                @endforeach
                                                
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
                    <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <input type="file" id="adBanner" class="form__file-control" name="image" />
                                            <label for="adBanner" class="form__banner form__file-presenter">
                                                <img class="form__file-thumb" style="max-width: 150px;" src="{{ asset('storage/avatars/'. $product->image) }}" />
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
        //Lấy text từ thẻ input title 
        name = document.getElementById("name").value;
        //Đổi chữ hoa thành chữ thường
        slug = name.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
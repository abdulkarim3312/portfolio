@extends('admin.admin_master')

@section('body')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Blog Category Page</h4><br><br>
                        <form action="{{ route('blog.store.category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_category" type="text"  id="example-text-input">
                                    @error('blog_category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                            </div>
                            {{-- end row --}}
                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Insert Blog Category">
                        </form>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>    

@endsection
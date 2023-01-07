@extends('admin.admin_master')

@section('body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Footer Page Setup</h4><br>
                        <form action="{{ route('update.footer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $footer->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="number" type="number" value="{{ $footer->number }}" id="example-text-input">
                                </div>
                            </div>
                            {{-- end row --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description" class="form-control" rows="5">{{ $footer->short_description }}</textarea>
                                </div>
                            </div>
                            {{-- end row --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="address" type="text" value="{{ $footer->address }}" id="example-text-input">
                                </div>
                            </div>
                            {{-- end row --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" value="{{ $footer->email }}" id="example-text-input">
                                </div>
                            </div>
                            {{-- end row --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="facebook" type="text" value="{{ $footer->facebook }}" id="example-text-input">
                                </div>
                            </div>
                            {{-- end row --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="twitter" type="text" value="{{ $footer->twitter }}" id="example-text-input">
                                </div>
                            </div>
                            {{-- end row --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copy Writer</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="copyright" type="text" value="{{ $footer->copyright }}" id="example-text-input">
                                </div>
                            </div>
                            {{-- end row --}}
                            
                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Footer Page">
                        </form>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>    

@endsection
@extends('admin.admin_master')

@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Portfolio Data</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Show All Portfolio</h4>
                       

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Portfolio Name</th>
                                <th>Portfolio Title</th>
                                <th>Portfolio Image</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($portfolio as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->portfolio_name }}</td>
                                    <td>{{ $item->portfolio_title }}</td>
                                    <td><img src="{{ asset($item->portfolio_image) }}" alt="" style="width:60px; height:50px;"></td>
                                    <td>
                                        <a href="{{ route('edit.portfolio', $item->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                            <i class=" fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.portfolio', $item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                            <i class=" fas fa-trash"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                           
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->  
    </div> <!-- container-fluid -->
</div>
@endsection
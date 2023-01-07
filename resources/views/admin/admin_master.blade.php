<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dashboard |Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('') }}admin/assets/images/favicon.ico">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('') }}admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('') }}admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('') }}admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="{{ asset('') }}admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('') }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('') }}admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        {{-- Toastr Css CDN link --}}

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

        @include('admin.body.header')    
          
            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.body.sidebar')  
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('body')
                <!-- End Page-content -->
               
                @include('admin.body.footer')  
                
            </div>
            <!-- end main content-->

        </div>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('') }}admin/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/node-waves/waves.min.js"></script>

        
        <!-- apexcharts -->
        <script src="{{ asset('') }}admin/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('') }}admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('') }}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="{{ asset('') }}admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="{{ asset('') }}admin/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('') }}admin/assets/js/app.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

       

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>



        {{-- <script>
            // success message popup notification
            @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            @endif
        
            // info message popup notification
            @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
            @endif
        
            // warning message popup notification
            @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
            @endif
        
            // error message popup notification
            @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
            @endif
        </script> --}}

        <!--tinymce js-->
        <script src="{{ asset('') }}admin/assets/libs/tinymce/tinymce.min.js"></script>

        <!-- init js -->
        <script src="{{ asset('') }}admin/assets/js/pages/form-editor.init.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('') }}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('') }}admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Datatable init js -->
        <script src="{{ asset('') }}admin/assets/js/pages/datatables.init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="{{ asset('admin/assets/js/code.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>

    </body>
</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin_assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin_assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
    <!--plugins-->

    <link href="{{ asset('admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

    <!-- loader-->
    <link href="{{ asset('admin_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin_assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Amdash - Bootstrap 5 Admin Template</title>

    <style>
        .scrollable-row {
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 15px;
            /* Optional: Adds space for the scrollbar */
        }

        .scrollable-row .row {
            flex-wrap: nowrap;
            /* Prevents wrapping of columns to the next line */
        }
    </style>

</head>

<body onload="info_noti()">

    {{-- Header file include --}}
    @include('admin.inc.header')

    {{-- Main body app.blade.php start --}}

    @section('container')

    @show


    {{-- Main body app.blade.php end --}}

    {{-- Header file include --}}
    @include('admin.inc.footer')

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <!--notification js -->
    <script src="{{ asset('admin_assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('admin_assets/js/app.js') }}"></script>
    <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- Dependent category and sub category fetch code using jquery and ajax --}}

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                let categoryId = $(this).val();
                let csrf = $("meta[name='csrf-token']").attr("content");
                $('#subsubcategory').html(' <option selected disabled>Choose</option>');
                $.ajax({
                    type: "post",
                    url: "/getsub-category",
                    data: {
                        categoryId: categoryId,
                        _token: csrf
                    },

                    success: function(response) {
                        $('#subcategory').html(response)
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#subcategory').change(function() {
                let subCategoryId = $(this).val();
                let csrf = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    type: "post",
                    url: "/getsub-sub-category",
                    data: {
                        subCategoryId: subCategoryId,
                        _token: csrf
                    },

                    success: function(response) {
                        $('#subsubcategory').html(response)
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#image-uploadify1').imageuploadify();
        })
    </script>


    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>

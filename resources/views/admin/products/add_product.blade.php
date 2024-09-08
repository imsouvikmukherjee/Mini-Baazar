@extends('admin.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('container')
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Add Products</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        {{-- <button type="button" class="btn btn-primary">Back</button> --}}
                        <a href="{{ route('manage_product') }}" class="btn btn-primary">Back</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    {{-- <h5 class="card-title">Add New Product</h5>
					  <hr/> --}}
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Title</label>
                                            <input type="text" class="form-control" id="inputProductTitle" name="product_title"
                                                placeholder="Enter product title">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Short Description</label>
                                            <input type="text" class="form-control" id="inputProductTitle" name="short_description"
                                                placeholder="Enter short description">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Long Description</label>
                                            <textarea class="form-control" id="editor" rows="3" name="long_description" placeholder="Enter long description"></textarea>
                                        </div>

                                        <div class="mb-3 mt-4">
                                            <h6 class="mb-0 text-uppercase">Product Varient</h6>
                                            <hr />
                                            {{-- <div class="card">
                                    <div class="card-body"> --}}
                                            <ul class="nav nav-pills mb-3" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" data-bs-toggle="pill"
                                                        href="#primary-pills-home" role="tab" aria-selected="true">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-icon">
                                                            </div>
                                                            <div class="tab-title">Single Product</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile"
                                                        role="tab" aria-selected="false">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-icon">
                                                            </div>
                                                            <div class="tab-title">Bulk Product</div>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="primary-pills-home"
                                                    role="tabpanel">

                                                    {{-- <p class="mb-0 text-uppercase">Product Size</p>
                                                <hr/> --}}
                                                    <div class="scrollable-row my-4">


                                                        <button type="button" class="btn btn-light btn-sm add-row"><i
                                                                class="bi bi-plus-lg"></i> Add Size</button>

                                                        <div id="row-container">

                                                        </div>
                                                    </div>



                                                    <div class="mb-3">
                                                        <label for="inputProductDescription" class="form-label">Product
                                                            Images</label>
                                                        <input id="image-uploadify" type="file"
                                                            accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                            multiple>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">

                                                    <div class="scrollable-row my-4">


                                                        <button type="button" class="btn btn-light btn-sm add-size-row"><i
                                                                class="bi bi-plus-lg"></i> Add Size</button>

                                                        <div id="size-row-container">

                                                        </div>
                                                    </div>

                                                    <hr>


                                                    <div class="scrollable-row my-4">


                                                        <button type="button" class="btn btn-light btn-sm add-color-row"><i
                                                                class="bi bi-plus-lg"></i> Add Color</button>

                                                        <div id="color-row-container">

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            {{-- </div>
                                </div> --}}
                                        </div>




                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" id="inputProductTitle"
                                                placeholder="Enter product title">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Meta Keywords</label>
                                            <input type="text" class="form-control" name="meta_keywords" placeholder="Enter meta keywords"
                                                data-role="tagsinput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Meta Description</label>
                                            <input type="text" class="form-control" id="inputProductTitle" name="meta_description"
                                                placeholder="Enter product title">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">

                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Category</label>
                                                <select class="form-select" id="category" name="category">
                                                    <option selected disabled>Choose</option>
                                                    @foreach($mcatogories as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputVendor" class="form-label">Sub Category</label>
                                                <select class="form-select" id="subcategory" name="sub_category">
                                                    <option selected disabled>Choose</option>


                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputCollection" class="form-label">Sub Sub Category</label>
                                                <select class="form-select" id="subsubcategory" name="sub_sub_category">
                                                    <option selected disabled>Choose</option>

                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputCollection" class="form-label">Manufacturer</label>
                                                <select class="form-select" id="inputCollection" name="manufacturer">
                                                    <option selected disabled>Choose</option>
                                                    @foreach ($manufacturers as $item)
                                                    <option value="{{$item->id}}">{{$item->brand}}</option>
                                                    @endforeach


                                                </select>
                                            </div>

                                            <h6 class="mt-5">Price & Shipping</h6>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="inputPrice" class="form-label">Model</label>
                                                <input type="text" class="form-control" id="inputPrice" name="model">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCompareatprice" class="form-label">SKU</label>
                                                <input type="text" class="form-control" id="inputCompareatprice" name="sku">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCostPerPrice" class="form-label">Tax Class</label>
                                                <select class="form-select" id="inputCollection" name="tax_class">
                                                    <option selected disabled>Choose</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">GST</label>
                                                <input type="number" class="form-control" id="inputStarPoints" name="gst">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">HSN Code</label>
                                                <input type="number" class="form-control" id="inputStarPoints" name="hsn_code">
                                            </div>

                                            <h6 class="mt-5">Product Dimension</h6>
                                            <hr>

                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Length</label>
                                                <input type="text" class="form-control" id="inputStarPoints" name="length">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Width</label>
                                                <input type="text" class="form-control" id="inputStarPoints" name="width">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Height</label>
                                                <input type="text" class="form-control" id="inputStarPoints" name="height">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Available Date
                                                </label>
                                                <input type="date" class="form-control" id="inputStarPoints" name="available_date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Weight Class
                                                </label>
                                                <select class="form-select" id="inputCollection" name="weight_class">
                                                    <option selected disabled>Choose</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>


                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Weight</label>
                                                <input type="text" class="form-control" id="inputStarPoints" name="weight">
                                            </div>


                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Stock Status
                                                </label>
                                                <select class="form-select" id="inputCollection" name="stock_status">
                                                    <option selected disabled>Choose</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Status
                                                </label>
                                                <select class="form-select" id="inputCollection" name="status">
                                                    <option selected disabled>Choose</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>

                                            <hr>

                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Sort Product</label>
                                                <input type="number" class="form-control" id="inputStarPoints" name="sort_product">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Maximum Order</label>
                                                <input type="number" class="form-control" id="inputStarPoints" name="maximum_order">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Payment Type</label>
                                                <select class="form-select" id="inputCollection" name="payment_type">
                                                    <option selected disabled>Choose</option>
                                                    <option value="1">Cash On Delivery</option>
                                                    <option value="2">Online Payments</option>
                                                    <option value="3">Both</option>
                                                </select>
                                            </div>

                                            {{-- <div class="col-12">
									<label for="inputProductTags" class="form-label">Product Tags</label>
									<input type="text" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
								  </div> --}}
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-primary">Save Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rowContainer = document.getElementById('row-container');

        // Function to create a new row
        function createRow() {
            const newRow = document.createElement('div');
            newRow.className = 'row my-4';
            newRow.innerHTML = `
            <div class="col-md-3">
                <label for="inputSize" class="form-label">Label</label>
                <input type="text" class="form-control" placeholder="Label">
            </div>
            <div class="col-md-3">
                <label for="inputMRP" class="form-label">MRP</label>
                <input type="number" class="form-control" placeholder="MRP">
            </div>
            <div class="col-md-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="number" class="form-control" placeholder="Price">
            </div>
            <div class="col-md-3">
                <label for="inputQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" placeholder="Quantity">
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm mt-4 shadow-lg remove-row"><i class="bi bi-x-lg"></i></button>
            </div>
        `;

            // Attach event listener to the remove button in the new row
            newRow.querySelector('.remove-row').addEventListener('click', function() {
                this.closest('.row').remove();
            });

            return newRow;
        }

        // Event listener for the Add Row button
        document.querySelector('.add-row').addEventListener('click', function() {
            const newRow = createRow();
            rowContainer.appendChild(newRow);
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rowContainer = document.getElementById('size-row-container');

        // Function to create a new row
        function createRow() {
            const newRow = document.createElement('div');
            newRow.className = 'row my-4';
            newRow.innerHTML = `
            <div class="col-md-3">
                <label for="inputSize" class="form-label">Label</label>
                <input type="text" class="form-control" placeholder="Label">
            </div>
            <div class="col-md-3">
                <label for="inputMRP" class="form-label">MRP</label>
                <input type="number" class="form-control" placeholder="MRP">
            </div>
            <div class="col-md-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="number" class="form-control" placeholder="Price">
            </div>
            <div class="col-md-3">
                <label for="inputQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" placeholder="Quantity">
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm mt-4 shadow-lg remove-row"><i class="bi bi-x-lg"></i></button>
            </div>
        `;

            // Attach event listener to the remove button in the new row
            newRow.querySelector('.remove-row').addEventListener('click', function() {
                this.closest('.row').remove();
            });

            return newRow;
        }

        // Event listener for the Add Row button
        document.querySelector('.add-size-row').addEventListener('click', function() {
            const newRow = createRow();
            rowContainer.appendChild(newRow);
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rowContainer = document.getElementById('color-row-container');

        // Function to create a new row
        function createRow() {
            const newRow = document.createElement('div');
            newRow.className = 'row my-4';
            newRow.innerHTML = `
            <div class="col-md-3">
                <label for="inputSize" class="form-label">Label</label>
                <input type="text" class="form-control" placeholder="Label">
            </div>
            <div class="col-md-3">
                <label for="inputMRP" class="form-label">MRP</label>
                <input type="number" class="form-control" placeholder="MRP">
            </div>
            <div class="col-md-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="number" class="form-control" placeholder="Price">
            </div>
            <div class="col-md-3">
                <label for="inputQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" placeholder="Quantity">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Color</label>
                <input type="text" class="form-control" placeholder="Color">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 1</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 2</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 3</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 4</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 5</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 6</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

             <div class="col-md-3">
                <label for="inputSize" class="form-label">Image 7</label>
                <input type="file" class="form-control" placeholder="image 1">
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm mt-4 shadow-lg remove-color-row"><i class="bi bi-x-lg"></i></button>
            </div>
        `;

            // Attach event listener to the remove button in the new row
            newRow.querySelector('.remove-color-row').addEventListener('click', function() {
                this.closest('.row').remove();
            });

            return newRow;
        }

        // Event listener for the Add Row button
        document.querySelector('.add-color-row').addEventListener('click', function() {
            const newRow = createRow();
            rowContainer.appendChild(newRow);
        });
    });
</script>





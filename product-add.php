<?php
require_once('./common/head.php');
require_once('./common/header.php');
require_once('./common/sidebar.php');
?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Item</h4>
                    <h6>Add New Item</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
                </li>
            </ul>
            <div class="page-btn">
                <a href="./product-list.php" class="btn btn-primary"><i class="fa-solid fa-list-ul me-1"></i></i>Item List</a>
            </div>
            <div class="page-btn mt-0">
                <a href="product-list.html" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back</a>
            </div>
        </div>
        <form action="https://dreamspos.dreamstechnologies.com/html/template/add-product.html" class="add-product-form">
            <div class="add-product">
                <div class="accordions-items-seperate" id="accordionSpacingExample">
                    <div class="accordion-item border mb-4">
                        <h2 class="accordion-header" id="headingSpacingOne">
                            <div class="accordion-button collapsed bg-white" data-bs-toggle="collapse" data-bs-target="#SpacingOne" aria-expanded="true" aria-controls="SpacingOne">
                                <div class="d-flex align-items-center justify-content-between flex-fill">
                                    <h5 class="d-flex align-items-center"><i data-feather="info" class="text-primary me-2"></i><span>Product Information</span></h5>
                                </div>
                            </div>
                        </h2>
                        <div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne">
                            <div class="accordion-body border-top">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name<span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Print Name<span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Product Kgs/Qty<span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Alternate Qty<span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Coupon Point<span class="text-danger ms-1">*</span></label>
                                            <select class="select">
                                                <option value="">Select</option>
                                                <option value="0">Zero</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Warehouse<span class="text-danger ms-1">*</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Lavish Warehouse</option>
                                                <option>Quaint Warehouse</option>
                                                <option>Traditional Warehouse</option>
                                                <option>Cool Warehouse</option>
                                                <option>Overflow Warehouse</option>
                                                <option>Nova Storage Hub</option>
                                                <option>Retail Supply Hub</option>
                                                <option>EdgeWare Solutions</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>




                                <!-- Editor -->
                                <div class="col-lg-12">
                                    <div class="summer-description-box">
                                        <label class="form-label">Description</label>
                                        <div id="summernote"></div>
                                        <p class="fs-14 mt-1">Maximum 60 Words</p>
                                    </div>
                                </div>
                                <!-- /Editor -->
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-lg-12">
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
    </div>
    <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
        <p class="mb-0 text-gray-9">2014 - 2025 &copy; DreamsPOS. All Right Reserved</p>
        <p>Designed &amp; Developed by <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
    </div>
</div>

<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content p-5 px-3 text-center">
                    <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i class="ti ti-trash fs-24 text-danger"></i></span>
                    <h4 class="fs-20 text-gray-9 fw-bold mb-2 mt-1">Delete Product</h4>
                    <p class="text-gray-6 mb-0 fs-16">Are you sure you want to delete product?</p>
                    <div class="modal-footer-btn mt-3 d-flex justify-content-center">
                        <button type="button" class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('./common/footer.php');
?>
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
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
                </li>
            </ul>
            <div class="am-page-upr-btn">
                <div class="left-btn">
                    <div class="page-btn">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-file"><i class="ti ti-upload me-1"></i>Import</a>
                    </div>

                    <div class="page-btn">
                        <a href="./product-list.php" class="btn btn-info"><i class="fa-solid fa-list-ul me-1"></i></i>Item List</a>
                    </div>
                </div>
                <div class="page-btn goBack">
                    <a href="#" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back</a>
                </div>
            </div>
        </div>
        <form class="add-product-form">
            <div class="add-product">
                <div class="card mb-4">

                    <div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne">
                        <div class="accordion-body border-top">
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"> Name<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter item name" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="print-name">Print Name<span class="text-danger ms-1">*</span></label>
                                        <input type="text" id="print-name" class="form-control" placeholder="Enter print name">
                                    </div>
                                </div>


                                <div class="col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="item-kg">Item Kgs/Qty<span class="text-danger ms-1">*</span></label>
                                        <input type="text" id="item-kg" class="form-control" placeholder="Enter item in kgs/qty">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="alt-qty">Alternate Qty<span class="text-danger ms-1">*</span></label>
                                        <input type="text" id="alt-qty" class="form-control" placeholder="Enter alternate quantity">
                                    </div>
                                </div>


                                <div class="col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Coupon Point<span class="text-danger ms-1">*</span></label>
                                        <select class="select2 ">
                                            <option value="">Select </option>
                                            <option value="0">Zero</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Warehouse<span class="text-danger ms-1">*</span></label>
                                        <select class="select2 form-select">
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
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="remark">Remark</span></label>
                                        <textarea id="remark" class="form-control" placeholder="Enter remark"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /Editor -->
                        </div>
                    </div>
                </div>




            </div>
            <div class="col-lg-12">
                <div class="d-flex align-items-center justify-content-start mb-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="modal fade" id="import-file">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-title">
                    <h4>Import Items</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Upload file <span class="text-danger">*</span></label>
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once('./common/footer.php');
?>
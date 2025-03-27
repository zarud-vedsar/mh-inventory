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
                    <h4 class="fw-bold">Party</h4>
                    <h6>Add New Party</h6>
                </div>
            </div>
            <ul class="table-top-head">

                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                            class="ti ti-chevron-up"></i></a>
                </li>
            </ul>
            <div class="am-page-upr-btn">
                <div class="left-btn">
                    <div class="page-btn">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-file"><i
                                class="ti ti-upload me-1"></i>Import</a>
                    </div>

                    <div class="page-btn">
                        <a href="./party-list.php" class="btn btn-info"><i
                                class="fa-solid fa-list-ul me-1"></i></i>Party List</a>
                    </div>
                </div>
                <div>
                    <div class="page-btn goBack">
                        <a href="#" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back</a>
                    </div>
                </div>

            </div>

        </div>
        <form class="add-product-form">
            <div class="add-product">
                <div class="card mb-4">

                    <div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne">
                        <div class="accordion-body border-top">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name"> Name<span
                                                class="text-danger ms-1">*</span></label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="Enter party name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="phn"> Phone Number<span
                                                class="text-danger ms-1">*</span></label>
                                        <input type="number" id="phn" class="form-control"
                                            placeholder="Enter phone number">
                                    </div>
                                </div>

                            </div>





                            <!-- Editor -->
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address</span></label>
                                        <textarea id="address" class="form-control"
                                            placeholder="Enter address"></textarea>
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
                    <h4>Import Parties</h4>
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
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
                    <h4>Warehouses</h4>
                </div>
            </div>
            <div class="page-btn">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-warehouse"><i class="ti ti-circle-plus me-1"></i>Add Warehouse</a>
            </div>
        </div>
        <!-- /product list -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                <div class="search-set">
                    <div class="search-input">
                        <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                    </div>
                </div>
                <div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            Status
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>Warehouse</th>
                                <th>Total Items</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-gray-9"><a href="">Lavish Warehouse </a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="avatar avatar-md"><img src="assets/img/warehouse/avatar-01.png" class="img-fluid rounded-2" alt="img"></a>
                                        <div class="ms-2">
                                            <p class="mb-0"><a href="#" class="text-default">Chad Taylor</a></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="action-table-data">
                                    <div class="edit-delete-action">
                                        <a class="me-2 p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-warehouse">
                                            <i data-feather="edit" class="feather-edit"></i>
                                        </a>
                                        <a class="p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->

    </div>

</div>

<!-- Add Warehouse -->
<div class="modal fade" id="add-warehouse">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-title">
                    <h4>Add Warehouse</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/warehouse.html">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Warehouse <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Contact Person <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Steven</option>
                                    <option>Gravely</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Phone(Work)</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10 col-10">
                            <div class="mb-3">
                                <label class="form-label">City <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Varrel</option>
                                    <option>Los Angels</option>
                                    <option>Munich</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10 col-10">
                            <div class="mb-3">
                                <label class="form-label">State <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Bavaria</option>
                                    <option>New York City</option>
                                    <option>California</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10 col-10">
                            <div class="mb-3">
                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Germany</option>
                                    <option>Mexico</option>
                                    <option>United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-0">
                                <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                    <span class="status-label">Status</span>
                                    <input type="checkbox" id="users5" class="check" checked>
                                    <label for="users5" class="checktoggle mb-0"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Warehouse</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Warehouse -->
<div class="modal fade" id="edit-warehouse">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-title">
                    <h4>Edit Warehouse</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/warehouse.html">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Warehouse <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Lavish Warehouse">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Contact Person <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option selected>Steven</option>
                                    <option>Gravely</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" value="electromart@example.com">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="+12498345785">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Phone(Work)</label>
                                <input type="text" class="form-control" value="+17538647943">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="46 Perry Street">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10 col-10">
                            <div class="mb-3">
                                <label class="form-label">City <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option selected>Varrel</option>
                                    <option>Los Angels</option>
                                    <option>Munich</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10 col-10">
                            <div class="mb-3">
                                <label class="form-label">State <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option selected>Bavaria</option>
                                    <option>New York City</option>
                                    <option>California</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-10 col-10">
                            <div class="mb-3">
                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option selected>Germany</option>
                                    <option>Mexico</option>
                                    <option>United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="10176">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-0">
                                <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                    <span class="status-label">Status</span>
                                    <input type="checkbox" id="users6" class="check" checked>
                                    <label for="users6" class="checktoggle mb-0"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Edit Warehouse -->

<!-- Delete Modal -->
<div class="modal fade" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5">
            <div class="modal-body text-center p-0">
                <span class="rounded-circle d-inline-flex p-2 bg-danger-transparent mb-2"><i class="ti ti-trash fs-24 text-danger"></i></span>
                <h4 class="fs-20 text-gray-9 fw-bold mb-2 mt-1">Delete Warehouse</h4>
                <p class="text-gray-6 mb-0 fs-16">Are you sure you want to delete warehouse?</p>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn me-2 btn-secondary fs-13 fw-medium p-2 px-3 shadow-none" data-bs-dismiss="modal">Cancel</a>
                    <a href="warehouse.html" class="btn btn-primary fs-13 fw-medium p-2 px-3">Yes Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->
<!-- /Add Warehouse -->

<?php
require_once('./common/footer.php');
?>
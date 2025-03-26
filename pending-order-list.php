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
                    <h4 class="fw-bold">Pending Order List</h4>
                    <h6>Manage pending orders</h6>
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
                        <a href="./pending-orders.php" class="btn btn-primary"><i class="ti ti-circle-plus me-1"></i>Pending orders</a>
                    </div>
                    <div class="page-btn">
                        <a href="#" class="btn btn-info">
                            <i class="ti ti-reload"></i>

                            Recycle Bin</a>
                    </div>
                </div>
                <div class="page-btn goBack">
                    <a href="#" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back</a>
                </div>
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

            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>

                                <th>#<img src="./assets/img/svg_icons/right-left-arrow.svg" alt="" class="am-sort-icon"></th>
                                <th> Order ID <img src="./assets/img/svg_icons/right-left-arrow.svg" alt="" class="am-sort-icon">
                                </th>
                                <th> Order Date<img src="./assets/img/svg_icons/right-left-arrow.svg" alt="" class="am-sort-icon"></th>
                                <th> Party<img src="./assets/img/svg_icons/right-left-arrow.svg" alt="" class="am-sort-icon"></th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>1 </td>
                                <td>
                                    OID28365
                                </td>
                                <td>
                                    3/3/2025
                                </td>
                                <td>VEDSAR PVT. LTD.</td>


                                <td class="action-table-data">
                                    <div class="edit-delete-action">

                                        <a class="me-2 p-2" href="./pending-orders.php">
                                            <i class="fa-solid fa-eye text-warning"></i>
                                        </a>
                                        <a class="me-2 p-2" href="./pending-orders.php">
                                            <i data-feather="edit" class="feather-edit text-info"></i>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <td>2 </td>
                                <td>
                                    OID28369
                                </td>
                                <td>
                                    3/3/2025
                                </td>
                                <td>VEDSAR PVT. LTD.</td>


                                <td class="action-table-data">
                                    <div class="edit-delete-action">

                                        <a class="me-2 p-2" href="./party-add.php">
                                            <i class="fa-solid fa-eye text-warning"></i>
                                        </a>
                                        <a class="me-2 p-2" href="./party-add.php">
                                            <i data-feather="edit" class="feather-edit text-info"></i>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <td>3 </td>
                                <td>
                                    OID28365
                                </td>
                                <td>
                                    3/3/2025
                                </td>
                                <td>VEDSAR PVT. LTD.</td>


                                <td class="action-table-data">
                                    <div class="edit-delete-action">

                                        <a class="me-2 p-2" href="./party-add.php">
                                            <i class="fa-solid fa-eye text-warning"></i>
                                        </a>
                                        <a class="me-2 p-2" href="./party-add.php">
                                            <i data-feather="edit" class="feather-edit text-info"></i>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
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



<?php
require_once('./common/footer.php');
?>
<?php
require_once('./common/head.php');
require_once('./common/header.php');
require_once('./common/sidebar.php');
?>

<script>
    let rowCount = 1;

    function addRow() {
        const tableBody = document.querySelector("table tbody");

        const newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td>${rowCount}</td> <!-- Dynamic Sr. no. -->
            <td>
                <div>
                    <select class="select2 form-select">
                        <option>Select</option>
                        <option>Code 128</option>
                        <option>Code 39</option>
                        <option>UPC-A</option>
                        <option>UPC_E</option>
                        <option>EAN-8</option>
                        <option>EAN-13</option>
                    </select>
                </div>
            </td>
            <td>
                <div>
                    <input type="text" class="form-control" placeholder="Enter quantity">
                </div>
            </td>
            <td>
                <div>
                    <input type="text" class="form-control" placeholder="Enter weight">
                </div>
            </td>
            <td>
                <div>
                    <input id="remark" class="form-control" placeholder="Enter remark">
                </div>
            </td>
            <td >
                <div class="d-flex justify-content-center" >
                <label class="checkboxs">
                    <input type="checkbox" onchange="toggleDispatchDate(this)">
                    <span class="checkmarks"></span>
                </label>
                </div>
            </td>
            <td>
                <div>
                    <input type="date" class="form-control dispatch-date" style="display:none;" placeholder="dd/mm/yyyy">
                </div>
            </td>
            <td class="">
                <a href="javascript:void(0);" class="barcode-delete-icon" onclick="deleteRow(this)">
                <i class="fa-solid fa-xmark text-danger" ></i>
                </a>
            </td>
        `;

        tableBody.appendChild(newRow);

        rowCount++;

        updateSrNo();
    }

    function deleteRow(deleteButton) {
        const row = deleteButton.closest('tr');
        row.remove();

        updateSrNo();
    }

    function updateSrNo() {
        const rows = document.querySelectorAll("table tbody tr");
        rows.forEach((row, index) => {
            row.cells[0].textContent = index + 1;
        });
    }

    function toggleDispatchDate(checkbox) {
        const dispatchDateInput = checkbox.closest('tr').querySelector('.dispatch-date');

        if (checkbox.checked) {
            dispatchDateInput.style.display = 'block';
        } else {
            dispatchDateInput.style.display = 'none';
        }
    }
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelector('#addRow').addEventListener('click', function(e) {

            e.preventDefault();
            addRow();
        });
    })
</script>




<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Pending Orders</h4>
                    <h6>Add pending orders</h6>
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
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-order"><i class="ti ti-upload me-1"></i>Import</a>
                    </div>

                    <div class="page-btn">
                        <a href="./party-list.php" class="btn btn-info"><i class="fa-solid fa-list-ul me-1"></i></i> Order List</a>
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
                                    <div class="col-sm-2 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Date<span class="text-danger ms-1">*</span></label>

                                            <div class="input-groupicon calender-input">
                                                <input type="date" class=" form-control" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="name"> Invoice Number<span class="text-danger ms-1">*</span></label>
                                            <input type="text" id="name" class="form-control" placeholder="Enter invoice number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label"> Party<span class="text-danger ms-1">*</span></label>
                                            <select class="select2">
                                                <option>Select</option>
                                                <option>Code 128</option>
                                                <option>Code 39</option>
                                                <option>UPC-A</option>
                                                <option>UPC_E</option>
                                                <option>EAN-8</option>
                                                <option>EAN-13</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-12 d-flex align-items-end mb-3 ">
                                        <div class="btn">
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-order"><i class="ti ti-circle-plus me-1"></i>Add </a>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-3 bg-light rounded border mb-3">
                                            <div class="table-responsive rounded border">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. no.</th>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            <th>Kg/Qty</th>
                                                            <th>Remarks</th>
                                                            <th> Dispatched </th>
                                                            <th>Dispatch Date</th>

                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="col-sm-2 col-12  mb-3 mt-2">
                                                <div>
                                                    <a href="#" class="btn btn-primary" id="addRow"><i class="ti ti-circle-plus me-1"></i>Add Item</a>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7 col-12 mb-3">
                                        <label class="form-label" for="note">Note</span></label>
                                        <textarea id="note" class="form-control" placeholder="Enter note" style="height:70%;"></textarea>
                                    </div>

                                    <div class="col-sm-5 col-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ttl-bg"> Total number of bags <span class="text-danger ms-1">*</span></label>
                                                    <input type="text" id="ttl-bg" class="form-control" placeholder="Enter total number of bags">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ttl-cpn"> Total number of coupons<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" id="ttl-cpn" class="form-control" placeholder="Enter total number of coupons">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ttl-wgt"> Total weight (kgs)<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" id="ttl-wgt" class="form-control" placeholder="Enter total weight in kg">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="factory"> Factory<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" id="factory" class="form-control" placeholder="Enter factory name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="shop"> Shop<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" id="shop" class="form-control" placeholder="Enter shop name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="vehicle_no"> Transport / Lorry Number<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" id="vehicle_no" class="form-control" placeholder="Enter transport / lorry number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="row">

                                </div>
                            </div>
                        </div>

                    </div>
                
                <div class="col-lg-12">
                    <div class="d-flex align-items-center justify-content-start mb-4">
                        <button type="submit" class="btn btn-primary me-1">Save</button>
                        <a href="javascript:void(0);" class="btn btn-cancel btn-info close-btn">
                            <span><i class="fas fa-print me-1"></i></span>Print Barcode
                        </a>
                    </div>
                </div>
        </form>
    </div>

</div>



<div class="modal fade" id="add-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="page-title">
                    <h4>Add Order</h4>
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
                                <label class="form-label"> Order <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
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
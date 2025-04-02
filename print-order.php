<?php
require_once('./common/head.php');
require_once('./common/header.php');
require_once('./common/sidebar.php');
if ($action->db->validateGetData('oid') && filter_var($action->db->validateGetData('oid'), FILTER_VALIDATE_INT)) {
    $id = $action->db->validateGetData('oid');
    $order_item = $action->db->sql("SELECT aimo_party.party_name, aimo_party.party_phone, aimo_party.address, aimo_order.* FROM aimo_order LEFT JOIN aimo_party ON aimo_order.pending_party = aimo_party.id WHERE aimo_order.id = $id");
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<style>
    #ai-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid rgb(206, 203, 203);
    }

    #ai-table th,
    td {
        border-bottom: 1px solid rgb(229, 226, 226);
        padding: 15px;
    }

    .ai-tbody {
        border-top: 1px solid rgb(231, 231, 231);
        padding: 15px;
        text-align: center;
    }

    .total {
        text-align: right;
        margin: 20px 80px 0 0;
    }

    .ai-pairagraf {
        display: flex;
        justify-content: right;
        margin-right: 40px;
        margin-bottom: 10px;
    }

    .ai-pairagraf-2 {
        margin-left: 20px;
    }
</style>
<div class="page-wrapper bg-white">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Pending Orders Receipt</h4>
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
                </div>
                <div>
                    <div class="page-btn goBack">
                        <a href="#" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="content" class="ai-table-container" style="width: 27cm;">
                        <div class="ai-table-header d-flex justify-content-between">
                            <p class="ai-pairagraf-2">Party Name: <?= @$order_item[0]['party_name']; ?></p>
                            <p class="ai-pairagraf"> Order Date:
                                <?= date('d/m/Y', strtotime($order_item[0]['order_date'])); ?>
                            </p>
                        </div>
                        <table id="ai-table">
                            <thead>
                                <tr>
                                    <th>SL.NO.</th>
                                    <th>ITEM NAME</th>
                                    <th>QTY</th>
                                    <th>x</th>
                                    <th>KG/QTY</th>
                                    <th>REMARKS</th>
                                </tr>
                            </thead>
                            <tbody class="ai-tbody">
                                <?php
                                if (isset($order_item) && $order_item) {
                                    $decoded = json_decode($order_item[0]['item'], true);
                                    // echo "<pre>";
                                    // print_r($decoded);
                                    if ($decoded) {
                                        $sr = 1;
                                        foreach ($decoded as $d) {
                                            $itemName = $action->db->sql("SELECT item_name, print_name FROM aimo_item WHERE id = {$d['item_id']}");
                                            ?>
                                            <tr>
                                                <td><?= $sr++; ?></td>
                                                <td><?= $itemName[0]['item_name']; ?></td>
                                                <td><?= $d['item_qty']; ?></td>
                                                <td></td>
                                                <td><?= $d['item_kg']; ?></td>
                                                <td><?= base64_decode($d['remark']); ?></td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                            </tbody>
                        </table>
                        <p class="total"> Transport/Lorry No: <?= @$order_item[0]['vehicle_no']; ?></p>
                        <p class="total">Total No. Of Bags: <?= @$order_item[0]['no_of_bags']; ?></p>
                        <p class="total">Total No. Of Coupon: <?= @$order_item[0]['no_of_coupon']; ?></p>
                        <p class="total">Total Kgs: <?= @$order_item[0]['t_weight']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Download Button -->
        <button id="download" class="btn btn-primary">Download as PDF</button>
    </div>
</div>

<?php
require_once('./common/footer.php');
?>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        document.getElementById('download').addEventListener('click', () => {

            const element = document.getElementById('content');
            // console.log(element);
            const options = {
                margin: [0.4, 0.2, 0.4, 0],  // Increase margins to avoid content getting cut
                jsPDF: {
                    unit: 'in',  // Unit for the page size (inches)
                    format: 'a4',  // Format for the document (A4 size)
                    orientation: 'landscape',  // Orientation of the page (landscape)
                    autoFirstPage: true, // Automatically add a first page if needed
                },
                pagebreak: { mode: ['css', 'legacy'] }, // Use both CSS and legacy methods for page breaks
            };

            html2pdf()
                .from(element)
                .set(options)
                .save('receipt-.pdf');
        });
    });

</script>
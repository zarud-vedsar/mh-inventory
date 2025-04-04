<?php
require_once('./common/head.php');
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
        margin: 0;
        margin-top: 20px;
        padding: 0;
        border: 2px solid #ccc;
    }

    #ai-table th {
        background-color: #F2F2F2;
        font-weight: 500;
    }

    #ai-table td {
        font-weight: 400;
    }

    #ai-table th,
    td {
        border: 2px solid #ccc;
        padding: 2px;
        font-size: 16px;
        color: #000;
        text-align: center;
    }

    .ai-tbody {
        padding: 3px;
        text-align: start;
    }

    .total {
        display: flex;
        justify-content: space-between;
        align-items: end;
        margin: 20px auto 0 0;
        border-bottom: 2px solid #ccc;
        font-size: 1.2rem;
    }

    p {
        color: #000 !important;
        font-weight: 500;
    }

    .ai-pairagraf {
        display: flex;
        justify-content: right;
        margin-right: 40px;
        margin-bottom: 5px;
        color: #000;
    }
    .note{
        font-size: 1.2rem;
        margin-top: 20px;
        margin-bottom: 0;
    }
</style>
<div class="page-wrapper bg-light w-100 p-0 m-0">
    <div class="row">
        <div class="col-md-10 px-0 text-end">
            <!-- <button id="download" class="btn btn-primary">Download as PDF</button> -->
            <a href="#" class="btn btn-orange" id="print"><i class="fas fa-print me-1"></i> Print</a>

            <a href="./pending-order-list.php" class="btn btn-info"><i class="fa-solid fa-list-ul me-1"></i>
            Order List</a>
            <a href="#" class="btn btn-secondary" id="back"><i data-feather="arrow-left" class="me-2"></i>Back</a>
        </div>
    </div>
    <div class="content">
        <div class="container bg-white" id="content" style="width: 27cm;margin: 0 auto;">
            <div class="row">
                <div class="col-md-12">
                    <div class="ai-table-container">
                        <div class="ai-table-header d-flex justify-content-between">
                            <p class="ai-pairagraf-2">Party Name: <?= @$order_item[0]['party_name']; ?></p>
                            <p class="ai-pairagraf"> Order Date:
                                <?= date('d/m/Y', strtotime($order_item[0]['order_date'])); ?>
                            </p>
                        </div>
                        <table id="ai-table">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">SL.NO.</th>
                                    <th style="width: 130px;">ITEM NAME</th>
                                    <th style="width: 60px;">QTY</th>
                                    <th style="width: 30px;">x</th>
                                    <th style="width: 60px;">KG/QTY</th>
                                    <th style="width: 100px;">REMARKS</th>
                                    <th style="width: 40px;">TICK</th>
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
                                            $checked=[];
                                            $itemName = $action->db->sql("SELECT item_name, print_name FROM aimo_item i WHERE id = {$d['item_id']}");
                                            $checked= $action->db->sql("SELECT `id`,`status` FROM `aimo_tick_order` WHERE `order_id`='{$order_item[0]['id']}' AND `item_id`='{$d['item_id']}'");
                                            

                                            
                                            ?>
                                            <tr>
                                                <td><?= $sr++; ?></td>
                                                <td><?= $itemName[0]['item_name']; ?>(<?= $itemName[0]['item_name']; ?>)</td>
                                                <td><?= $d['item_qty']; ?></td>
                                                <td>x</td>
                                                <td><?= $d['item_kg']; ?></td>
                                                <td><?= base64_decode($d['remark']); ?></td>
                                                <td>
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input checklist mx-0" style="float: none;" type="checkbox"
                                                            <?= (@$checked[0]['status']== 1)? 'checked': '' ?> id="flexCheckChecked<?= $i ?>" data-itemid="<?=  $d['item_id'] ?>" data-orderid="<?= $order_item[0]['id'] ?>" data-checkid="<?= (@$checked[0]['id'])?:'na' ?>" >
                                                        <label class="form-check-label" for="flexCheckChecked<?= $i ?>">

                                                        </label>
                                                    </div>
                                                   
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                            </tbody>
                        </table>
                        <div class="row">
                          <div class="col-md-5">
                          <p class="total">Total No. Of Bags: <strong><?= @$order_item[0]['no_of_bags']; ?></strong></p>
                        <p class="total">Total No. Of Coupon: <strong><?= @$order_item[0]['no_of_coupon']; ?></strong>
                        </p>
                        <p class="total">Total Kgs: <strong><?= @$order_item[0]['t_weight']; ?></strong></p>
                        <p class="total"> Transport/Lorry No: <strong><?= @$order_item[0]['vehicle_no']; ?></strong></p>
                          </div>
                          <div class="col-md-6 ms-auto">
                            <p class="note">Note:-<p><?= @$order_item[0]['note']; ?></p></p>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
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
                margin: [0.4, 0.6, 0.4, 0],  // Increase margins to avoid content getting cut
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
         document.getElementById('print').addEventListener('click', function(){
            window.print();
         });

         document.getElementById('back').addEventListener('click', function(){
            window.history.back();
         });
</script>
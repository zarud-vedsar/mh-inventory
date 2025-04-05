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
                    <h4 class="fw-bold">Production Plan</h4>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                                <form method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Dispatched Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-groupicon calender-input">
                                                <input type="date" name="dispatched_date" required class="form-control"
                                                    value="<?= @$_GET['dispatched_date']; ?>">
                                            </div>
                                        </div>
                                        <div class=" col-md-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="warehouseid">Warehouse</label>
                                                <select class="select2" name="warehouseid" id="warehouseid">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $warehouse = $action->get_admin_function->fetchWarehouse(null, 1, 0);
                                                    if ($warehouse) {
                                                        foreach ($warehouse as $w) { ?>
                                                            <option value="<?= @$w['id']; ?>"
                                                                <?= $action->db->validateGetData('warehouseid') && $action->db->validateGetData('warehouseid') == $w['id'] ? 'selected' : ''; ?>>
                                                                <?= @$w['wtitle']; ?>
                                                            </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary mt-4">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <div class="search-set">
                                    <div class="search-input">
                                        <span class="btn-searchset"><i
                                                class="ti ti-search fs-14 feather-search"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable2">
                                <thead class="thead-light">
                                    <tr>

                                        <th>#<img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon">
                                        </th>
                                        <th> Item <img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon">
                                        </th>
                                        
                                        <th> Quantity<img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon"></th>
                                        <th> KG/QTY<img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon"></th>
                                        <th> Total Kgs<img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($action->db->validateGetData('dispatched_date')) {
                                        $dispatched_date = $action->db->validateGetData('dispatched_date');
                                        
                                        $ordersql="SELECT item FROM aimo_order WHERE dispatched_date = '{$dispatched_date}' AND deleteStatus = 0";
                                        
                                        $warehouseid = $action->db->validateGetData('warehouseid')?: '';

                                        if(!empty($warehouseid)){
                                            $ordersql.= " AND JSON_UNQUOTE(JSON_EXTRACT(item, '$.warehouseid')) = '{$warehouseid}'";
                                        }

                                        

                                        $order = $action->db->sql($ordersql);

                                        $items = [];
                                        $totalbags = $grandtotal= 0;

                                        if ($order) {
                                            foreach ($order as $item) {
                                                // Decode JSON correctly
                                                $decoded = json_decode($item['item'], true);

                                                if ($decoded) {
                                                    foreach ($decoded as $d) {
                                                        $item_id = $d['item_id'];
                                                        $item_qty = $d['item_qty'];

                                                        $kg_qty= $d['item_kg'];

                                                        if (isset($items[$item_id])) {
                                                            $items[$item_id] += $item_qty; // Fix: Correct summing
                                                        } else {
                                                            $items[$item_id] = $item_qty; // Fix: Correct initialization
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if (isset($items) && $items) {
                                        $sr = 1;
                                        foreach ($items as $t => $v) {
                                            $itemName = $action->db->sql("SELECT item_name FROM aimo_item WHERE id = {$t}");
                                    ?>
                                            <tr>
                                                <td><?= $sr++; ?></td>
                                                <td><?= @$itemName[0]['item_name']; ?></td>
                                                <!-- <td><?= $action->db->indiandate(@$dispatched_date); ?></td> -->
                                                <td><?= @$v;  ?><?php $totalbags += @$v ?></td>
                                                <td> <?= $kg_qty ?></td>
                                                <td> <?= $kg_qty * $v; ?> <?php $grandtotal+=($kg_qty * $v);  ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-end">Total No of Bags:</th>
                                        <th><?= $totalbags; ?></th>
                                        <th class="text-end">Grand Total:</th>
                                        <th><?=  $grandtotal ?></th>
                                    </tr>
                                </tfoot>
                            </table>
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


<!-- DataTables Buttons JS -->
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<!-- Print Button JS -->
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<!-- JSZip (Required for export functionality like Excel, CSV, etc.) -->
<script type="text/javascript" charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function() {
    if ($('.datatable2').length > 0) {
        $('.datatable2').DataTable({
            "bFilter": true,          // Enables the search filter
            "sDom": 'Bfrtip',         // Defines the position of the buttons and table controls
            "ordering": true,         // Enables sorting
            "language": {
                search: ' ',
                sLengthMenu: '_MENU_',
                searchPlaceholder: "Search",
                sLengthMenu: 'Row Per Page _MENU_ Entries',
                info: "_START_ - _END_ of _TOTAL_ items",
                paginate: {
                    next: ' <i class="fa fa-angle-right"></i>',
                    previous: '<i class="fa fa-angle-left"></i>'
                },
            },
            "initComplete": function(settings, json) {
                $('.dataTables_filter').appendTo('#tableSearch');   // Appends search input to custom div
                $('.dataTables_filter').appendTo('.search-input'); // Appends search input to another custom div
            },
            "buttons": [
                'print'  // Adds print button
            ]
        });
    }
});

</script>
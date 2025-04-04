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
                    <h4 class="fw-bold">Analyse Item Quantity</h4>
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
                            <table class="table datatable">
                                <thead class="thead-light">
                                    <tr>

                                        <th>#<img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon">
                                        </th>
                                        <th> Item <img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon">
                                        </th>
                                        <th> Dispatched Date<img src="./assets/img/svg_icons/right-left-arrow.svg"
                                                alt="" class="am-sort-icon"></th>
                                        <th> Quantity<img src="./assets/img/svg_icons/right-left-arrow.svg" alt=""
                                                class="am-sort-icon"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($action->db->validateGetData('dispatched_date')) {
                                        $dispatched_date = $action->db->validateGetData('dispatched_date');
                                        $order = $action->db->sql("SELECT item FROM aimo_order WHERE dispatched_date = '{$dispatched_date}' AND deleteStatus = 0");

                                        $items = [];

                                        if ($order) {
                                            foreach ($order as $item) {
                                                // Decode JSON correctly
                                                $decoded = json_decode($item['item'], true);

                                                if ($decoded) {
                                                    foreach ($decoded as $d) {
                                                        $item_id = $d['item_id'];
                                                        $item_qty = $d['item_qty'];

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
                                                <td><?= $action->db->indiandate(@$dispatched_date); ?></td>
                                                <td><?= @$v; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                    ?>
                                </tbody>
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
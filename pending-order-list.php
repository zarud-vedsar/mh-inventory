<?php
require_once('./common/head.php');
require_once('./common/header.php');
require_once('./common/sidebar.php');
$recycle = $action->db->validateGetData('recycle') ?: null;
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
						<?php if ($recycle) { ?>
							<a href="./pending-order-list.php" class="btn btn-secondary">
								<i data-feather="eye-off"></i>
								Hide Recycle Bin
							</a>
						<?php } else { ?>
							<a href="./pending-order-list.php?recycle=true" class="btn btn-danger">
								<i data-feather="trash-2"></i>
								Show Recycle Bin
							</a>
						<?php } ?>
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
                                <th> Order Date<img src="./assets/img/svg_icons/right-left-arrow.svg" alt="" class="am-sort-icon"></th>
                                <th> Party<img src="./assets/img/svg_icons/right-left-arrow.svg" alt="" class="am-sort-icon"></th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php 
                            $sql="SELECT aimo_order.*,aimo_party.party_name,aimo_party.party_phone FROM aimo_order JOIN aimo_party ON aimo_party.id=aimo_order.pending_party WHERE 1";
                            $deleteStatus = $recycle ? 1 : 0;
                            $sql .= " AND aimo_order.deleteStatus = {$deleteStatus}";
                            $orderlisting = $action->db->sql($sql);
                            
                            if($orderlisting){

                                $sr = 1;
                                foreach($orderlisting as $od){ 
                          ?>
                            <tr>
                               <td><?= $sr++; ?></td> 
                               <td class="text-gray-9"><?= $action->db->indiandate($od['order_date']); ?></td>
                               <td class="text-gray-9"><?= $od['party_name'];?></td>
                               <td class="action-table-data d-flex align-items-center">
											
											<div class="edit-delete-action">
												<?php if (!$recycle) { ?>
													<a href="./product-add.php?id=<?= $od['id']; ?>"
														class="p-2 border-0 bg-transparent">
														<i data-feather="edit" class="feather-edit text-warning"></i>
													</a>
												<?php }
												if ($deleteStatus == 1) { ?>
													<button type="button" class="p-2 border-0 bg-transparent recover-item-order"
														data-delid="<?= @$od['id']; ?>">
														<i data-feather="refresh-ccw" class="feather-refresh-ccw text-success"></i>
													</button>
												<?php } else { ?>
													<button type="button" class="p-2 border-0 bg-transparent delete-item-order"
														data-delid="<?= @$od['id']; ?>">
														<i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
													</button>
												<?php } ?>
											</div>
										</td>
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
        <!-- /product list -->
    </div>

</div>



<?php
require_once('./common/footer.php');
?>
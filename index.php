<?php require_once('./common/head.php');
require_once('./common/header.php');
require_once('./common/sidebar.php'); 

function deletefiveYearOld($table){
	global $action;
	$action->db->sql("DELETE FROM $table 
						WHERE `deletedAt` IS NOT NULL 
						AND `deletedAt` < DATE_SUB(NOW(), INTERVAL 5 YEAR);");
}

// delete 5 year older files 

deletefiveYearOld("aimo_item");
deletefiveYearOld("aimo_order");
deletefiveYearOld("aimo_party");
deletefiveYearOld("aimo_warehouse");
?>
<div class="page-wrapper">
	<div class="content">
       <div class="container">
		<div class="row">
		<div class="col-xl-3 col-sm-6 col-12 d-flex">
					<a href="./warehouse.php" class="w-100">
						<div class="card revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h4 class="mb-1">
											<?php 
											 $twerehouse = $action->db->sql("SELECT COUNT(id) AS 'total' FROM aimo_warehouse WHERE deleteStatus = 0");
											  echo @$twerehouse[0]['total'] ?: 0;
											?>
										</h4>
										<p>Warehouse</p>
									</div>
									<span class="revenue-icon bg-cyan-transparent text-cyan">
										<i class="fa-solid fas fa-warehouse fs-16"></i>
									</span>
                              	</div>
							</div>
						</div>
					  </a>
					</div>
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<a href="./party-list.php" class="w-100">
						<div class="card revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h4 class="mb-1">
											<?php 
											 $titem = $action->db->sql("SELECT COUNT(id) AS'total' FROM aimo_item WHERE deleteStatus = 0");
											  echo @$titem[0]['total'] ?: 0;
											?>
										</h4>
										<p>Item</p>
       									</div>
									<span class="revenue-icon bg-orange-transparent text-orange">
									    <i class="fa-solid fas fa-box fs-16"></i>
									</span>
                              	</div>
							</div>
						</div>
                       </a>
					</div>

					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<a href="./product-list.php" class="w-100">
						<div class="card revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h4 class="mb-1">
											<?php 
											 $tparty = $action->db->sql("SELECT COUNT(id) AS 'total' FROM aimo_party WHERE deleteStatus = 0");
											  echo @$tparty[0]['total'] ?: 0;
											?>
										</h4>
										<p>Party</p>
                                     </div>
									 <span class="revenue-icon bg-teal-transparent text-teal">
									   <i class="fas fa-users fs-16"></i>
									</span>
                              	</div>
							</div>
						</div>
                		</a>
					</div>

					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<a href="./pending-order-list.php" class="w-100">
						<div class="card revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h4 class="mb-1">
											<?php 
											 $tpendingOrder = $action->db->sql("SELECT COUNT(id) AS 'total' FROM aimo_order WHERE deleteStatus = 0");
											  echo @$tpendingOrder[0]['total'] ?: 0;
											?>
										</h4>
										<p>Pending Order</p>
                                     </div>
									<span class="revenue-icon bg-indigo-transparent text-indigo">
										<i class="fas fa-hourglass-half fs-16"></i>
									</span>
                              	</div>
							</div>
						</div>
                		</a>
					</div>
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<a href="./pending-order-list.php" class="w-100">
						<div class="card revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<h4 class="mb-1">
											<?php 
											 $tdispatchedOrder = $action->db->sql("SELECT COUNT(id) AS 'total' FROM aimo_order WHERE status = 1 AND deleteStatus = 0");
											  echo @$tdispatchedOrder[0]['total'] ?: 0;
											?>
										</h4>
										<p>Dispatched Order</p>
                                     </div>
									<span class="revenue-icon bg-teal-transparent text-teal">
										<i class="fas fa-truck fs-16"></i>
									</span>
                              	</div>
							</div>
						</div>
                		</a>
					</div>

					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<a href="./pending-order-list.php" class="w-100">
						<div class="card revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between"> 
									<div>
										<h4 class="mb-1">
											<?php 
											 $dispatchedOrder = $action->db->sql("SELECT COUNT(id) AS 'total' FROM aimo_order WHERE status= '0'");
											  echo @$dispatchedOrder[0]['total'] ?: 0;
											?>
										</h4>
										<p>To Be Dispatched</p>
                                     </div>
									<span class="revenue-icon bg-warning-transparent text-warning">
										<i class="fas fa-box-open fs-16"></i>
									</span>
                              	</div>
							</div>
						</div>
                		</a>
					</div>
         </div>
        </div>
	</div>
	<div class="copyright-footer d-flex align-items-center justify-content-between border-top bg-white gap-3 flex-wrap">
		<p class="fs-13 text-gray-9 mb-0"><span id="year"></span> &copy; All Right Reserved</p>
		<p>Designed & Developed By <a href="https://vedsar.com/" class="link-primary">Vedsar India Pvt Ltd</a></p>
	</div> 
</div>
</div>

<?php
require_once('./common/footer.php');
?> 
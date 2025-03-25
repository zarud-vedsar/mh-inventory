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
								<h4 class="fw-bold">Product List</h4>
								<h6>Manage your products</h6>
							</div>
						</div>
						<ul class="table-top-head">
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
							</li>
						</ul>
						<div class="page-btn">
							<a href="./product-add.php" class="btn btn-primary"><i class="ti ti-circle-plus me-1"></i>Add Product</a>
						</div>	
						<div class="page-btn import">
							<a href="#" class="btn btn-secondary color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
								data-feather="download" class="me-1"></i>Import Product</a>
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
								<div class="dropdown me-2">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
										Category
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Computers</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Electronics</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Shoe</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Electronics</a>
										</li>
									</ul>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
										Brand
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Lenovo</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Beats</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Nike</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Apple</a>
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
											<th class="no-sort">
												<label class="checkboxs">
													<input type="checkbox" id="select-all">
													<span class="checkmarks"></span>
												</label>
											</th>
											<th>Sr. No. </th>
											<th>Product Name</th>
											<th>Product Print</th>
											<th>Kgs/Qty</th>
											<th>Alternate Qty</th>
											<th>Coupon Point</th>
											<th>Warehouse</th>
											<th>Created By</th>
											<th class="no-sort"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT001 </td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/stock-img-01.png" alt="product">
													</a>
													<a href="javascript:void(0);">Lenovo IdeaPad 3 </a>
												</div>												
											</td>							
											<td>Computers</td>
											<td>Lenovo</td>
											<td>$600</td>
											<td>Pc</td>
											<td>100</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-30.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">James Kirwin</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon  p-2" href="./product-detail-view-page.php">
														<i data-feather="eye" class="feather-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html" >
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT002</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/stock-img-06.png" alt="product">
													</a>
													<a href="javascript:void(0);">Beats Pro</a>
												</div>												
											</td>
											<td>Electronics</td>
											<td>Beats</td>
											<td>$160</td>
											<td>Pc</td>
											<td>140</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-13.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Francis Chang</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT003</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/stock-img-02.png" alt="product">
													</a>
													<a href="javascript:void(0);">Nike Jordan</a>
												</div>												
											</td>											
											<td>Shoe</td>
											<td>Nike</td>
											<td>$110</td>
											<td>Pc</td>
											<td>300</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-11.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Antonio Engle</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT004</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/stock-img-03.png" alt="product">
													</a>
													<a href="javascript:void(0);">Apple Series 5 Watch</a>
												</div>												
											</td>											
											<td>Electronics</td>
											<td>Apple</td>
											<td>$120</td>
											<td>Pc</td>
											<td>450</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-32.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Leo Kelly</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT005</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/stock-img-04.png" alt="product">
													</a>
													<a href="javascript:void(0);">Amazon Echo Dot</a>
												</div>												
											</td>											
											<td>Electronics</td>
											<td>Amazon</td>
											<td>$80</td>
											<td>Pc</td>
											<td>320</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-02.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Annette Walker</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT006</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/stock-img-05.png" alt="product">
													</a>
													<a href="javascript:void(0);">Sanford Chair Sofa</a>
												</div>												
											</td>											
											<td>Furnitures</td>
											<td>Modern Wave</td>
											<td>$320</td>
											<td>Pc</td>
											<td>650</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-05.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">John Weaver</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT007</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/expire-product-01.png" alt="product">
													</a>
													<a href="javascript:void(0);">Red Premium Satchel</a>
												</div>												
											</td>											
											<td>Bags</td>
											<td>Dior</td>
											<td>$60</td>
											<td>Pc</td>
											<td>700</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-08.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Gary Hennessy</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>	
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT008</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/expire-product-02.png" alt="product">
													</a>
													<a href="javascript:void(0);">Iphone 14 Pro</a>
												</div>												
											</td>											
											<td>Phone</td>
											<td>Apple</td>
											<td>$540</td>
											<td>Pc</td>
											<td>630</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-04.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Eleanor Panek</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>	
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT009</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/expire-product-03.png" alt="product">
													</a>
													<a href="javascript:void(0);">Gaming Chair</a>
												</div>												
											</td>											
											<td>Furniture</td>
											<td>Arlime</td>
											<td>$200</td>
											<td>Pc</td>
											<td>410</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-09.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">William Levy</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>	
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT010</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/expire-product-04.png" alt="product">
													</a>
													<a href="javascript:void(0);">Borealis Backpack</a>
												</div>												
											</td>											
											<td>Bags</td>
											<td>The North Face</td>
											<td>$45</td>
											<td>Pc</td>
											<td>550</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm me-2">
														<img src="assets/img/users/user-10.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Charlotte Klotz</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>	
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>PT010</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="assets/img/products/expire-product-04.png" alt="product">
													</a>
													<a href="javascript:void(0);">Borealis Backpack</a>
												</div>												
											</td>											
											<td>Bags</td>
											<td>The North Face</td>
											<td>$45</td>
											<td>Pc</td>
											<td>550</td>
											<td>
												<div class="userimgname">
													<span class="avatar avatar-sm">
													<a href="javascript:void(0);">
														<img src="assets/img/users/user-10.jpg" alt="product">
													</a>
												</span>
														<a href="javascript:void(0);">Charlotte Klotz</a>
												</div>
											</td>
											<td class="action-table-data">
												<div class="edit-delete-action">
													<a class="me-2 edit-icon p-2" href="product-details.html">
														<i data-feather="eye" class="action-eye"></i>
													</a>
													<a class="me-2 p-2" href="edit-product.html">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" href="javascript:void(0);">
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
				<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
                    <p class="mb-0 text-gray-9">2014 - 2025 &copy; DreamsPOS. All Right Reserved</p>
                    <p>Designed &amp; Developed by <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
                </div>
			</div>

<?php
require_once('./common/footer.php');
?>
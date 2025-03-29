<?php
class get_admin_function extends Database
{
  public function noData($col)
  {
    $html = '
      <tr class="mx-auto">
        <td colspan="' . $col . '">
          <div class="row">
            <div class="col-md-12 text-center mx-auto">
              <div class="card bg-transparent">
                <div class="card-body">
                  <img src="./assets/nodb.png" style="border-radius: 10px;" class="img-fluid" alt="">
                  <div class="card-text mt-3 text-danger">There is no data to show you at the moment.</div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      ';
    return $html;
  }
  public function get_ellipsis(
    $str,
    $offset = 0,
    $limit = 30,
    $con = true
  ) {
    if (strlen($str) > $limit) {
      $str = substr($str, $offset, $limit);
      if ($con) {
        $str .= "...";
      }
    }
    return $str;
  }
  public function fetchUsers($id = null, $email = null)
  {
    $q = "SELECT * FROM aimo_users WHERE 1";
    if ($id)
      $q .= " AND id = {$id}";
    if ($email)
      $q .= " AND user_email = '{$email}'";
    return $this->sql($q) ?: [];
  }
  public function fetchWarehouse($id = null, $status = null, $deleteStatus = null)
  {
    $q = "SELECT * FROM aimo_warehouse WHERE 1";
    if ($id)
      $q .= " AND id = {$id}";
    if ($status === 0 || $status === 1)
      $q .= " AND status = {$status}";
    if ($deleteStatus === 0 || $deleteStatus === 1)
      $q .= " AND deleteStatus = {$deleteStatus}";
    return $this->sql($q) ?: [];
  }
  public function fetchItem($id = null, $status = null, $deleteStatus = null)
  {
    $q = "SELECT * FROM aimo_item WHERE 1";
    if ($id)
      $q .= " AND id = {$id}";
    if ($status === 0 || $status === 1)
      $q .= " AND status = {$status}";
    if ($deleteStatus === 0 || $deleteStatus === 1)
      $q .= " AND deleteStatus = {$deleteStatus}";
    return $this->sql($q) ?: [];
  }
  public function fetchParty($id = null, $status = null, $deleteStatus = null)
  {
    $q = "SELECT * FROM aimo_party WHERE 1";
    if ($id)
      $q .= " AND id = {$id}";
    if ($status === 0 || $status === 1)
      $q .= " AND status = {$status}";
    if ($deleteStatus === 0 || $deleteStatus === 1)
      $q .= " AND deleteStatus = {$deleteStatus}";
    return $this->sql($q) ?: [];
  }
  public function jsonData($tableCode, $id)
  {
    $q = "SELECT * FROM {$this->getTable($tableCode)} WHERE id = {$id}";
    $res = $this->sql($q);
    if ($res) {
      foreach ($res as $d) {
        echo json_encode($d);
      }
    }
  }
  // END OF CLASS
}
?>
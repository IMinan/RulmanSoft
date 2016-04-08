<?php include '_inc/header.php'; // GET header  ?>
<div class="row">
  <div class="col-md-3">
    <?php include '_inc/sidebar.php'; ?>
  </div><!--/ .col-md-3 /-->

  <div class="col-md-9">
    <div class="h20"></div>
    <?php
      if(isset($_GET['status'], $_GET['id']))
      {
        $status = $_GET['status'];
        $id = $_GET['id'];
        if(status_user($id, $status))
        {
          if($status == 1)
          {
            get_alert('', 'Kullanıcı Onaylandı !', 'success text-center');
          }else
          {
           get_alert('', 'Kullanıcı Engllendi !', 'danger text-center');
          }
        }
      }
    ?>
    <div class="h30"></div>
    <table class="table table-bordered table-hover table-condensed">
      <thead>
        <th></th>
        <th>Firma Adı</th>
        <th>Adı - Soyadı</th>
        <th>E-Potası</th>
        <th>Telefon</th>
        <th>İl - İlçe</th>
      </thead>

      <tbody>
        <?php $user = get_list_user(); while($list = $user->fetch_object()): if($list->user_type == 'user'): ?>
        <tr style="<?php if($list->status == 0): echo 'background-color: #efefef;'; else: echo 'background-color: #fff;'; endif; ?>">
          <td>
            <?php if($list->status == 0): ?>
            <a href="<?php echo site_url('users.php?status=1&id=').$list->id; ?>" data-toggle="tooltip" data-placement="top" title="Onayla" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
            <?php elseif($list->status == 1): ?>
            <a href="<?php echo site_url('users.php?status=0&id=').$list->id; ?>" data-toggle="tooltip" data-placement="top" title="Engelle" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
            <?php endif; ?>
          </td>
          <td><?php echo $list->company_name; ?></td>
          <td><?php echo $list->name; ?> <?php echo $list->surname; ?></td>
          <td><?php echo $list->email; ?></td>
          <td><?php echo $list->gsm; ?></td>
          <td><?php echo $list->city; ?> <?php echo $list->district; ?></td>
        </tr>
        <?php  endif; ?>
        <?php endwhile; ?>
      </tbody>
    </table>

  </div><!--/ .col-md-7 /-->
</div><!--/ .row /-->
<?php include '_inc/footer.php'; // GET footer ?>

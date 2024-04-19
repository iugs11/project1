<?php
include './inc/db.php';
include './inc/form.php';

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>المشاركين</title>
    <meta charset="UTF-8">
</head>
<body>

    <!--- بداية الكونتينر -->
    <center>
    <div class="bg">
    <div class="col-md-6 px-0">
      <p class="display-4 fst-italic">تبقى على نهاية المسابقة</p>
      <h3 class="button-64" id="countdown"></h3>
    <div class="container">
    <ul class="list-group list-group-flush"><br>
    <a class="button-64" href="https://abdulaziz-ahmed-alfantoukh.oxygenn.fun/" target="_blank"><span class="text">صفحة المشاركة</span></button></a>
  <p></p>

    </div>
    </div>
  </div>
    </div>
  </div>


  <!--- اسماء المشاركين --> 
  <br>
  <?php
  $sql = 'SELECT * FROM users';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
  <div class="listt">
<table class="table table-dark table-hover table-bordered" style="width:80%">
    <thead>
      <tr align="center">
      <th> # </th>
  <th> الإسم الأول </th>
  <th> الإسم الأخير </th>
  <th> الإيميل </th>
</tr>
</thead>
<?php foreach($users as $user): ?>
<tr align="center">
  <td> <?php echo htmlspecialchars($user['id']) ?> </td>
  <td> <?php echo htmlspecialchars($user['firstname']) ?> </td>
  <td> <?php echo htmlspecialchars($user['lastname']) ?> </td>
  <td> <?php echo htmlspecialchars($user['email']) ?> </td>
</tr>
<?php endforeach; ?>
</table>
</div>
</center>
       <!--- العداد وقت السحب --> 
       <div class="loader-con">
    <div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
<div class="button-wrapper">
</div>
</div>
<?php
  $sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!--- زر اختيار الرابح -->
<div class="d-grid gap-2 col-6 mx-auto my-4">
<button class="button-64" id="winner" role="button">
  <span class="text">إختيار الرابح</span></button>

</div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user): ?>
        <h1 class="display-3 text-center modal-title" id="modalLabel"><?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']);?></h1>
      <?php endforeach; ?>
      </div>
    </div>
  </div>

<?php include './inc/db_close.php';

include_once './parts/footer.php'; ?>
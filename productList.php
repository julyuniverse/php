<?php
  //데이터베이스 연결
  $conn = mysqli_connect("localhost", "root", "1234", "mysqldb");

  $sql = "select * from product_type";

  $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>productList</title>
  </head>
  <script src="./js/jquery-3.5.1.js"></script>
  <script>
    $(function(){
      $("select[name='product_type']").change(function() {
        console.log($('select[name=product_type] > option:selected').val());
		$.ajax({
			url:"process_getproducts.php",
			type:"post",
			data:{"pt_code":$('select[name=product_type] > option:selected').val()},

			success: function(data) {
				$("select[name=products]").html(data);
			}
		});
	});
});
  </script>
  <body>
    <select name="product_type">
      <option value="">--선택--</option>
      <?php
        while($row = mysqli_fetch_array($result)){
      ?>
        <option value="<?=$row['pt_code']?>"><?=$row['pt_name']?></option>
      <?php
        }
      ?>
    </select>

    <select name="products">
    </select>

  </body>
</html>

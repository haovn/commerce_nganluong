<?php
   //Giả lập database
   include("database.php");
  // Thêm class nganluong
  include("nganluong.php");
   
   if (!isset($_COOKIE['cart']) && $_COOKIE['cart'] == '') { 
		die('Không có sản phẩm để thanh toán . ');
	};
?>
	<div align="center" style="height: 40px; line-height:40px; font-size:14px; font-weight:bold; color: red">
		DEMO LẬP TRÌNH TÍCH HỢP NÚT "THANH TOÁN ĐƠN HÀNG"  VÀO WEBSITE BÁN HÀNG
	</div>
	<div align="center" style="height: 40px; line-height:40px; font-size:16px;">Trang hoá đơn bán hàng</div>
    <table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse;" width="600px" align="center">
    <tr bgcolor="#CCCCCC">
		<td align="center" width="30">STT</td>
		<td align="center">Tên</td>			
		<td align="center">Giá</td>
		<td align="center">SL</td>
		<td align="center">Thành tiền</td>
	</tr>
	
<?php
	unset($_COOKIE['cart'][0]);
     $i=1;
	 // Hiển thị sản phẩm  mua hàng lên đơn hàng	 
	foreach($_COOKIE['cart'] as $key=>$value):
?>	
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td><a href="detail.php?id=<?php echo $key; ?>"><?php echo $data[$key]['name']; ?></a></td>	
		<td align="right"><?php echo (float)$data[$key]['price']; ?></td>
		<td align="center"><?php echo $value; ?></td>
		<td align="right"><?php echo number_format($value * $data[$key]['price'], 0, '.', ','); ?></td>
	</tr>
		
<?php
	$i++;
	$total += $value * $data[$key]['price'];
    endforeach;
	//Tính tổng giá tiền trong hoá đơn
				
?>

<tr>
	<td colspan="2">
	<?php 
	//Tài khoản nhận tiền
	$receiver="duyhung862000@yahoo.com";
	//Khai báo url trả về 
	$return_url="http://localhost/tich-hop-nang-cao/complete.php";
	//Giá của cả giỏ hàng 
	$price=$total;
	//Mã giỏ hàng 
	$order_code="Hãy lập trình mã giỏ hàng của bạn vào đây";
	//Thông tin giao dịch
	$transaction_info="Hãy lập trình thông tin giao dịch của bạn vào đây";
    //Khai báo đối tượng của lớp NL_Checkout
	$nl= new NL_Checkout();
	//Tạo link thanh toán đến nganluong.vn
	$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info,  $order_code, $price);
	

	
	?>
	
	<a href="<?php echo $url; ?>"> 
	<img border="0" src="https://www.nganluong.vn/data/images/buttons/11.gif" /> 
	</a>
	</td>
    <td colspan="3" align="right"><b>Tổng tiền:</b> <?php echo number_format($total, 0, '.', ',');?></td>
    </tr>
</table>

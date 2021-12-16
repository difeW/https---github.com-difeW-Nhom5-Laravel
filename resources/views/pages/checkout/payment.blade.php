@extends('layout')
@section('content')

<section id="cart_items">
		<?php	
				$content = Session::get("cart");
		?>
		<script>
			alert($content.val());
		</script>
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			
			<div class="review-payment">
				<p><b>Tên</b> {{$ship->shipping_name}}</p>
                <p><b>Địa chỉ:</b> {{$ship->shipping_address}}</p>
                <p><b>Số điện thoại</b> {{$ship->shipping_phone}}</p>
				<h2>Xem lại giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info">

<?php
	$total = 0;
?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sp</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<?php
								$total += $v_content['product_price']*$v_content['product_qty'];
							?>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content['product_image'])}}" width="90" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content['product_name']}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content['product_price']).' '.'vnđ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content['product_qty']}}"  >
									<input type="hidden" value="{{$v_content['session_id']}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									
									<?php
									$subtotal = $v_content['product_price'] * $v_content['product_qty'];
									echo number_format($subtotal).' '.'vnđ';
									?>

							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<form action="{{URL::to('/order-place')}}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name ="shipid" value ="{{$ship->shipping_id}}">

			<div>
				<h4 style="padding-left:10px ; font-size: 20px;">Thành tiền: </h4>
				<label style="padding-left:10px ; font-size: 20px;"><input name="thanhtien" value="{{$total}}" type="hidden"> {{number_format($total,0,',','.')}}đ</label>
			</div>
			<h4 style="margin:40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>
			<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
					</span>
					<button type="submit" class="btn btn-primary btn-sm">Đặt hàng</button>
			</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

@endsection
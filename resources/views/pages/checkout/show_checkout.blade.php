@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form method="POST" action ="{{URL::to('/save-checkout-customer')}}">
									@csrf
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người gửi">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ gửi hàng">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
									<div class="">
										 <div class="form-group">
		                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
		                                      <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
		                                            <option value="0">Qua chuyển khoản</option>
		                                            <option value="1">Tiền mặt</option>   
		                                    </select>
		                                </div>
									</div>
									<input type="submit" value="Xác nhận đơn hàng" class="btn btn-primary btn-sm send_order">
								</form>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

@endsection
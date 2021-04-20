@extends('frontend.master')
@section('title','Chi tiet san pham')
@section('main')
<link rel="stylesheet" href="css/details.css">	
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$item->pro_name}}</h3>
		<div class="row">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
				<img height="150px" src="{{asset('lib/storage/app/avatar/' . $item->pro_img)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
				<p>Giá: <span class="price">{{number_format($item->pro_price,0,',','.')}}</span></p>
				<p>Bảo hành :{{$item->pro_warranty}}</p> 
				<p>Phụ Kiện: {{$item->pro_accessories}}</p>
				<p>Tình trạng: {{$item->pro_condition}}</p>
				<p>Khuyến mãi: {{$item->pro_promotion}}</p>
				<p>Còn hàng: @if($item->pro_status == 1) Còn hàng @else Hết hàng @endif</p>
				<p class="add-cart text-center"><a href="{{asset('cart/add/' . $item->pro_id)}}">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{{$item->pro_descri}}</p>
	</div>
	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment">
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Comment</button>
				</div>
					{{csrf_field()}}
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach($comments as $comment)
		<ul>
			<li class="com-title">
				{{$comment->com_email}}
				<br>
				<span>{{date('d/m/Y H:i:s',strtoTime($comment->created_at))}}</span>	
			</li>
			<li class="com-details">
				{{$comment->com_content}}
			</li>
		</ul>
		@endforeach

		{{$comments->links()}}
	</div>
</div>					
<!-- end main -->
@stop
				
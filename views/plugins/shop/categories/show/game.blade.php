@push('styles')
<style>
#wrap {margin:-25px 0px 0px -5px; padding:26px 8px 14px 8px; width:800px; height:600px; background:url('/assets/main_bg.png') repeat-x left top; overflow:hidden; }

#header{position:relative;height:83px;}
#header h1{position:absolute; width:114px; height:61px; margin:14px 20px 0 24px; padding:0;background:url('/assets/logo.png') no-repeat;}
a {color:#c1bd8e;text-decoration:none;}
/*****************************************
**		 	Flyff Earthquake v4.0		**
**			  	 style.css				**
**		   Created by Treachery.		**
**		   Ripped from gPotato.			**
*****************************************/
.shopMenu{float:left;}
.shopMenu .innerBox{padding-bottom:5px; background:url(/assets/bg_LB.png) no-repeat left bottom;}
.shopMenu ul{width:144px; margin:0; padding:0;}
.shopMenu li{height:42px; margin:0; padding:0; border-left:1px solid #807559; border-right:1px solid #807559; list-style:none;}
.shopMenu li a{display:block; height:41px; border-bottom:1px solid #2e3211; background:url(/assets/bg_1px_L.png);}
.shopMenu li a span{display:block; height:40px; padding-left:14px; border-bottom:1px solid #0c0c0c; font-size:13px; line-height:38px;}
.shopMenu li a:hover{background:url(/assets/bg_menu_over.gif) repeat-x; color:#ecd11e;}
.shopMenu li.first{height:44px; border:0;}
.shopMenu li.first a{height:44px; border:0; background:url(/assets/bg_LT.png) no-repeat;}
.shopMenu li.first a span{height:44px; border:0;}
.shopMenu li.first a:hover{background:url(/assets/bg_LT_over.png) no-repeat;}
.shopMenu li.last{background:url(/assets/bg_1px_L.png);}
.shopMenu li.last a {border-bottom: 0;}

/* item index */
.listBox{display:inline-block; width:470px; padding-top:7px;  background:url(/assets/bg_CT.png) no-repeat left top; letter-spacing:normal; word-spacing:normal;}
.listBox_btm{padding-bottom:7px; background:url(/assets/bg_CB.png) no-repeat left bottom;}
.listBox_btm .innerBox{border-left:1px solid #807559; background:url(/assets/bg_1px_C.png); height:425px;}
.listBox_btm .innerBox h2{margin:0; padding:8px 0 12px 14px; border-bottom:1px solid #000; color:#ecd11e; font-size:16px; font-weight:normal; text-transform:uppercase;}
.listBox_btm .innerBox ul{zoom:1; margin:0; padding:0; border-top:1px solid #4c3b0f; border-bottom:1px solid #4c3b0f; background-color:#2a1a0a;}
.listBox_btm .innerBox ul:after{content:""; display:block; clear:both;}
#items_list li{float:left; width:225px; height:108px; margin:0; padding:0 9px 10px 9px; border-top:1px solid #180f06; border-right:1px solid #180f06; list-style:none;}
#items_list li.first{border-top:none;}
#items_list li.right{border-right:none;}
#items_list li dl,
#items_list li dd{margin:0; padding:0;}
#items_list li dl{zoom:1;}
#items_list li dl:after{content:""; display:block; clear:both;}
#items_list li dt{margin:0; padding:6px 0 6px 14px; background:url(/assets/bul_arrow.gif) no-repeat left 50%; color:#777d19; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;}
#items_list li dd{float:left;}
#items_list li dd.itemInfo{width:126px; min-height:36px; padding:7px; background:url(/assets/bg_item.png) no-repeat left top;}
#items_list li dd.itemInfo span{display:block; color:#9f5c04; font-size:11px; line-height:13px;}
.listBox_btm .innerBox .btnArea{margin:0; padding:3px 0 0 0;}
.listBox_btm .innerBox .btnArea a{display:inline-block; width:101px; height:18px; font-size:11px; text-align:center; line-height:18px;}
.listBox_btm .innerBox .btnArea .btn_gift{background-image:url(/assets/bg_verschenken.gif); color:#c8d9ca; display: inline-block; height:20px ;font-size: 12px; line-height: 0; width: 101px;}
.listBox_btm .innerBox .btnArea .btn_buy{margin-left:1px; background-image:url(/assets/bg_kaufen.gif); color:#dcd7a0; font-size: 12px; line-height: 0; height:20px ; width: 102px;}

.pagination {margin:0; padding-top:6px; border-top:1px solid #000; text-align:center;justify-content: center;}
.page-link, .pagination li{display:inline-block; _position:relative; padding:0; width:20px; height:19px; border:1px solid #472f09; background:#33210b; color:#a78e32; font-size:12px; line-height:17px; text-decoration:none; overflow:hidden; text-align:center;}
.pagination a.next{width:33px; padding:0 7px;}
.pagination a.next span{display:inline-block; padding-right:10px; background:url(/assets/next_arrow.gif) no-repeat right 50%;}
.pagination a.prev{width:33px; padding:0 7px;}
.pagination a.prev span{display:inline-block; padding-left:10px; background:url(/assets/prev_arrow.gif) no-repeat left 50%;}
.page-item .active .page-link{display:inline-block; _position:relative; padding:0; width:20px; height:19px; border:1px solid #ab610a; background:#813f02; color:#f5fe7f; font-size:12px; line-height:17px; text-decoration:none; overflow:hidden; text-align:center;}
#items_list {height: 365px;}

.infoBox{display:inline-block; width: 165px; padding-top:7px; border-left:1px solid #807559; background:url(/assets/bg_RT.png) no-repeat left top; letter-spacing:normal; word-spacing:normal; vertical-align:top;}
.infoBox_btm{padding-bottom:7px; background:url(/assets/bg_RB.png) no-repeat left bottom;}
.infoBox_btm .innerBox{border-right:1px solid #807559; background:url(/assets/bg_1px_R.png);}
.infoBox .innerBox h2{margin:0; padding:8px 0 12px 14px; border-bottom:1px solid #000; color:#b2ec1e; font-size:16px; font-weight:normal; text-transform:uppercase;}
.infoBox .innerBox .itemDetail{padding:0 9px; border-top:1px solid #2f2b18;}
.infoBox .innerBox .itemDetail ul{margin:0; padding:0;}
.infoBox .innerBox .itemDetail li{margin:0; padding:0; border-top:1px solid #242013; list-style:none;}
.infoBox .innerBox .itemDetail li.first{border-top:none;}
.infoBox .innerBox .itemDetail li dl,
.infoBox .innerBox .itemDetail li dd{margin:0; padding:0;}
.infoBox .innerBox .itemDetail li dl{zoom:1;}
.infoBox .innerBox .itemDetail li dl:after{content:""; display:block; clear:both;}
.infoBox .innerBox .itemDetail li dt{margin:0; padding:6px 0 6px 14px; background:url(/assets/bul_arrow.gif) no-repeat left 8px; color:#777d19;}
.infoBox .innerBox .itemDetail li dd{float:left; height:56px; vertical-align:top;}
.infoBox .innerBox .itemDetail li dd.itemInfo{width:84px; min-height:36px; padding:7px; background:url(/assets/bg_detailitem.png) no-repeat left top;}
.infoBox .innerBox .itemDetail li dd.itemInfo span{display:block; color:#9f5c04; font-size:11px; line-height:13px;}

.quantity {position: relative;display: inline-flex;}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}

input[type=number] {-moz-appearance: textfield;}

.quantity input {height: 20px;float: left;display: block;padding: 0;margin: 0;border: none;box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.08);font-size: 1rem;border-radius: 4px;}

.quantity input:focus {outline: 0;}

.quantity-nav {float: left;position: relative;height: 20px;}

.quantity-button {position: relative;cursor: pointer;border: none;border-left: 1px solid rgba(0, 0, 0, 0.08);width: 20px;text-align: center;color: #333;font-size: 10px;font-weight: bold;font-family: "FontAwesome" !important;padding: 0;background: #FAFAFA;-webkit-transform: translateX(-100%);transform: translateX(-100%);-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #000}

a:not([href]):not([tabindex]) { color: #000}

.quantity-button:active {background: #EAEAEA;}

.quantity-button.quantity-up {position: absolute;height: 50%;top: 0;border-bottom: 1px solid rgba(0, 0, 0, 0.08);cursor: url('/assets/flyff_link.cur'), pointer;border-radius: 0 4px 0 0;}

.quantity-button.quantity-down {position: absolute;bottom: 0;height: 50%;border-radius: 0 0 4px 0;cursor: url('/assets/flyff_link.cur'), pointer;}

.parent-quantity {height: 30px;}

input {cursor: url('/assets/flyff_text.cur'), default;}

</style>
@endpush
<div id="wrap">
    <div id="header">
        <h1></h1>
    </div>
    <div id="container">
        <div class="shopMenu text-decoration-none">
            <div class="innerBox">
                <ul id="categoryid" class="text-center">
                    @foreach($categories as $subCategory)
                        <li class="@if($loop->first) first @elseif($loop->last) last @else @endif">
                            <a href="{{ route('shop.categories.show', $subCategory) }}">{{ $subCategory->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="itemlist">
                <div class="listBox">
                    <div class="listBox_btm">
                        <div class="innerBox">
                            <h2>{{$category->name}} <div class="float-right">
                                @if(use_site_money())
                                    <span style="display: inline" class="text-center bg-warning text-dark">{{ format_money(auth()->user()->money) }}</span>
                                @endif
                                <a style="display: inline;" href="{{ route('shop.cart.index') }}" class="btn btn-primary btn-block mt-1">{{ trans('shop::messages.cart.title') }}</a></div></h2>
                                <ul id="items_list">
                                @php
                                    $packages = $category->packages()->paginate(6);
                                @endphp
                                @foreach ( $packages as $package)
                                    <li class="@if($loop->first) first @elseif($loop->even) right @else @endif">
                                        <dt>{{$package->name}}</dt>
                                        <form action="{{ route('shop.packages.buy', $package) }}" method="POST" class="form-inline">
                                            @csrf
                                            <dd>
                                                <div style="width: 58px; height: 48px; display:table-cell; vertical-align: middle; text-align: center;" id="imgiteminfo">
                                                    @if($package->image !== null)
                                                        <img style="width: 58px; height: 48px" onclick="showItem(this)" src="{{ $package->imageUrl() }}" alt="{{ $package->name }}" data-package-url="{{ route('shop.packages.show', $package) }}">
                                                    @endif
                                                </div>
                                                <dd class="itemInfo">
                                                    <span>
                                                        @if($package->isDiscounted())
                                                            <del class="small">{{ $package->getOriginalPrice() }}</del>
                                                        @endif
                                                        {{ shop_format_amount($package->getPrice()) }}<br>
                                                        Quantité : @if($package->has_quantity)
                                                        <div class="quantity input-group-sm">
                                                            <input type="number" style="width: 50px" min="1" max="{{ $package->getMaxQuantity() }}" name="quantity" step="1" value="1">
                                                        </div>
                                                        @else
                                                        1
                                                        @endif
                                                    </span>
                                                </dd>
                                                <dl></dl>
                                                <div class="btnArea">
                                                    <dd style="padding-left: 40px;"><button type="submit" class="btn_buy btn btn-block">Buy</button></dd>
                                                </div>
                                            </dd>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <div id="itemlistpasing" class="pasing">
                                {{$packages->links()}} 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="infoBox">
                    <div class="infoBox_btm">
                        <div class="innerBox" style="height: 440px">
                            <h2>Details</h2>
                            <div id="object-detail"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <button class="col">INFO</button>
                    <button class="col">ACHATS</button>
                    <button class="col">RECHARGER</button>
                </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
		jQuery('<div class="quantity-nav"><a class="quantity-button quantity-up">⇧</a><a class="quantity-button quantity-down">⇩</a></div>').insertAfter('.quantity input');
		jQuery('.quantity').each(function () {
			var spinner = jQuery(this),
				input = spinner.find('input[type="number"]'),
				btnUp = spinner.find('.quantity-up'),
				btnDown = spinner.find('.quantity-down'),
				min = input.attr('min'),
				max = input.attr('max');
			
			btnUp.click(function () {
				var oldValue = parseFloat(input.val());
				if (oldValue >= max) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue + 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
			});
			
			btnDown.click(function () {
				var oldValue = parseFloat(input.val());
				if (oldValue <= min) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue - 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
			});
		});
    });
function showItem(el){
    $.get(el.dataset['packageUrl'], {
                headers: {
                    'X-PJAX': 'true'
                }
        }, function(response){
            console.log(response)
            $('#object-detail').html(response);
        })
    }
</script>
@endpush

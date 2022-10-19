<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .content > * {
	 height: 40px;
}
 .coupon-wrapper {
	 height: auto;
	 background-color: #f7f7f7;
	 align-items: center;
	 display: flex;
	 border-radius: 30px;
	 font-size: 1.5em;
     margin-right: 20px;
}
 .coupon-input {
	 border: 0;
	 margin-right: -20px;
	 background-color: #f7f7f7;
	 border-radius: 25px;
	 max-width: 150px;
	 text-align: center;
	 font-weight: bold;
	 outline: none;
}
 .coupon-input::selection {
	 background: none;
}
 .coupon-input::-moz-selection {
	 background: none;
}
 .coupon-input::-webkit-selection {
	 background: none;
}
 .coupon-button {
	 border: 0;
	 color: #fff;
	 display: inline-block;
	 position: relative;
	 font-size: 0.9em;
	 -webkit-transition: all 300ms ease;
	 transition: all 300ms ease;
	 background-color: #741fa2;
	 border-radius: 25px;
	 padding: 15px 25px;
	 margin: 6px;
	 font-size: 0.6em;
	 outline: none;
}
 .coupon-button:hover {
	 background-color: #551777;
}
.content {
    display: flex;
    margin-top: 20px;
}


/* tooltop */
.tooltips {
  position: relative;
  display: inline;
}

.tooltips span {
  font:300 12px 'Open Sans', sans-serif;
  position: absolute;
  color: #FFFFFF;
  background: #000000;
  padding:5px 10px;
  width:140px;
  text-align: center;
  visibility: hidden;
  opacity: 0;
  filter: alpha(opacity=0);
  transition: transform .3s, opacity .6s, margin-left .2s, margin-top .2s;
}

.tooltips > span img{max-width:140px;}

.tooltips[tooltip-position="top"] span{
  margin-left:10px;
  -ms-transform: rotate(30deg);
  -webkit-transform: rotate(30deg);
  transform: rotate(30deg);
}

.tooltips[tooltip-position="bottom"] span{
  -ms-transform: rotate(-30deg);
  -webkit-transform: rotate(-30deg);
  transform: rotate(-30deg);
}

.tooltips[tooltip-position="left"] span{
  margin-top:30px;
  -ms-transform: rotate(-30deg);
  -webkit-transform: rotate(-30deg);
  transform: rotate(-30deg);
}

.tooltips[tooltip-position="right"] span{
  margin-top:30px;
  -ms-transform: rotate(30deg);
  -webkit-transform: rotate(30deg);
  transform: rotate(30deg);
}

.tooltips span:after {
  content: '';
  position: absolute;
  width: 0; height: 0;
}

.tooltips[tooltip-position="top"] span:after{
  top: 100%;
  left: 50%;
  margin-left: -8px;
  border-top: 8px solid black;
  border-right: 8px solid transparent;
  border-left: 8px solid transparent;
}

.tooltips[tooltip-position="bottom"] span:after{
  bottom: 100%;
  left: 50%;
  margin-left: -8px;
  border-bottom: 8px solid black;
  border-right: 8px solid transparent;
  border-left: 8px solid transparent;
}

.tooltips[tooltip-position="left"] span:after{
  top: 50%;
  left: 100%;
  margin-top: -8px;
  border-left: 8px solid black;
  border-top: 8px solid transparent;
  border-bottom: 8px solid transparent;
}

.tooltips[tooltip-position="right"] span:after{
  top: 50%;
  right: 100%;
  margin-top: -8px;
  border-right: 8px solid black;
  border-top: 8px solid transparent;
  border-bottom: 8px solid transparent;
}

.tooltips:hover span {
  visibility: visible;
  opacity: 1;
  z-index: 999;
  -ms-transform: rotate(0deg);
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
  filter: alpha(opacity=100);
}

.tooltips[tooltip-position="top"]:hover span{
    top: -50%;
  left: 50%;
  margin-left: -76px;
}

.tooltips[tooltip-position="bottom"]:hover span{
  top: 30px;
  left: 50%;
  margin-left: -76px;
}

.tooltips[tooltip-position="left"]:hover span{
  right: 100%;
  top: 50%;
  margin-top: -15px;
  margin-right: 15px;
}

.tooltips[tooltip-position="right"]:hover span{
  left: 100%;
  top: 50%;
  margin-top: -15px;
  margin-left: 15px;
}

.tooltips[tooltip-type="primary"] > span {
  background-color:#2980b9;
}

.tooltips[tooltip-type="primary"][tooltip-position="top"] > span:after{
  border-top: 8px solid #2980b9;
}

.tooltips[tooltip-type="primary"][tooltip-position="bottom"] > span:after{
  border-bottom: 8px solid #2980b9;
}

.tooltips[tooltip-type="primary"][tooltip-position="left"] > span:after{
  border-left: 8px solid #2980b9;
}

.tooltips[tooltip-type="primary"][tooltip-position="right"] > span:after{
  border-right: 8px solid #2980b9;
}

.tooltips[tooltip-type="success"] > span {
  background-color:#27ae60;
}

.tooltips[tooltip-type="success"][tooltip-position="top"] > span:after{
  border-top: 8px solid #27ae60;
}

.tooltips[tooltip-type="success"][tooltip-position="bottom"] > span:after{
  border-bottom: 8px solid #27ae60;
}

.tooltips[tooltip-type="success"][tooltip-position="left"] > span:after{
  border-left: 8px solid #27ae60;
}

.tooltips[tooltip-type="success"][tooltip-position="right"] > span:after{
  border-right: 8px solid #27ae60;
}

.tooltips[tooltip-type="warning"] > span {
  background-color:#f39c12;
}

.tooltips[tooltip-type="warning"][tooltip-position="top"] > span:after{
  border-top: 8px solid #f39c12;
}

.tooltips[tooltip-type="warning"][tooltip-position="bottom"] > span:after{
  border-bottom: 8px solid #f39c12;
}

.tooltips[tooltip-type="warning"][tooltip-position="left"] > span:after{
  border-left: 8px solid #f39c12;
}

.tooltips[tooltip-type="warning"][tooltip-position="right"] > span:after{
  border-right: 8px solid #f39c12;
}

.tooltips[tooltip-type="danger"] > span {
  background-color:#c0392b;
}

.tooltips[tooltip-type="danger"][tooltip-position="top"] > span:after{
  border-top: 8px solid #c0392b;
}

.tooltips[tooltip-type="danger"][tooltip-position="bottom"] > span:after{
  border-bottom: 8px solid #c0392b;
}

.tooltips[tooltip-type="danger"][tooltip-position="left"] > span:after{
  border-left: 8px solid #c0392b;
}

.tooltips[tooltip-type="danger"][tooltip-position="right"] > span:after{
  border-right: 8px solid #c0392b;
}
    </style>
</head>
<body>
    <div class="container">
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif

        @if (Session::has('info'))
            <div class="alert alert-info">{{ Session::get('info') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="text-left">
                <a href="{{ route('register') }}" class="mr-3">register</a>
                <a href="{{ route('forgot') }}" class="mr-3">forgot password</a>

                <a href="{{ route('contatcs') }}" class="mr-3">Contacts page</a>
                <a href="{{ route('country.index') }}" class="mr-3">Country page</a>
                <a href="{{ route('chart.index') }}">Chart</a>
            </div>
        </form>

        <div class="coupons">
            <div class="content">
                <div class="coupon-wrapper tooltips" tooltip="hết hạn trong 10 ngày" tooltip-position="top" tooltip-type="danger">
                  <input class="coupon-input" readonly="true" value="SAVE10" />
                  <button class="coupon-button clickCoupon">
                    Copy
                  </button>
                </div>
                <div class="coupon-wrapper tooltips" tooltip="hết hạn trong 10 ngày" tooltip-position="top" tooltip-type="danger">
                    <input class="coupon-input" readonly="true" value="SAVE50" />
                    <button class="coupon-button clickCoupon">
                      Copy
                    </button>
                  </div>
              </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function CopyCode (e) {
            const couponTextActive = "Copied!";
            const couponText = "Copy";
            e.preventDefault();
            document.execCommand(
                "copy",
                false,
                $(this).parent().find('.coupon-input').select()
            );
            $(this).parent().find('.clickCoupon').html(couponTextActive);
            setTimeout(function () {
               $('.clickCoupon').html(couponText);
            }, 1000);
        }
        $(document).on('click' , '.clickCoupon' , CopyCode);


        $('.tooltips').append("<span></span>");
            $('.tooltips:not([tooltip-position])').attr('tooltip-position','bottom');


            $(".tooltips").mouseenter(function(){
            $(this).find('span').empty().append($(this).attr('tooltip'));
        });

    </script>

</body>
</html>
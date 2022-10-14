<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <form>
            @csrf
            <div class="form-group">
              <label>Tỉnh</label>
              <select class="js-example-placeholder-single js-city form-control" id="city">
                <option></option>
              </select>

            </div>

            <div class="form-group">
                <label>Huyện</label>
                <select class="js-example-placeholder-single js-state form-control" id="state">
                  <option></option>
                </select>
              </div>
              <div class="form-group">
                <label>Xã</label>
                <select class="js-example-placeholder-single js-state_address form-control" id="state_address">
                  <option></option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">send</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        function getCountry () {
          $.ajax({
              type : 'get',
              headers: {
                "Accept": "application/json",
              },
              url : 'https://provinces.open-api.vn/api/',
              dataType: "json",
              processData: false,
              contentType: false,
              success : function (data) {
                data.forEach(element => {
                  $('#city').append('<option value="' + element.code +'">' +  element.name + '</option>')
                });
              },
              crossDomain: true,
              error : function (error) {
                console.log(error)
              },
          })
        }


        function getState () {
          let country_code = $('#city').val();
          $.ajax({
              type : 'get',
              headers: {
                "Accept": "application/json",
              },
              url : `https://provinces.open-api.vn/api/p/${country_code}?depth=2`,
              dataType: "json",
              processData: false,
              contentType: false,
              success : function (data) {
                $('#state :gt(0)').remove();
                data.districts.forEach(element => {
                  $('#state').append('<option value="' + element.code +'">' +  element.name + '</option>')
                });
              },
              crossDomain: true,
              error : function (error) {
                console.log(error)
              },
          })
        }


        function getStateAddress () {
          let state_address = $('#state').val();
          $.ajax({
              type : 'get',
              headers: {
                "Accept": "application/json",
              },
              url : `https://provinces.open-api.vn/api/d/${state_address}?depth=2`,
              dataType: "json",
              processData: false,
              contentType: false,
              success : function (data) {
                $('#state_address :gt(0)').remove();
                data.wards.forEach(element => {
                  $('#state_address').append('<option value="' + element.code +'">' +  element.name + '</option>')
                });
              },
              crossDomain: true,
              error : function (error) {
                console.log(error)
              },
          })
        }


       

        
        $(document).ready(function () {
          getCountry();
          $(".js-city").select2({
              placeholder: "Chọn thành phổ",
              allowClear: true
          });
          $(".js-state").select2({
              placeholder: "Chọn huyện",
              allowClear: true
          });
          $(".js-state_address").select2({
              placeholder: "Chọn xã",
              allowClear: true
          });
        })
        $('#city').on('change' , function () {
            getState();
        })
        $('#state').on('change' , function () {
          getStateAddress();
        })
      
    </script>
</body>
</html>
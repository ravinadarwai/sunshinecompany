<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('public/')}}/assets/css/home.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container posts-content  ">
        <div class="pt-3 px-3 mb-2 bg-dark">
        <a href="{{url('post')}}" class="w-70 btn btn-primary mb-4"> Post </a>
        <a href="{{url('logout')}}" class="btn btn-danger float-end ml-5 " style="    margin-left: 1rem;
">Logout</a>

        <a href="{{url('login')}}" class="w-70  btn btn-success float-end ">login/signup</a>
</div>
        <div class="row" id="post_image">
</div>
       
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            get_post_data();
        });

        function get_post_data() {
            var token = "{{ csrf_token() }}";
            var APP_URL = {!! json_encode(url('/')) !!};

            $.ajax({
                type: "POST",
                url: "{{ url('get-post') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token: token,
                },
                success: function (response) {
                    let result = response.data;
                    let cart_html = ``;
                    result.forEach(function (element, index) {
    let image_url = APP_URL + "/public/assets/img/post/" + element.image;
    cart_html += `<div class="col-lg-3 mb-4">
        <div class="card">
            
<div class="card-body">
    <div class="media mb-3">
        <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
            class="d-block ui-w-40 rounded-circle" alt="">
        <div class="media-body ml-3">
            ${element.getuser.name}
            <div class="text-muted small">${element.created_at}</div>
        </div>
    </div>
    <p>
        ${element.description || '_'} 
    </p>
    <a href="javascript:void(0)" 
        class="ui-rect ui-bg-cover" 
        style="background-image: url('${image_url}'); width: 100%; aspect-ratio: 1/1;"></a>
</div>
            <div class="card-footer">
                <a href="javascript:void(0)" 
                    onclick="image_like(${element.id})" 
                    class="d-inline-block text-muted">
                    <strong>${element.like_count}</strong>
                    <small class="align-middle">Likes</small>
                </a>
            </div>
        </div>
    </div>`;

    // Close the row after every 4 cards
    if ((index + 1) % 4 === 0) {
        cart_html += `</div><div class="row" id="post_image">`;
    }
});
                    $("#post_image").html(cart_html);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        function image_like(image_id) {
            var token = "{{ csrf_token() }}";
            var APP_URL = {!! json_encode(url('/')) !!};

            $.ajax({
                type: "POST",
                url: "{{ url('post-like') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token: token,
                    image_id: image_id,
                },
                success: function (response) {
                    let result = response.data;
                    get_post_data();
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }
    </script>
</body>

</html>

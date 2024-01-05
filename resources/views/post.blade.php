<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:  #e6f7ea  !important;
        }

        .login-container {
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center login-container">
            <div class="col-md-4 ">
                <div class="card" style="width:30rem;">
                    <div class="card-body ">
                        <h3 class="card-title text-center">Post New Image </h3><hr>
                       
                        <form role="form" action="{{ url('post-image') }}" method="POST" enctype="multipart/form-data">
                    
                            @csrf
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" class="form-control" id="image" placeholder="Upload image" name="image">
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" placeholder="Enter image description" name="description"></textarea>
                            </div>
                         
                            <button type="submit" class="btn btn-primary btn-block">Post</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

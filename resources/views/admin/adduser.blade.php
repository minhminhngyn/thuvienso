<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add user</title>
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('svendor/jquery/jquery.min.js') }}"></script>
	<!------ Include the above in your HEAD tag ---------->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
	<style>
		body {
		    /* background: url('https://static-communitytable.parade.com/wp-content/uploads/2014/03/rethink-target-heart-rate-number-ftr.jpg') fixed;*/
		    background-size: cover;
		}

		*[role="form"] {
		    max-width: 530px;
		    padding: 15px;
		    margin: 0 auto;
		    border-radius: 0.3em;
		    background-color: #f2f2f2;
		}

		*[role="form"] h2 { 
		    font-family: 'Open Sans' , sans-serif;
		    font-size: 40px;
		    font-weight: 600;
		    color: #000000;
		    margin-top: 5%;
		    text-align: center;
		    text-transform: uppercase;
		    letter-spacing: 4px;
		}
	</style>
</head>
<body>
	<div class="container" style="padding-top: 100px;">
            <form class="form-horizontal" role="form" action="{{ route('adminsqlkhachhang/postkh') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h2>Registration</h2>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtusername" name="txtusername" placeholder="UserName" class="form-control" autofocus required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="PassWord" placeholder="PassWord" class="form-control" autofocus required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control" name="email" autofocus required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Role:</label>
                    <div class="col-sm-9">
                        <input type="number" id="quyen_tk" placeholder="Quyen Tk" class="form-control" name="quyen_tk" value="1" autofocus required="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="cmd">Register</button>
            </form> <!-- /form -->
    </div> <!-- ./container -->
</body>
</html>
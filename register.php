<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
    <link  rel="stylesheet" type="text/css" href="../first.css">
</head>
<body>
<div class="frame">
    <form method="post" action="assets/php/_register.php" class="hvr-underline-from-left">
        <input type="text" name="name" class="form-control" placeholder="Name"><br/><br/>
        <input type="email" name="email" class="form-control" placeholder="Username"><br/><br/>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" data-toggle="password"><br/>
            <div>
                <input type="checkbox" id="methods">
                <i class="fa fa-eye"></i>
                <i class="fa fa-eye-slash"></i> 
            </div><br/>
        <input type="submit" value="submit">
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#methods').click(function(){
            $('#password').attr('type',$(this).is(':checked')
            ?'text': 'password')
        });
    });
</script>
</body>
</html>
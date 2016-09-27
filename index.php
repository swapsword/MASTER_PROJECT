<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style>
        body{
            background-color: #55acee;
        }
        h2{
            color: #ffffff;
        }
        h1{
            color: #55acee;
            font-family: "Courier New";
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h1>Tweets On Map</h1>
                <a class="navbar-brand" href="#"></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Search Tweets</h2>
        <form method="post" action="method.php"class="form-inline">
            <input type="text" name="search" class="form-control input-lg"placeholder="Enter Search" class="box-shadow">
            <button type="submit" class="btn btn-default btn-lg active">Search</button>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4"></div>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


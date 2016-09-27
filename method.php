<?php
$search =$_POST['search'];
?>
<html>
<head>
    <title>Link</title>
    <style>
        body{
            background-color: #55acee;
        }
        h2{
            color: #ffffff;
        }
        h1{
            color: #ffffff;
            font-family: "Courier New";
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h1>Link Constructed</h1>
                <a class="navbar-brand" href="#">

                </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2><a href="http://www.imcreator.eu/project/twitter_new/main.php?q=<?php echo $search?>&count=100">click the link</a></h2>
    </div>
</body>
</html>





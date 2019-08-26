<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="favicon.ico">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet" />

    <title>Awkward Styles</title>

    <style>
        body, html {
            height: 100%;
            min-height: 100%
        }

        #app, .Navbarcomponent {
            height: 100%;
            min-height: 100%;
        }

        .main {
            min-height: 100%;
            height: 100%;
            width: 100%;
        }

        .sidebar {
            width: 150px;
            max-width: 150px;
            min-width: 150px;
        }

        .sidebar-thin {
            max-width: 75px;
            width: 50px;
            min-width: 50px;
        }

        .contentArea {
            background-color: #f2f2f2;
            padding: 10px;
            min-width: 200px !important;
        }

        .searchBar {
            border-radius: 15px;
        }

        .tableImage {
            max-width: 100px;
            max-height: 100px;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0,0,0,0.1);
        }

        @media only screen and (max-width: 991px) {
            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
<noscript>
    <strong>We're sorry but Awkward Styles doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>

<div id="app">
    <affiliatedb />
</div>

<!-- built files will be auto injected -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="/js/app.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>
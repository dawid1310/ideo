<html>

<head>
    <title>Dawid Kosmala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            width: 100%;
        }

        .nav {
            height: 75px;
            background-color: #009688;
        }

        .nav .navbar {
            width: 70%;
            margin: auto;
        }

        .navbar a p {
            font-size: 36px;
            text-align: center;
            padding: 10px;
            color: white;

        }

        .navbar a:link {
            text-decoration: none;
        }

        .content {
            width: 70%;
            margin: auto;
        }


        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #009688;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #06ad9d;
        }

        .search {
            width: 60%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin: auto;
            margin-top: 30px;
        }

        .user {
            margin: auto;
            width: 15%;
            float: left;
            margin: 10px;

            background-color: rgb(245, 240, 240);
        }

        .user .userdetails {
            padding: 2px;
            text-align: center;
        }

        .user a {
            text-decoration: none;
            color: black;
        }

        .collaborators,
        .commits {
            clear: both;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .repo {
            float: left;
            margin: 10px;
        }

        .repository {
            margin: 10px;
        }

    </style>
    @yield('style')
</head>

<body>

    <div class="nav">
        <div class="navbar">
            <a href="/">
                <p>Git search</p>
            </a>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>

</body>

</html>

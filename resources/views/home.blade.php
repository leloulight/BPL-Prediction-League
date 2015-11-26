<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

       <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 52px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Home</div>
                <ul>
                    @foreach($fixtures as $fixture)
                        <?php echo "<pre>"; ?>
                        <?php var_dump($fixture); ?>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
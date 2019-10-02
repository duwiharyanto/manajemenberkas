<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Laporan PDF</title>        
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles 
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
                **/
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                text-align: center; 
                /** Extra personal styles 
                background-color: #03a9f4;
                color: white;
                
                line-height: 35px;
                **/
            }
            table tr td,
            table tr th{
                font-size: 9pt;
            }            
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            Our Code World
        </header>

        <footer>
            Copyright &copy; <?php echo date("Y");?> 
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            @yield('content')
        </main>
    </body>
</html>
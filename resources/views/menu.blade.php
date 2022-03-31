<html>
    <head>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
           <h2>MENU</h2>
           <form method="get" action="{{url('/categories')}}">
            <div class="d-grid gap-2">
                <button class="btn btn-dark" type="submit">categories</button>
            </div>
            </form>

            <form method="get" action="{{url('/products')}}">
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="submit">products</button>
                </div>
            </form>

            <form method="get" action="{{url('/organizations')}}">
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="submit">organizations</button>
                </div>
                </form>

                <form method="get" action="{{url('/invoices')}}">
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark" type="submit">invoices</button>
                    </div>
                    </form>
        </div>
    </body>


</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products - ePonuda</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">

            <h1 class="text-center mb-5">
                Laptop računari
            </h1>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-3 col-sm-6 mb-2">
                        <div class="card">
                            <div class="p-4">
                                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
                            </div>
                          
                          <div class="card-body">
                            <h5 class="card-title">
                                {{ $product->title }}
                            </h5>
                            <p class="card-text">
                                {{ $product->category }} > {{ $product->subcategory }}
                            </p>
                            @if($product->price_history)
                                <p>
                                    Stara cena: 
                                    <strike class="text-danger">
                                        {{ $product->price_history }} RSD
                                    </strike>
                                </p>
                            @endif
                            <p class="h4 p-3 mb-2 bg-warning text-dark text-center">
                                {{ $product->price }} RSD
                            </p>
                          </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex my-4">
                <div class="mx-auto">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </body>
</html>

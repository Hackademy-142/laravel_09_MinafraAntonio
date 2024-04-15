<x-layout>
    <x-head/>

    <div class="container mt-4">
        <div class="row">
            @foreach($products as $product)
            <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">{{$product->price}} €</h6>
                      <p class="card-text">{{$product->description}}</p>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>
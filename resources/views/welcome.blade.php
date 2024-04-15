<x-layout>

    <x-head/>

    <div class="container">
        <div class="row justify-content-center my-5 ">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <form class=" p-3 shadow rounded bg-secondary-subtle" method="POST" action="{{route('product.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del prodotto</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione del prodotto</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo del prodotto</label>
                        <input name="price" type="text" class="form-control" id="price" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea prodotto</button>
                </form>
            </div>
        </div>
    </div>



</x-layout>
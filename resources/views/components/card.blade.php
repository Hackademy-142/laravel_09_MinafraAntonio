<div class="card" style="width: 18rem;">
  <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="...">
  <div class="card-body">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text">{{ $product->description }}</p>
      <p class="card-text">Creato dall'utente: {{ $product->user->name }}</p>
      <p class="card-text">{{ $product->price }}</p>
      <a href="{{ route('product.show', compact('product')) }}" class="btn btn-primary">Vai al dettaglio</a>
      <a href="{{ route('product.edit', compact('product')) }}" class="btn my-1 bg-warning">Modifica prodotto</a>
      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" type="button">Elimina prodotto</button>
  </div>
</div>
{{-- quando usi un modal nel componente ricordati di passargli il dato se no non lo prende sia dal bottone collegato che nel modale stesso --}}
<div class="modal fade" id="deleteModal{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModalLabel{{ $product->id }}">SE SICURO DI ELIMINARE L'ARTICOLO?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn_custom" data-bs-dismiss="modal">NO</button>
              <form action="{{ route('product.destroy', compact('product')) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">SI</button>
              </form>
          </div>
      </div>
  </div>
</div>
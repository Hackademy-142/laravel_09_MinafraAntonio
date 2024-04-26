<x-layout>
    <header class="masthead1 text-dark">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
              <h1 class="fw-light display-1">I miei articoli</h1>
              <p class="lead"></p>
            </div>
          </div>
        </div>
      </header>
      <div class="container mt-4">
        <div class="row">
          @foreach($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card my-3" style="width: 18rem;">
                    <img src="{{Storage::url($article->img)}}" class="card-img-top h-50" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$article->name}}</h5>
                      <p class="card-subtitle">{{$article->subtitle}}</p>
                      <p class="card-text">{{$article->body}}</p>
                      <a href="{{route('article.show', compact('article'))}}" class="btn my-1 btn_custom">Dettaglio articolo</a>
                      <a href="{{route('article.edit', compact('article'))}}" class="btn my-1 bg-warning ">Modifica articolo</a>


                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Elimina articolo</button>




                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">SE SICURO DI ELIMINARE L'ARTICOLO?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn_custom" data-bs-dismiss="modal">NO</button>
        <form
                    action="{{route('article.destroy', compact('article') )}}"
                    method="POST"
                    >
                        @method('DELETE')
                        @csrf
          <button type="submit" class="btn btn-danger">SI</button>
        </form>
      </div>
    </div>
  </div>
</div>

</x-layout>
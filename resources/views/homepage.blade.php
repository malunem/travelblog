<x-html>
    <x-slot name="page_content">
        <header class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center" id="home_header">
                    <div class="text-center">
                        <h1>Guide di viaggio, itinerari e consigli</h1>
                        <h2>Scopri destinazioni, leggi guide e pubblica i tuoi articoli</h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="container-fluid mt-5">
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center">
                        Ultimi articoli
                    </h2>
                </div>
            </div>
            <div class="row mb-2 mt-5">
                @foreach ($allArticles as $article)
                <div class="col-12 col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                      <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0 text-dark">
                            {{$article->title}}
                        </h3>
                        <div class="mb-1 text-muted">{{$article->created_at}}</div>
                        <p class="card-text mb-auto">{{substr("$article->body", 0, 150) . "[...]"}}</p>
                        <a href="{{route('showArticle', ['article' => $article])}}">Continua a leggere</a>
                      </div>
                      <div class="card-img-right flex-auto d-none d-md-block" style="width: 400px; height: 250px; background-image: url('{{Storage::url($article->img)}}'); background-position: center; background-size: cover;"></div>
                      {{-- <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail" style="width: 200px; height: 250px;" src="{{Storage::url($article->img)}}" data-holder-rendered="true"> --}}
                    </div>
                  </div>
                @endforeach
            </div>
        </section>
    </x-slot>
</x-html>
<x-html>
    <x-slot name="page_content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>    
                    @endif
                    
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center">
                        Tutti gli articoli di {{Auth::user()->name}}
                    </h2>
                </div>
            </div>

            <div class="row mb-2 mt-5">
                @foreach ($articles as $article)
                <div class="col-12">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$article->title}}</h2>
                        
                        <p class="blog-post-meta">{{$article->created_at}} by <a href="/author/{{$article->author}}">{{$article->author}}</a></p>
                        
                        <img class="img-fluid" src="{{Storage::url($article->img)}}" alt="">

                        <p>{{$article->body}}</p>

                        @if (Auth::user()->name == $article->author)
                            <a href="{{route('editArticle', ['article'=>$article])}}">
                                <button class="my-5 btn">Modifica articolo</button>
                            </a>

                            <form method="POST" action="{{route('deleteArticle', ['article'=>$article])}}" class="d-inline">
                                @csrf
                                @method('delete')

                                <button type="submit" class="my-5 btn">Elimina articolo</button>
                            </form>
                        @endif
                </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-html>
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
                        Tutti gli articoli di {{$author_name}}
                    </h2>
                </div>
            </div>

            <div class="row mb-2 mt-5">
                @foreach ($articles as $article)
                <div class="col-12">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$article->title}}</h2>
                        
                        <p class="blog-post-meta">{{$article->created_at}} by <a href="/user/{{$article->getAuthor->id}}">{{$article->getAuthor->name}}</a></p>
                        
                        <img class="img-fluid" src="{{Storage::url($article->img)}}" alt="">

                        <p>{{$article->body}}</p>

                        @if (Auth::user()->id == $article->author_id)
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
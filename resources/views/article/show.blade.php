<x-html>
    <x-slot name="page_content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$article->title}}</h2>
                        
                        <p class="blog-post-meta">{{$article->created_at}} by <a href="/author/{{$article->author}}">{{$article->author}}</a></p>
                        
                        <img class="img-fluid" src="{{Storage::url($article->img)}}" alt="">

                        <p>{{$article->body}}</p>

                        @auth
                            <a href="{{route('editArticle', ['article'=>$article])}}">
                                <button class="my-5 btn btn-block">Modifica articolo</button>
                            </a>
                        @endauth
                </div>
            </div>
        </div>
    </x-slot>
</x-html>
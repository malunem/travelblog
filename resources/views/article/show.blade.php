<x-html>
    <x-slot name="page_content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$article->title}}</h2>
                        
                        <p class="blog-post-meta">{{$article->created_at}} by <a href="/user/{{$article->getAuthor->id}}">{{$article->getAuthor->name}}</a></p>
                        
                        <p class="blog-post-meta">
                            @foreach ($article->getTags as $tag)
                                <a href="/tag/{{$tag->id}}">
                                    {{$tag->tag_name}}
                                </a>
                            @endforeach
                        </p>
                        
                        <img class="img-fluid" src="{{Storage::url($article->img)}}" alt="">

                        <p>{{$article->body}}</p>

                        @if (Auth::user()->id == $article->getAuthor->id)
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
            </div>
        </div>
    </x-slot>
</x-html>
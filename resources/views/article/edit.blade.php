<x-html>
    <x-slot name="page_content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="vsc-initialized mt-5">
                    <form method="POST" action="{{route('updateArticle')}}" class="form-signin" id="article-form" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        <h1 class="h3 mt-5 font-weight-normal login_header">Modifica il tuo articolo di viaggio</h1>
                        
                        <label class="form-label mt-5">Titolo:</label>
                        <input name="title" type="text" class="form-control" value="{{$article->title}}">

                        <label class="form-label mt-4">Testo:</label>
                        <textarea name="body" type="email" class="form-control" rows="10">{{$article->body}}</textarea>

                        <div class="mt-4">
                            <img src="{{Storage::url($article->img)}}" class="img-fluid d-block" alt="">
                            <label class="form-label">Modifica l'immagine di copertina:</label>
                            <input name="img" type="file" class="form-control">
                        </div>

                        <input name="author" type="text" class="d-none form-control" value="{{Auth::user()->name}}">
                        
                        <button class="btn btn-block my-5" type="submit">Salva l'articolo</button>

                      </form>
                </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-html>
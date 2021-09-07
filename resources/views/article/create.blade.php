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
                    <form method="POST" action="{{route('saveArticle')}}" class="form-signin" id="article-form" enctype="multipart/form-data">
                        @csrf
                        
                        <h1 class="h3 mt-5 font-weight-normal login_header">Scrivi il tuo articolo di viaggio</h1>
                        
                        <label class="form-label mt-5">Titolo:</label>
                        <input name="title" type="text" class="form-control" placeholder="Scrivi il titolo...">

                        <label class="form-label mt-4">Testo:</label>
                        <textarea name="text" type="email" class="form-control" placeholder="Scrivi l'articolo..." rows="10"></textarea>

                        <label class="form-label mt-4">Carica l'immagine di copertina:</label>
                        <input name="img" type="file" class="form-control">

                        <label class="form-label mt-4">Seleziona i tag adatti 1:</label>
                        <select multiple class="form-select" name="tags[]">
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                        {{-- <label class="form-label mt-4">Seleziona i tag adatti 2:</label>
                        @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Default checkbox
                            </label>
                        </div>
                        @endforeach --}}
                        

                        <input name="author" type="text" class="d-none form-control" value="{{Auth::user()->name}}">

                        <button class="btn btn-block m-5" type="submit">Pubblica l'articolo</button>

                      </form>
                </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-html>
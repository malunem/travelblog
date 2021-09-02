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
                    <div class="text-center vsc-initialized mt-5">
                        <form method="POST" action="{{route('register')}}" class="form-signin">
                            @csrf

                            <i class="fas fa-globe-africa fa-3x mt-5 login_header"></i>
                            
                            <h1 class="h3 mt-5 font-weight-normal login_header">Crea il tuo account</h1>
                            
                            <input name="name" type="text" class="form-control mx-auto mt-5" placeholder="Nome utente" required="" autofocus="">

                            <input name="email" type="email" class="form-control mx-auto mt-2" placeholder="Indirizzo email" required="" autofocus="">
            
                            <input name="password" type="password" class="form-control mx-auto mt-2" placeholder="Scegli una password" required="">

                            <input name="password_confirmation" type="password" class="form-control mx-auto mt-2" placeholder="Conferma la password" required="">

                            <button class="btn btn-lg btn-block mt-5" type="submit">Registrati</button>
                            
                            <p class="mt-5 mb-5 text-muted">© 2021</p>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-html>
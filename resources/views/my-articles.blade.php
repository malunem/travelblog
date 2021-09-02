<x-html>
    <x-slot name="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>    
                    @endif
                    my articles
                </div>
            </div>
        </div>
    </x-slot>
</x-html>
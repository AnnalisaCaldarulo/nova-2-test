<x-layouts.layout title="{{$article->title}} | Aulab">

    @if ($article->meta)
        <x-slot name="meta">
            @foreach($article->meta as $key => $value)
                <meta name="{{ $key }}" content="{{ $value }}">
            @endforeach
        </x-slot>
    @endif

    <div class="d-flex container-fluid" style="height:50vh;background:url({{$article->getFirstMediaUrl('gallery')}})  center / cover no-repeat;">
    </div>
    <div class="container p-5 bg-light" style="margin-top:-100px">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="lc-block ">
                    <div>
                        <h2 class="display-5 text-uppercase d-inline" style="border-bottom: 1px solid #FEEF00;">{{$article->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-8 text-center">
                <h2 class="display-6">{{$article->subtitle}}</h2>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-8">
                {!! $article->body !!}
                <div class="text-end mt-5">
                    <p class="fst-italic">
                        {{$article->user->name}}
                    </p>
                </div>
                <hr>
                <div id="carouselExampleControls" class="carousel slide my-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($article->getMedia('gallery') as $image)
                            <div class="carousel-item  @if($loop->first) active @endif">
                                <img src="{{$image->getUrl('carousel')}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <hr>
                <div class="text-center my-5">
                    <a href="{{route('article.index')}}" class="btn btn-dark">Torna al blog</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
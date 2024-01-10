<x-layouts.layout title="Tutti gli articoli | Aulab">
    <div class="d-flex container-fluid" style="height:50vh;background:url(https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)  center / cover no-repeat;">
    </div>
    <div class="container p-5 bg-light" style="margin-top:-100px">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="lc-block ">
                    <div>
                        <h2 class="display-6 text-uppercase d-inline" style="border-bottom: 1px solid #FEEF00;">I nostri articoli</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            @forelse($articles as $article)
                <div class="col-12 col-md-4">
                    <div class="card" style="border:none!important; background-color: transparent!important;">
                        <img src="{{$article->getFirstMediaUrl('gallery', 'index_cover')}}" alt="{{$article->title}}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <h6 class="card-subtitle fst-italic text-muted mb-3">{{$article->subtitle}}</h6>
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-dark mt-3">Leggi l'articolo</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 col-md-6">
                    <h3>Non ci sono ancora ricette! Torna tra qualche giorno!</h3>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.layout>
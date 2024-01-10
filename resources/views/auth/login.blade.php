<x-layouts.layout title="Accedi | Aulab">

  <div class="d-flex container-fluid" style="height:50vh;background:url(https://images.unsplash.com/photo-1580894895938-bd31a62ed8ba?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)  center top 35% / cover no-repeat;">
  </div>
  <div class="container p-5 bg-light" style="margin-top:-100px">
      <div class="row justify-content-center">
          <div class="col-md-8 text-center">
              <div class="lc-block ">
                  <div>
                      <h2 class="display-6 text-uppercase d-inline" style="border-bottom: 1px solid #FEEF00;">Accedi</h2>
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-12 col-md-8">
              <div class="lc-block mt-5">
                <form method="POST" action="{{route('login')}}" class="text-center">
                  @csrf

                  <div class="form-outline mb-4">
                      <input type="email" name="email" id="form2Example17" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}"/>
                      @error('email')
                          <span class="fst-italic text-danger small">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="form2Example17">Indirizzo email</label>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                      @error('password')
                          <span class="fst-italic text-danger small">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Accedi</button>
                  </div>

                  <a class="small text-muted" href="#!">Hai dimenticato la password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Non hai un account? <a href="{{route('register')}}"
                      style="color: #393f81;">Registrati qui</a></p>
                  <a href="#!" class="small text-muted">Terms of use</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
              </form>
              </div>
          </div>
      </div>
  </div>

</x-layouts.layout>
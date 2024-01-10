<x-layouts.layout title="Registrati | Aulab">

  <div class="d-flex container-fluid" style="height:50vh;background:url(https://images.unsplash.com/photo-1630091003936-aea522c1e8c3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)  center / cover no-repeat;">
  </div>
  <div class="container p-5 bg-light" style="margin-top:-100px">
      <div class="row justify-content-center">
          <div class="col-md-8 text-center">
              <div class="lc-block ">
                  <div>
                      <h2 class="display-6 text-uppercase d-inline" style="border-bottom: 1px solid #FEEF00;">Registrati</h2>
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-12 col-md-8">
              <div class="lc-block mt-5">
                <form method="POST" action="{{route('register')}}" class="text-center">
                  @csrf

                  <div class="form-outline mb-4">
                      <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{old('name')}}"/>
                      @error('name')
                          <span class="fst-italic text-danger small">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="name">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}"/>
                      @error('email')
                          <span class="fst-italic text-danger small">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="email">Indirizzo email</label>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                      @error('password')
                          <span class="fst-italic text-danger small">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" />
                      @error('password_confirmation')
                          <span class="fst-italic text-danger small">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="password_confirmation">Conferma password</label>
                  </div>

                  <div class="pt-1">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Registrati</button>
                  </div>

                  <p class="pb-lg-2" style="color: #393f81;">Hai già un account? <a href="{{route('login')}}" style="color: #393f81;">Accedi qui</a></p>
                  <a href="#!" class="small text-muted">Terms of use</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
              </form>
              </div>
          </div>
      </div>
  </div>

</x-layouts.layout>
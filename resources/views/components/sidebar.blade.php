<!-- Desna strana -->
        <div class="col-md-4">
          <div class="card my-4">
            <h5 class="card-header">Dokumentacija</h5>
            <div class="card-body">
              <div class="input-group">
                   <a href="{{ asset('/download') }}" class="btn btn-danger">Download</a>
              </div>
            </div>
          </div>
          <form action="{{ route('search') }}" method="GET">
          {{ csrf_field() }}
          <div class="card my-4">
            <h5 class="card-header"><input type="text" id="search" name="search" class="form-control"/></h5>
            <div class="card-body">
              <div class="input-group">
              <input type="submit" name="btnSearch" value="Search" class="btn btn-primary"/>
              </div>
            </div>
          </div>
          </form>
            @if(!session()->has('user'))
          <div class="card my-4">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">


                  @isset($errors)
                    @if($errors->any())
                      @foreach($errors->all() as $error)
                        {{ $error }}
                      @endforeach
                    @endif
                  @endisset

                  <!-- LOGIN FORM -->

                  <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Korisnicko ime:</label>
                        <input type="text" id="imeprezime" name="tbKorisnickoIme" class="form-control" onkeyup="proveraKontakt()"/>
                    </div>

                    <div class="form-group">
                      <label>Lozinka:</label>
                      <input type="password" id="sifra" name="tbLozinka" class="form-control" onkeyup="proveraKontakt()"/>
                    </div>

                    <input type="submit" name="btnLogin" value="Login" class="btn btn-primary"/>
                  <a href="{{ asset('register') }}" class="btn btn-warning">Register</a>
                  </form>

                  <!--// LOGIN FORM -->

                </div>
              </div>
            </div>
          </div>
            @endif
          @if(session()->has('user'))
          <div class="card my-4">
            <h5 class="card-header">Panel</h5>
            <div class="card-body">
              <p>
                @if(session()->get('user')[0]->naziv == 'admin')
                <a href="{{ asset('/posts') }}" class="btn btn-warning">Create/Change post</a>
                <br/> <br/>
                <a href="{{ asset('/users') }}" class="btn btn-warning">Upravljanje korisnicima</a>
                <br/> <br/>
                <a href="{{ asset('/roles') }}" class="btn btn-warning">Upravljanje ulogama</a>
                <br/> <br/>
                <a href="{{ asset('/logs') }}" class="btn btn-warning">Logovi</a>
                @endif
                @if(session()->get('user')[0]->naziv != 'admin')
                <a href="{{ asset('/posts/create') }}" class="btn btn-warning">Create/Change post</a>
                @endif
              </p>
            </div>
          </div>
          @endif
        </div>
		<!--// Desna strana -->

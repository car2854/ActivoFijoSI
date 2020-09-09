@extends ('layouts.principal')
@section ('contenido')

  <div class="content-wrap">
        <div class="main">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 p-r-0 title-margin-right">
                <div class="page-header">
                  <div class="page-title">
                    <h1>Hola, <span>Bienvenido</span></h1>
                  </div>
                </div>
              </div>
            </div>
            <!-- /# row -->
            <section id="main-content">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="user-profile">
                        <div class="row">
                          @foreach ($usuario as $usu)
                          <div class="col-lg-4">
                            <div class="user-photo m-b-30">
                              <img class="img-fluid" src="assets/images/user-profile.jpg" alt="" />
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="user-profile-name">{{$usu->name}}</div>
                            <div class="user-Location"><i class="ti-location-pin"></i> New York, New York</div>
                            <div class="user-job-title">{{$usu->rol}}</div>
                            <div class="ratings">

                            </div>
                            <div class="custom-tab user-profile-tab">
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">Acerca de</a></li>
                              </ul>
                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="1">
                                  <div class="contact-information">
                                    <h4>information</h4>
                                    <div class="phone-content">
                                      <span class="contact-title">Telefono:</span>
                                      <span class="phone-number">{{auth()->user()->Telefono}}</span>
                                    </div>
                                    <div class="email-content">
                                      <span class="contact-title">Correo:</span>
                                      <span class="contact-email">{{ auth()->user()->email }}</span>
                                    </div>
                                    <div class="skype-content">
                                      <span class="contact-title">Skype:</span>
                                      <span class="contact-skype">Admin Board</span>
                                    </div>
                                    <div class="birthday-content">
                                      <span class="contact-title">Miembro desde:</span>
                                      <span class="birth-date">{{auth()->user()->created_at}}</span>
                                    </div>
                                    <div class="gender-content">
                                      <span class="contact-title">Genero:</span>
                                      <span class="gender">{{auth()->user()->Genero}}</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-title">
                      <h4>Ultimas actividades</h4>
                    </div>
                    <div class="recent-comment">
                      @foreach ($consulta as $c)
                      <div class="media">
                          <div class="media-body">
                            <p>{{ $c->accion }}. </p>
                            <p class="comment-date">{{ $c->fechaAccion }}</p>
                          </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <!-- /# card -->
                </div>
                <!-- /# row -->

              </div>
            </section>
          </div>
        </div>
      </div>


@endsection

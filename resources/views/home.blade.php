@extends('layouts.app')

@section('title',"Ekstrakurikuler - SMK Negeri 4 Kuningan")

@section('content')
<div id="particles-js">
<div class="container bgimage">
    <div class="col-md-12">
     <h3 class="word-title">
        Selamat Datang,Di Website&nbsp;
         <span class="diff-color">Pendaftaran Ekstrakurikuler
         </span><br>
         <span>SMK Negeri 4 Kuningan</span>
         <hr>
     </h3>
     <p class="sub-word-title">Pilih ekstrakurikuler sesuai dengan bakat dan minat kamu</p>
 </div>
</div>
 </div>

<img src="{{ asset('assets/img/wave-atas.svg') }}" alt="Wave" class="img-fluid">

<section class="list-eskul text-center bg-light" id="list-ekskul">
        <div class="col-12">
          <span class="bg-judul">Daftar Ekskul</span>
          <br />
          <h2 class="judul-h2">Silahkan Pilih <span class="dif-color">Ekskul</span> Yang Ingin Kamu Ikuti</h2>
          <img src="{{ asset('assets/img/judul-divider.svg') }}" class="img-fluid" alt="Divider">
        </div>
            <div class="card-body">
                    <div class="col-12 col-md-12">
                        <div class="row">
                     <div class="col-12 col-md-4">
                        <a href="{{ route('home.pramuka')}}">
                     <div class="card">
                     <h3 class="eskul-name">Pramuka</h3>
                     </div>
                    </a>
            </div>

            <div class="col-12 col-md-4">
                <a href="{{ route('home.paskibra')}}">
                <div class="card">
                    <h3 class="eskul-name">Paskibra</h3>
                </div>
            </a>
                </div>
            <div class="col-12 col-md-4">
                <a href="{{ route('home.silat')}}">
                <div class="card">
                  <h3 class="eskul-name">Pencak Silat</h3>
                </div>
            </a>
            </div>
                     </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a href="{{ route('home.rohis')}}">
                            <div class="card">
                               <h3 class="eskul-name">Rohani Islam (Rohis)</h3>
                            </div>
                        </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="{{ route('home.marching')}}">
                            <div class="card">
                                <h3 class="eskul-name">Marching Band</h3>
                            </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="{{ route('home.seni')}}">
                            <div class="card">
                                <h3 class="eskul-name">Bengkel Seni</h3>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a href="{{ route('home.futsal')}}">
                            <div class="card">
                               <h3 class="eskul-name">Futsal</h3>
                            </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="{{ route('home.volly')}}">
                            <div class="card">
                                <h3 class="eskul-name">Volly</h3>
                            </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="{{ route('home.pmr')}}">
                            <div class="card">
                                <h3 class="eskul-name">PMR</h3>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
</section>

<img src="{{ asset('assets/img/wave-bawah.svg') }}" alt="Wave" class="img-fluid">

<section class="video text-center">
    <div class="col-12">
        <h2 class="judul-h2">Video Demo <span class="dif-color">Ekstrakurikuler</span></h2>
        <div class="divider mx-auto mb-5"></div>
      </div>
    <iframe width="420" height="315"
src="https://www.youtube.com/embed/aa4HqiNeSak">
</iframe>
</section>
@endsection

@push('scripts')
<script>
    particlesJS( "particles-js", {
        "particles":{
            "number":{
                "value":90,
                "density":{
                    "enable":true,
                    "value_area":800
                }
            },
            "color":{
                "value":["#BD10E0","#B8E986","#50E3C2","#FFD300","#E86363"]
            },
            "shape":{
                "type":"circle",
                "stroke":{
                    "width":0,
                    "color":"#000000"
                },
                "polygon":{
                    "nb_sides":5
                },"image":{
                    "src":"img/github.svg",
                    "width":100,
                    "height":100}
                },
                "opacity":{
                    "value":0.5,
                    "random":false,
                    "anim":{
                        "enable":false,
                        "speed":1,
                        "opacity_min":0.1,
                        "sync":false
                    }
                },
                "size":{
                    "value":5.9458004845442964,
                    "random":true,
                    "anim":{
                        "enable":false,
                        "speed":60,
                        "size_min":0.1,
                        "sync":false
                    }
                },
                "line_linked":{
                    "enable":false,
                    "distance":200,
                    "color":"#ffffff",
                    "opacity":0.3,
                    "width":1.2
                },
                "move":{
                    "enable":true,
                    "speed":8,
                    "direction":"none",
                    "random":true,
                    "straight":false,
                    "out_mode":"bounce",
                    "bounce":false,
                    "attract":{
                        "enable":false,
                        "rotateX":600,
                        "rotateY":1200
                    }
                }
            },
            "interactivity":{
                "detect_on":"canvas",
                "events":{
                    "onhover":{
                        "enable":true,
                        "mode":"repulse"
                    },
                    "onclick":{
                        "enable":true,
                        "mode":"push"
                    },
                    "resize":true
                },
                "modes":{
                    "grab":{
                        "distance":420,
                        "line_linked":{
                            "opacity":1
                        }
                    },
                    "bubble":{
                        "distance":203.7831747021169,
                        "size":40,
                        "duration":2,
                        "opacity":8,
                        "speed":3
                    },
                    "repulse":{
                        "distance":103.8894616128439,
                        "duration":0.4
                    },
                    "push":{
                        "particles_nb":6
                    },
                    "remove":{
                        "particles_nb":5
                    }
                }
            },
            "retina_detect":true
        });
    </script>
@endpush


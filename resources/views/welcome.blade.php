<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(!Auth::user())
            <title>Appinion Landing Page</title>
        @endif
        @if(Auth::user())
            <title>Appinion Dashboard</title>
        @endif
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Style -->
        @if(!Auth::user())
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/landing.css') }}" >
        @endif
        @if(Auth::user())
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/dashboard.css') }}" >
        @endif
        <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}" >

        <!-- Favicon -->
        <link rel = "icon" href = "{{ asset('/assets/images/AppinionLogo.svg') }}" type = "image/x-icon"> 

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       
    </head>

    <body>
        <header>
            @include('layouts.header')
        </header>
        <div id="page-container">
            <div id="content-wrap">
                @if(!Auth::user())
                <div id="top-container">
                    <div id="top-content-container">
                        <!--<div id="auth-container"></div>-->
                        <div id="title-buttons-container">
                            <div id="title-container">
                                <h1>Jednim klikom poveži se sa publikom</h1>
                                <h4>Isprobajte novi način uključivanja publike u prezentaciju putem Appinion aplikacije.</h4>
                            </div>
                            <div id="buttons-container">
                                <button class="auth-button" id="reg-button" onclick="window.location.href = '/registracija';">Registracija</button>
                                <button class="auth-button" id="log-button" onclick="window.location.href = '/prijava';">Prijava</button>
                            </div>
                        </div>
                        <div id="top-images-container">
                            <div class="top-substtraction-container">
                                <img id="top-substtraction" src="{{ asset('/assets/images/top-images/Subtraction13.svg') }}">
                            </div>
                            <div class="top-mobile-container">
                                <img id="top-mobile" src="{{ asset('/assets/images/top-images/MobilePhone.png') }}">
                            </div>
                        </div>
                    </div>

                </div>
                <div id="pogodnosti-container">
                    <div id="pogodnosti-title-container">
                        <div id="pogodnosti-title-image-container">
                            <img id="pogodnosti-title-image" src="{{ asset('/assets/images/body/pogodnosti/Path264.svg') }}">
                        </div>
                        <div id="pogodnosti-title-text-container">
                            <h2>Pogodnosti</h2>
                        </div>
                    </div>

                    <div id="pogodnosti-content-container">
                        <div id="pogodnosti-text-container">
                            <p>Želite veću uključenost svoje publike u prezentaciju? Želite da zadržite njihovu pažnju? <br> Appionion je aplikacija koja će vam pomoći u tome! Kreirajte pitanja i u željenom trenutku dozvolite publici da odgovara na njih. Grafički prikaz grupnih rezultata će biti vidljiv odmah na platnu.</p>
                        </div>

                        <div id="pogodnosti-cards-container">
                            <div class="pogodnosti-card-class" id="pogodnosti-card-one">
                                <div class="pogodnosti-icon-container">
                                    <img class="pogodnosti-icon-class" src="{{ asset('/assets/images/body/pogodnosti/postit.svg') }}">
                                </div>
                                <div class="pogodnosti-card-title-container">
                                    <h3>Uključenost</h3>
                                </div>
                                <div class="pogodnosti-card-text-container">
                                    <p>Kroz interakciju s publikom osigurajte veću uključenost učesnika prezentacije.</p>
                                </div>
                            </div>

                            <div class="pogodnosti-card-class" id="pogodnosti-card-two">
                                <div class="pogodnosti-icon-container">
                                    <img class="pogodnosti-icon-class" src="{{ asset('/assets/images/body/pogodnosti/counsel.svg') }}">
                                </div>
                                <div class="pogodnosti-card-title-container">
                                    <h3>Zainteresovanost</h3>
                                </div>
                                <div class="pogodnosti-card-text-container">
                                    <p>Većim uključenjem razbudite interes publike za vašu prezentaciju.</p>
                                </div>
                            </div>

                            <div class="pogodnosti-card-class" id="pogodnosti-card-three">
                                <div class="pogodnosti-icon-container">
                                    <img class="pogodnosti-icon-class" src="{{ asset('/assets/images/body/pogodnosti/advice.svg') }}">
                                </div>
                                <div class="pogodnosti-card-title-container">
                                    <h3>Pažnja</h3>
                                </div>
                                <div class="pogodnosti-card-text-container">
                                    <p>Usmjerite pažnju auditorija na željene teme i ispitajte njihovo mišljenje i znanje.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="o-nama-container">    
                    <div class="o-nama-background">
                        <img id="o-nama-background-image" src="{{ asset('/assets/images/background-images/Subtraction14.svg') }}">
                    </div>
                    <div id="o-nama-title-container">
                        <div id="o-nama-title-image-container">
                            <img id="o-nama-title-image" src="{{ asset('/assets/images/body/pogodnosti/Path264.svg') }}">
                        </div>
                        <div id="o-nama-title-text-container">
                            <h2>Šta kažu drugi</h2>
                        </div>
                    </div>
                    <div id="o-nama-content-container">
                        <div id="o-nama-text-container">
                            <p>Mnogo je zadovoljnih korisnika Appinion aplikacije. <br> Isprobajte i vi Appinion i pošaljite nam vaše iskustvo, mi ćemo ga vrlo rado objaviti.</p>
                        </div>
                        <div id="o-nama-quotes-container">
                            <div class="o-nama-quotes-container-class" id="o-nama-quote-one">
                                <div class="quote-content-container">
                                    <img class="o-nama-single-quote-image" src="{{ asset('/assets/images/body/o-nama/Group287.svg') }}">
                                    <div class="vl"></div>
                                    <div class="quote-content-text">
                                        <h5>Mirza Ahmetović</h5>
                                        <p>Jako mi je važno da moja publika aktivno učestvuje u onome što predajem. Probao sam sa aplikacijom Appinion i jako sam zadovoljan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="o-nama-quotes-container-class" id="o-nama-quote-two">
                                <div class="quote-content-container">
                                    <img class="o-nama-single-quote-image" src="{{ asset('/assets/images/body/o-nama/Group287.svg') }}">
                                    <div class="vl"></div>
                                    <div class="quote-content-text">
                                        <h5>Lamija Turković</h5>
                                        <p>Povezivanjem ljudi i njihovim angažmanom ostvarujemo najbolje rezultate u edukaciji. Zato je ova aplikacija korisna.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="o-nama-quotes-container-class" id="o-nama-quote-three">
                                <div class="quote-content-container">
                                    <img class="o-nama-single-quote-image" src="{{ asset('/assets/images/body/o-nama/Group287.svg') }}">
                                    <div class="vl"></div>
                                    <div class="quote-content-text">
                                        <h5>Asim Kučuk</h5>
                                        <p>Sviđa mi se jednostavnost i što su rezultati "real-time". Ljudima se to dopada i svi rado učestvuju. Meni je njihov feedback koristan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="preuzimanje-container">
                    <div id="preuzimanje-title-container">
                        <div id="preuzimanje-title-image-container">
                            <img id="preuzimanje-title-image" src="{{ asset('/assets/images/body/pogodnosti/Path264.svg') }}">
                        </div>
                        <div id="preuzimanje-title-text-container">
                            <h2>Preuzimanje</h2>
                        </div>
                    </div>
                    <div id="preuzimanje-content-container">
                        <div id="preuzimanje-text-container">
                            <p>Preuzmite Appinion putem Google Play platforme.</p>
                        </div>
                        <div id="preuzimanje-google-content-container">
                            <img id="preuzimanje-title-image" src="{{ asset('/assets/images/body/preuzimanje/Google_Play.svg') }}">
                            <button class="auth-button" id="download-button">Besplatano preuzimanje</button>
                        </div>
                    </div>
                </div>
                <div id="kontakt-container">
                    <div class="kontakt-background">
                        <img id="kontakt-background-image" src="{{ asset('/assets/images/body/kontakt/bg.png') }}">
                    </div>
                    <div id="kontakt-title-image-container">
                        <img id="kontakt-title-image" src="{{ asset('/assets/images/body/pogodnosti/Path264.svg') }}">
                    </div>
                    <div id="kontakt-title-text-container">
                        <h2>Kontakt</h2>
                    </div>
                    <div id="kontakt-form-container">
                        <form id="form-kontakt-class">
                            <input class="input-kontakt-class" type="text" id="fname" name="fname" required placeholder="Ime, Prezime">
                            <input class="input-kontakt-class" type="text" id="fname" name="fname" required placeholder="E-mail">
                            <input class="input-kontakt-class" type="text" id="fname" name="fname" required placeholder="Broj telefona">
                            <input class="input-kontakt-class" type="text" id="fname" name="fname" required  placeholder="Poruka">
                            <button id="input-kontakt-button" type="submit">Pošalji</button>
                        </form>
                    </div>
                </div>
                <script src="/js/app.js"></script>
                @endif
                @if(Auth::user())
                @include('layouts.app')
                <script src="/js/app.js"></script>
                @endif
            </div>
        </div>
    @if(!Auth::user())    
    <footer>
        @include('layouts.footer')
    </footer>
    @endif
    </body>


</html>

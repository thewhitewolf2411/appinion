<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<meta http-equiv="Refresh" content="5">-->
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/question.css') }}" >

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    </head>
    <body>

    <header>
        <div id='header-container'>
            <div id='header-title-container'>
                <p>Naziv prezentacije</p>
                <h3> {{DB::table('prezentacije')->where('gen_kod', $data[$i]->id_prezentacije)->pluck('ime_prezentacije')[0]}} </h3>
            </div>
        </div>
    </header>


    <div id='page-container'>
        <div id='title-container'><h3>{{ $data[$i]->pitanje }}</h3></div>
    <div style="width:600px;">
    <canvas id="questionChart" ></canvas>
    </div>
        

        <script>
            var ctx = document.getElementById('questionChart').getContext('2d');
            var myChart = new Chart(ctx, {

                type: 'bar',
                data: {
                    labels:['{!! $data[$i]->odgovor1 !!}','{!! $data[$i]->odgovor2 !!}','{!! $data[$i]->odgovor3 !!}','{!! $data[$i]->odgovor4 !!}'],
                    datasets: [{
                        label: '# of Votes',
                        data: ['{!! $odgovoriZaPitanje[0] !!}', '{!! $odgovoriZaPitanje[1] !!}', '{!! $odgovoriZaPitanje[2] !!}', '{!! $odgovoriZaPitanje[3] !!}'],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        
        </script>
        
        @if($i < count($data)-1)
            @if($i>0)
            <a href="/pitanje/{{ $idprezentacije }}/{{ $i-1 }}">Previous</a>
            @endif
            <a href="/pitanje/{{ $idprezentacije }}/{{ ++$i }}">Next</a>
        @else
            <a href="/pitanje/{{ $idprezentacije }}/{{ $i-1 }}">Previous</a>
            <a href="/presentation/{{ $idprezentacije }}">End Presentation</a>
        @endif
    </div>

    <div className='form-group'>
        <button type='submit' className='form-control' id='submit' name='submit' onclick="location.href='/presentation/{{$data[0]->id_prezentacije}}';" >Prezentacija</button>
    </div>

    <div className='form-group'>
        <button type='submit' className='form-control' id='submit' name='submit' onclick="location.href='/';" >Dashboard</button>
    </div>
    
    </body>
</html>
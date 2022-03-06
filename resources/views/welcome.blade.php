<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- My Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <title>Covid-19 Tracker</title>
</head>
<body>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$location->country}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container my-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Confirmed</th>
                                <th scope="col">Recovered</th>
                                <th scope="col">Deaths</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details->Countries as $item)
                                @if($item->Country == $location->country)
                            <tr>
                                <td>
                                    {{$item->TotalConfirmed}}
                                    <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i> {{$item->NewConfirmed}}</small>
                                </td>
                                <td> {{$item->TotalRecovered}}</td>
                                <td>{{$item->TotalDeaths}}</td>
                            </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><div class="container-fluid bg-light p-5 text-center my-3">
    <h1 class="">Covid-19 Tracker</h1>
    <h5 class="text-muted">An opensource project to keep track of all the COVID-19 cases around the world.</h5>
</div>
<div class="container-fluid bg-dark p-5 text-center my-3 col-10">
    <button type="button" class="btn btn-success" data-toggle="modal" id="myModel" data-target="#exampleModalCenter">
        MY COUNTRY
    </button>
</div>

<div class="container my-5">
    <div class="row text-center">
        <div class="col-12 text-dark my-5" >
            <h1>WORLD INFO COVID-19</h1>
            <hr>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-4 text-warning">
            <h5>Confirmed</h5>
            {{$details->Global->NewConfirmed}}
        </div>
        <div class="col-4 text-danger">
            <h5>NewDeaths</h5>
            {{$details->Global->NewDeaths}}
        </div>
        <div class="col-4 text-success">
            <h5>NewRecovered</h5>
            {{$details->Global->NewRecovered}}
        </div>
        <div class="col-4 text-warning">
            <h5>TotalConfirmed</h5>
            {{$details->Global->TotalConfirmed}}
        </div>

        <div class="col-4 text-danger">
            <h5>TotalDeaths</h5>
            {{$details->Global->TotalDeaths}}
        </div>
        <div class="col-4 text-success">
            <h5>TotalRecovered</h5>
            {{$details->Global->TotalRecovered}}
        </div>
    </div>
</div>

<div class="container bg-light p-3 my-5 text-center">
    <h5 class="text-info">"Your Localization Info."</h5>
{{--    @dd($location)--}}
    @foreach($location as $key => $value)
    <p class="text-muted">{{$key}}:{{$value}}</p>
    @endforeach
</div>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Countries</th>
                <th scope="col">Confirmed</th>
                <th scope="col">Recovered</th>
                <th scope="col">Deaths</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($details->Countries as $item){
            ?>
            <tr>
                <th scope="row">{{$item->Country}}</th>
                <td>
                    {{$item->TotalConfirmed}}
                    <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i> {{$item->NewConfirmed}}</small>
                </td>
                <td> {{$item->TotalRecovered}}</td>
                <td>{{$item->TotalDeaths}}</td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Copyright &copy;2020</span>
    </div>
</footer>

</body>
</html>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModel').click();
    });
</script>

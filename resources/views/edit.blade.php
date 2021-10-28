<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="../../css/iofrm-theme6.css">
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="i../../mages/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="../../images/graphic2.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>

                        <p> {{ session()->get('message') }} </p>

                        <form action="{{ url('/to_do/'.$data[0]->id)  }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('put')

                            <input value="{{ $data[0]->title }}" class="form-control" type="text" name="title"
                                placeholder="Title" required>

                            <textarea value="{{ $data[0]->description }}" class="form-control" type="text"
                                name="description" placeholder="Description" required></textarea>

                            <input value="{{ $data[0]->start_date }}" class="form-control" type="date" name="start_date"
                                placeholder="Start Date" required>

                            <input value="{{ $data[0]->end_date }}" class="form-control" type="date" name="end_date"
                                placeholder="End Date" required>

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Submit</button>

                                <button class="ibtn">
                                    <a href="{{ url('to_do') }}">
                                        Display
                                    </a>
                                </button>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/popper.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
</body>

</html>
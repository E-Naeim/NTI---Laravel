<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme6.css">

</head>

<body>


    <div class="form-body" class="container-fluid">

        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>

        <div class="row">

            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic2.svg" alt="">
                </div>
            </div>
            <div class="form-holder" style="background-color:#A06DF2;">

                <h4 class="mt-2" style="text-align: center; background-color:#A06DF2; color: #D3F0FB;">
                    {{ 'Welcome : '.auth()->user()->name }} </h4>


                <a style="text-decoration: none;" href="{{ url('users/logOut') }}">
                    <button style="margin-left: 43%;" class="btn btn-danger mb-2 mr-2 m-r-1em">LogOut
                    </button>
                </a>

                <a style="text-decoration: none;" href="{{ url('to_do/create') }}">
                    <button style=" background-color:#D3F0FB; color: #A06DF2;" class=" mb-2 ml-2 btn m-r-1em">New Pin
                    </button>
                </a>






                <div class="form-content">
                    <table class="table text-light">
                        <thead style="background-color:#A06DF2;">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark" style="background-color:#D3F0FB;">
                            @foreach ($data as $value)
                            @if($value->end_date >= date("Y-m-d")) <tr>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->start_date }}</td>
                                <td>{{ $value->end_date }}</td>
                                <td>
                                    <a href="{{ url('/to_do/'.$value->id.'/edit') }}"
                                        class="btn btn-primary m-r-1em">Edit</a>

                                    <a href="" data-toggle="modal" data-target="#modal_single_del{{ $value->id }}"
                                        class="btn btn-danger m-r-1em">Delete</a>
                                </td>
                            </tr>
                            @endif

                            <div class="modal" id="modal_single_del{{ $value->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">delete confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            Delete {{ $value->name }} !!!!
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ url('/to_do/'.$value->id) }}" method="post">

                                                {{-- <input type="hidden" name="_method" value="delete"> --}}

                                                @method('delete')

                                                @csrf

                                                <div class="not-empty-record">
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
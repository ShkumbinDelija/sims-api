<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Information Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/student">Student Information Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/students/exams">Submitted exams</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="services" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>Hello, <span class="text-info">{{Auth::user()->name}}</span> submit an exam.</h2>
                <h4>[Term : <span class="text-primary">{{$term->description}}</span>]</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exams as $exam)
                        <tr>
                            <td>{{\App\Course::where('id',$exam->course_id)->get()->count() == 0 ? $exam->course_id :
                            \App\Course::find($exam->course_id)->name}}</td>
                            <td>{{\App\Semester::where('id',$exam->semester_id)->get()->count() == 0 ? $exam->semester_id :
                            \App\Semester::find($exam->semester_id)->description}}</td>
                            <td>
                                {!! Form::open(['action' => ['API\StudentController@submit',$exam->id,Auth::user()->id],'method' => 'POST']) !!}
                                <button class="btn btn-success">Submit</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Student Information Management System 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="/js/scrolling-nav.js"></script>

</body>
<script>
    $(function () {

    });
</script>
</html>

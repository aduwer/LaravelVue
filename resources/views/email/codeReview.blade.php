<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="url" content="{{ url('') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <title>Losowanie - Code Review</title>
</head>

<body>
    <div class="container">
        <div class="card p-6 p-lg-10 space-y-4">
            <h1 class="h3 fw-700">
                Hej! :)
            </h1>
            <p>
                Miło nam poinformować, że właśnie zostałeś wylosowany/a przez <strong> {{ $mailData['fullname'] }} </strong> do przeprowadzenia Code Review.
                Prosimy, ustal swój plan dnia tak aby udało Ci się to zrealizować. W celu otrzymania szczegółów skontaktuj się z osobą losującą.
            </p>
        </div>
        <img class="ax-center my-10 w-24" src="https://media-exp2.licdn.com/dms/image/C4D0BAQFu97i9oA_zmA/company-logo_200_200/0/1519921776648?e=2147483647&v=beta&t=CEeMWCHvozAs7WqCGVO8r_RnJ6Nqx7KAs479xyBqUiw" />
        <div class="text-muted text-center my-6">
            Studio Software <br>
            Ofiar Oświęcimskich 17 <br>
            50-069 Wrocław <br>
        </div>
    </div>
</body>

</html>
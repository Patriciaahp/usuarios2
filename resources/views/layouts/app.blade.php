<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    @livewireStyles
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireScripts
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>


<!-- modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #9C27B0;
        color: white;
        text-align: center;

    }

    .white {
        background-color: #FFFFFF;
    }

    .padding {
        padding: 2rem;
    }

    .space {
        margin-left: 10px;
    }

    .top {
        margin-top: 1rem;
    }

    body {
        background: rgb(174, 238, 212);
        background: radial-gradient(circle, rgba(174, 238, 212, 1) 0%, rgba(193, 206, 217, 1) 74%, rgba(192, 203, 217, 1) 100%);
    }

    .button {
        cursor: pointer;
        border-radius: 20px;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        color: #000;
        font-weight: 200;
        font-size: medium;
        display: inline-block;
    }

    /* Teal shine */
    .tealShine {

        border: 2px solid #008080;
        color: #000000;
    }

    .tealShine:hover {
        box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
        border-color: #00d7c3;
        color: #000000;
        text-decoration: none;
    }

    .thead {
        background-color: #008080;
        color: #FFFFFF;
    }

    /* Teal*/
    .teal {
        padding-left: 5px;
        padding-right: 5px;
        width: 110px;
        height: 50px;
        display: inline-flex;
        justify-content: space-between;
        border: 2px solid #000000;
        background-color: #008080;
        color: #000000;

    }

    .teal:hover {
        background-color: #00d7c3;
        color: #FFFFFF;
        text-decoration: none;
    }

    /* Teal Outline*/
    .tealOutline {
        border: 2px solid #008080;
        background-color: #fff8f8;
        color: #000000;

    }

    .tealOutline:hover {
        background-color: #008080;
        color: #FFFFFF;
        text-decoration: none;
    }

    [x-cloak] {
        display: none;
    }
</style>
<div>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

<!-- small modal -->
<div class="modal fade text-center" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

@stack('scripts')
<script>
    $(document).on('click', '#smallButton', function (event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function () {
                $('#loader').show();
            },
            // return the result
            success: function (result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            },
            complete: function () {
                $('#loader').hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });
    $(document).ready(function () {

        $('#smallModal').on('hidden.bs.modal', function (e) {
            $(this).removeData('bs.modal');
        })

    })
</script>
<script>
    $(document).ready(function () {
        $("#button1").click(function () {
            alert("You deactivated the user!");
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#button2").click(function () {
            alert("You activated the user!");
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".relative.px-4").blur(function () {
            location.reload(true);

        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#button3").click(function () {
            location.reload(true);

        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#search").blur(function () {
            location.reload(true);

        });
    });
</script>
<script>

    function copy(that) {
        let inp = document.createElement('input');
        document.body.appendChild(inp)
        inp.value = that.title
        inp.select();
        document.execCommand('copy');
        inp.remove();
    }
</script>

<style>
    .pointer {
        cursor: pointer;
    }
</style>

</body>
</html>

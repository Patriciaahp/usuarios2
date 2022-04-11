<div class="container-fluid teal">
    <div class=" container-lg row ">
        <div class="container-sm col">
            <h1 class="text-center">Welcome</h1>
        </div>
        <div class="container-sm col white">
            <h3 class=" text-center">Login</h3>
            <div class="">
                <form method="POST" action="{{ route('log') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Sing in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .teal {
        background-color: #20c997;
    }

    .white {
        background-color: #ffffff;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

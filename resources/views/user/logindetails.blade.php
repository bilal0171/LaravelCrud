<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">My Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
    </div>

    <form action="{{ route('login') }}" method="POST" class="container mt-5">
        <!-- Email input -->
        @csrf

        <div class="form-outline mb-4 mx-auto" style="max-width: 350px;">
            <input type="email" name="email" id="form2Example1" class="form-control" required>
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4 mx-auto" style="max-width: 350px;">
            <input type="password" name="password" id="form2Example2" class="form-control" required>
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- Checkbox and button -->
        <div class="row mb-4 text-center">
            <div class="col-12">
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label ms-2" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <!-- Centered Sign in button -->
            <div class="col-12">
                <input type="submit" class="btn btn-primary mt-3" value="signin">
            </div>
        </div>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="{{ url('user_register') }}">Register</a></p>
        </div>
        <div>
            @if (session()->has('message'))
                <p>{{session()->get('message')}}</p>

            @endif
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
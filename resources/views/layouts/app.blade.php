<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome, {{ Auth::guard('admin')->user()->name }}</h1>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </header>


        <div class="dashboard-content">

            @include('admin.body.sidebar');



            @yield('dashboard')

        </div>



        <footer>
            <p>&copy;  <script>
                document.write(new Date().getFullYear())
              </script>, Project Management App</p>
        </footer>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
        
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    event.preventDefault();
                    const parentLi = this.parentElement;

                    parentLi.classList.toggle('active');

                    dropdownToggles.forEach(otherToggle => {
                        if (otherToggle !== this) {
                            otherToggle.parentElement.classList.remove('active');
                        }
                    });
                });
            });


            document.addEventListener('click', function(event) {
                dropdownToggles.forEach(toggle => {
                    const parentLi = toggle.parentElement;
                    if (!parentLi.contains(event.target)) {
                        parentLi.classList.remove('active');
                    }
                });
            });
        });
    </script>

</body>
</html>

<!-- Custom CSS -->
<link href="{{url('/assets/css/footer.css')}}" rel="stylesheet">

<!-- Bagian konten -->
<section>
    @yield('content')
</section>

<!-- Bagian footer -->
@section('footer')
<footer id="footer">
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-3 col-md-offset-1">
                <strong>Proyeku</strong><br><br>
                <a href="#">About Proyeku</a><br>
                <a href="#">Terms of Service</a><br>
                <a href="#">Privacy Policy</a><br>
                <a href="#">FAQ</a><br><br>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <strong>Browse</strong><br><br>
                <a href="#">Become a Freelancer</a><br>
                <a href="#">Find a Freelancer</a><br>
                <a href="#">Report an Account</a><br><br>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <strong>PT. Proyeku</strong><br><br>
                <span>Jalan Gedung Bundar 2013</span><br>
                <span>Depok, Jawa Barat</span><br>
                <span>08123456789</span><br>
                <span>mail@proyeku.com</span>
            </div>
        </div>
        <div class="col-md-12" style="text-align: center;">
            <hr>
            Copyright &copy; Proyeku 2016
        </div>
    </div>
</footer>
</body>
</html>
@show

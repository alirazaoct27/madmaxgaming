@extends('template')
@section('content')
<!-- Contact Section Begin -->
<br></br>
<section class="form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                        <h2>Create account</h2>
                        <p>Please sign-in to your account and start the adventure</p>
                    </div>
                <div class="contact__form">
                    <form action="{{ route('registerUser') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Fullname</label>
                                <input type="name" name="fullname" placeholder="Enter your name" required>
                            </div>
                            <div class="col-lg-12">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="col-lg-12">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter your Password" required>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn">Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br></br>
<br></br>
<br></br>
<!-- Contact Section End -->
@endsection

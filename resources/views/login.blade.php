@extends('template')
@section('content')
<br></br>
<section class="form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                        <h2>Login</h2>
                        <p>Please sign-in to your account and start the adventure</p>
                    </div>
                <div class="contact__form">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <p>{{ session()->get('error') }}</p>
                    </div>
                    @endif
                    <form action="{{ route('loginUser') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Enter your email"  required>
                            </div>
                            <div class="col-lg-12">
                                <label>Password</label>
                                <input type="password" name="password"  placeholder="Enter your password" required>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn d-grid w-100">Login</button>

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

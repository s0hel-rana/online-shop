
<div class="card">
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Online Shop <span
                    class="tx-info tx-normal">admin</span></div>
            {{-- <div class="tx-center mg-b-60">Professional Admin Template Design</div> --}}
            <form action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror placeholder="Enter your email">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror placeholder="Enter your password">
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
                <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-info">Sign Up</a>
                </div>
                </from>
    
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Login In to Your Account</h6>
                <button type="button" class="close btn-cursor" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="login-form" role="form" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" class="form-control" required name="email"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" required name="password"  placeholder="Password">
                    </div>
                    <div class="form-group" data-error="message">
                        <p class="text-danger center error-content"></p>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </form>
                <p class="text-center">
                    <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                </p>
                <p class="text-center">Don't have an account? <a href onclick="$('#sign-up-modal').modal('show');$('#login-modal').modal('hide');return false;">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>




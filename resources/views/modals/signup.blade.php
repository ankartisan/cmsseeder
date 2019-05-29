<div class="modal fade" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="SignUpLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sign Up</h4>
                <button type="button" class="close btn-cursor" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sign-up-form">
                    {{ csrf_field() }}
                    <input id="on-success" type="hidden" name="on_success" value="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col" data-error="first_name">
                                <input type="text" class="form-control" required name="first_name" placeholder="First name">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                            <div class="col" data-error="last_name">
                                <input type="text" class="form-control" required name="last_name" placeholder="Last Name">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col" data-error="email">
                                <input type="email" class="form-control" required name="email" placeholder="Your Email">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col" data-error="password">
                                <input type="password" class="form-control" required  name="password" placeholder="Choose a Password">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col" data-error="password_confirm">
                                <input type="password" class="form-control" required  name="password_confirm" placeholder="Repeat Password">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="text-center">Already have an account? <a href onclick="$('#sign-up-modal').modal('hide');$('#login-modal').modal('show');return false;">Login</a></p>
            </div>
        </div>
    </div>
</div>

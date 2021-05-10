<form class="form-horizontal" method="POST" action="{{ route('customer.login.post') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="cell_no" class="col-md-4 control-label">Cell No</label>

        <div class="col-md-6">
            <input id="cell_no" type="text" class="form-control" name="cell_no" value="{{ old('cell_no') }}" required autofocus>

            @if ($errors->has('cell_no'))
                <span class="help-block">
                    <strong>{{ $errors->first('cell_no') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>

        </div>
    </div>
</form>
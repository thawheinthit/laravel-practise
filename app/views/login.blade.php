<div class="pull-left">
    <h2>Khine Khine Kyaw</h2>
    <h3>myanmar food center</h3>
</div>
<div class="pull-right">
    <h4>Register</h4>
</div>
<div class="clear"></div>

  @include('layouts.notification')

<div class="col-lg-12" >
            <div class="col-lg-3">
            </div>
            <div class="col-lg-5">
                  {{ Form::open(array('action' => 'HomeController@postLogin', 'id' => 'frmLogin','class'=>'col-md-12 login_container')) }}
                    <div style="width: 95%; margin: 0 auto; margin-bottom: 10px" class="media">
                        <div class="pull-left label-new col-xs-3">
                            <img src="images/login_icon.png" class="media-object img-rounded" style="visibility: visible; opacity: 1;">
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading">Sign in to Account</h2>
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg simplebox" placeholder="username or email" name="inputUsername">
                    </div>
                    <div class="divider"></div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg simplebox" placeholder="password" name="inputPassword">
                    </div>
                    <div class="divider"></div>
                    <div class="form-group centered">
                        <span class="login"><a href="#" onclick="document.getElementById('frmLogin').submit()">Login</a></span>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="col-lg-3">
            </div>
            <div class="clear"></div>
        </div>
    </div>

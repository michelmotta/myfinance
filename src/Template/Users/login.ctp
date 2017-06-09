
<section class="material-half-bg">
  <div class="cover"></div>
</section>
<section class="login-content">
  <div class="logo">
    <h1>Myfinance2017</h1>
  </div>
  <div class="message">
    <?= $this->Flash->render() ?>
  </div>
  <div class="login-box">
    <?= $this->Form->create('', ['class' => 'login-form']) ?>
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <?= $this->Form->input('username', ['class' => 'form-control', 'placeholder' => 'Username']) ?>
      </div>
      <div class="form-group">
        <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
      </div>
      <div class="form-group">
        <div class="utility">
          <div class="animated-checkbox">
            <label class="semibold-text">
              <input type="checkbox"><span class="label-text">Stay Signed in</span>
            </label>
          </div>
          <p class="semibold-text mb-0"><a id="toFlip" href="#">Forgot Password ?</a></p>
        </div>
      </div>
      <div class="form-group btn-container">  
      <?= $this->Form->button(__('Login <i class="fa fa-sign-in fa-lg"></i>'), ['class' => 'btn btn-primary btn-block', 'escape' => false]); ?>
      </div>
    <?= $this->Form->end() ?>  
    <form action="index.html" class="forget-form">
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
      <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input type="text" placeholder="Email" class="form-control">
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block">RESET <i class="fa fa-unlock fa-lg"></i></button>
      </div>
      <div class="form-group mt-20">
        <p class="semibold-text mb-0"><a id="noFlip" href="#"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
      </div>
    </form>
  </div>
</section>
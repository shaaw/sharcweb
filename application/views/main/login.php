<div class="row">
  <div class="col-md-4 col-md-offset-4">

    <?php
    if(!empty($loginError))
    {
      echo '<div class="alert alert-danger" role="alert">'.$loginError.'</div>';
    }

     echo form_open(base_url().'main/login'); ?>
      <div class="form-group">
        <label for="login">Login</label>
        <input type="login" class="form-control" name="login" placeholder="Login" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password"  required>
      </div>
      <button type="submit" class="btn btn-info">Submit</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
  <?php echo validation_errors(); ?>
  <?php echo form_open(base_url().'main/singin'); ?>
    <div class="form-group">
      <label for="login">Login</label>
      <input type="text" class="form-control" name="login" placeholder="Login" required>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="pass1">Password</label>
      <input type="password" class="form-control" name="pass1" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="pass2">Repeat Password</label>
      <input type="password" class="form-control" name="pass2" placeholder="Repeat Password" required>
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>
</div>
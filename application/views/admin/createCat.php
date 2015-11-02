<h2 class="prueba"><?php echo $title; ?></h2>


<ul class="nav nav-pills">
  <li role="presentation" ><a href="<?php echo base_url() ?>admin/">News</a></li>
  <li role="presentation" ><a href="<?php echo base_url() ?>admin/categories">Categories</a></li>
  <li role="presentation"><a href="#">Users</a></li>
  <li role="presentation"><a href="#">Galery</a></li>
</ul>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <?php echo validation_errors(); ?>
  <?php echo form_open(base_url().'admin/createCat'); ?>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
      <label for="text">Color Code</label>
      <input class="color" name="color" required >
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>
</div>
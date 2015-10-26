<h2 class="prueba"><?php echo $title; ?></h2>


<ul class="nav nav-pills">
  <li role="presentation" ><a href="<?php echo base_url() ?>admin/">News</a></li>
  <li role="presentation"><a href="#">Users</a></li>
  <li role="presentation"><a href="#">Galery</a></li>
</ul>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <?php echo validation_errors(); ?>
  <?php echo form_open(base_url().'admin/create'); ?>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" required>
    </div>
    <div class="form-group">
      <label for="text">Text</label>
      <textarea type="text" class="form-control" name="text" placeholder="Text" required> </textarea>
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>
</div>
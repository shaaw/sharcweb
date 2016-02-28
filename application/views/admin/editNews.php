<h2 class="prueba"><?php echo $title; ?></h2>


<ul class="nav nav-pills">
  <li role="presentation" ><a href="<?php echo base_url() ?>admin/">News</a></li>
  <li role="presentation" ><a href="<?php echo base_url() ?>admin/categories">Categories</a></li>
  <li role="presentation"><a href="#">Users</a></li>
  <li role="presentation"><a href="#">Galery</a></li>
</ul>
<script>
$(function() {
  $("#editor").wysibb();
})
</script>
<div class="row">
  <div class="col-md-12">
    <?php echo validation_errors(); ?>
    <?php

     $attributes = array('name' => 'myform');
     $hiden = array('id' => $news['id']);
     echo form_open(base_url().'admin/editNews/id/'.$news['id'],$attributes,$hiden); ?>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $news['titulo'] ?>" required>
    </div>
    <div class="form-group">
      <label for="Image">Image</label>
      <input type="text" class="form-control" name="imagen" placeholder="Image" value="<?php echo $news['imagen'] ?>" >
    </div>
    <div class="form-group">
      <label for="text">Text</label>
      <textarea id="editor" type="text" class="form-control" name="text" placeholder="Text" novalidate ><?php echo $news['texto'] ?></textarea>
    </div>
      <select class="form-control" name="cat">

      <?php 

      foreach ($cats as $cat) {

        echo "<option value='".$cat['id']."' style='background-color:#".$cat['color']."'>".$cat['nombre']." </option>";
      }


      ?>

      </select>


    <button type="submit" class="btn btn-info margin">Submit</button>
  </form>
</div>
</div>
<?php $this->load->view("adminpanel/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>Add Blog</h2>
      
      <form enctype="multipart/form-data" action="<?= base_url().'admin/blog/addblog_post' ?>" method="post">
        
        <div class="form-group">
          <input type="text" class="form-control" name="blog_title" placeholder="Başlık">
        </div>

        <div class="form-group">
          <textarea class="form-control" name="desc" placeholder="Bog Açıklama"></textarea>
        </div>

        <div class="form-group">
          <input type="file" class="form-control" name="file" placeholder="Başlık">
        </div>
        
        <button type="submit" class="btn btn-primary">Yükle</button>


      </form>

    </main>
  </div>
</div>

<?php $this->load->view('adminpanel/footer.php'); ?>


<script type="text/javascript">
  <?php 
      if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted']=="yes") {
          # code...
          echo "alert('Veriler başarıyla eklendi!');";
        }
        else{
          echo "alert('Eklenemedi!');";
        }
      }
   ?>
</script>
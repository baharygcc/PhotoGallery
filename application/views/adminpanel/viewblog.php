<?php $this->load->view("adminpanel/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>View Blog</h2>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Başlık</th>
              <th>Açıklama</th>
              <th>Resim</th>
              <th>Düzenle</th>
              <th>Sil</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if ($result) {
              $counter=1;
              foreach ($result as $key => $value) {
                echo "<tr>
                    <td>".$counter."</td>
                    <td>".$value['blog_title']."</td>
                    <td>".$value['blog_desc']."</td>
                    <td><img src='".base_url().$value['blog_img']."' class='img-fluid' width='100'></td>
                    
                    <td><a class=\"btn btn-info\" href='".base_url().'admin/blog/editblog/'.$value['blogid']."'>Düzenle</a></td>
                    
                    <td><a class=\"btn delete btn-danger\" href='#.' data-id='".$value['blogid']."'>Sil</a></td>
                  </tr>";

                  $counter++;
              }

              
            }
            else{
              echo "<tr><td colspan='6'>No Records found</td><tr>";
            }
              

             ?>

            
            
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<?php $this->load->view('adminpanel/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(".delete").click(function(){

    var delete_id = $(this).attr('data-id');

    var bool = confirm('Kalıcı olarak ilmek istediğine emin misin?');
    console.log(bool);

    if (bool) {
      //alert("Move to delete functionality using AJAX");

      $.ajax({
        url:'<?= base_url().'admin/blog/deleteblog/'?>',
        type:'post',
        data:{'delete_id': delete_id},
        success: function(response){
          console.log(response);
          if (response == "deleted") {
            location.reload();
          }else if (response == "notdeleted"){
            alert("Bİr şeyler yanlış!");
          }
        }
      });
    }else{
      alert("Blogun güvende");

    }
  });


  <?php 

      if (isset($_SESSION['updated'])) {
        if ($_SESSION['updated'] == "yes") {
          echo 'alert("Data has been updated!");';
        }else if($_SESSION['updated'] == "no"){
          echo 'alert("Bazı hatalar oluştu ve veriler güncellenmedi!");';

        }
      }

   ?>

</script>

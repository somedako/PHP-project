<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$inf = info($conn);
close($conn);

require_once 'templates/header_admin.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Admin-panel</h2>
            <div class="mt-2 mb-2 text-right"><a href="admin_create.php"><button class="btn btn-success">Add new</button></a></div>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            <?php foreach ($inf as $data) {?>
                <tr>
                    <td><?php echo $data['id']?></td>
                    <td><?php echo $data['title']?></td>
                    <td><?php echo mb_substr($data['Descr'], 0, 180, 'utf8')?></td>
                    <td><?php echo $data['categorie_id']?></td>
                    <td><img src="img/<?php echo $data['img']?>" class="w-75"></td>
                    <td><a href="admin_update.php?id=<?php echo $data['id']?>">update</a></td>
                    <td><p class='check-delete' data="<?php echo $data['id']?>">del</p></td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</div>

<script>
    window.onload= function(){
       let checkDelete = document.querySelectorAll('.check-delete');
       checkDelete.forEach(function(element){
           element.onclick = checkDeleteFunction;
       })
        function checkDeleteFunction(event){
            event.preventDefault();
            let a = confirm('Do you want delete?');
            if (a == true) {
                location.href = "admin_delete.php?id="+this.getAttribute('data');
            }
            return false;
        }
    }
</script>

<?php require_once 'templates/footer.php'?>

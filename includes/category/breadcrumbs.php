        <section class="content-header">
          <h1>
            Category
           </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <?php
            if($_GET['file']=='add')
            {
	                 ?>
            <li> <a href="index.php?folder=category&file=view"> Category</a></li>
            
                   <li class="active">Category Add</li>
            <?php
            }
           elseif(isset($_GET['id']) && $_GET['file']=='edit')
            {
            ?>
            <li class="active"><a href="index.php?folder=category&file=view">Category</a></li>
             <li class="active">Edit</li>
            <?php
            
            }
            elseif($_GET['file']!='add')
            {
            ?>
            <li class="active">Category</li>
            <?php
            
            }
            ?>
          </ol>
        </section>
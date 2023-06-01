<?php
include ("auth.php");

$query = "SELECT * FROM menu_category";
$menu_cattbl=mysqli_query($db, $query);
$query = "SELECT DISTINCT menu_cat_name FROM menu_category";
$menu_cat=mysqli_query($db, $query);
$query = "SELECT * FROM menu";
$menu_table=mysqli_query($db, $query);
$query = "SELECT * FROM gallery";
$image_table=mysqli_query($db, $query);
$query = "SELECT * FROM events";
$event_table=mysqli_query($db, $query);
$query = "SELECT * FROM slide";
$slide_table=mysqli_query($db, $query);
$query = "SELECT * FROM franchise ORDER BY reg_date DESC";
$franchise_table=mysqli_query($db, $query);
$query = "SELECT * FROM feedback ORDER BY reg_date DESC";
$feedback_table=mysqli_query($db, $query);
$query = "SELECT * FROM careerappln ORDER BY reg_date DESC";
$careerin_table=mysqli_query($db, $query);
$query = "SELECT * FROM career ORDER BY reg_date DESC";
$career_table=mysqli_query($db, $query);
$query = "SELECT * FROM user ORDER BY reg_date DESC";
$user_table=mysqli_query($db, $query);
$query = "SELECT * FROM book_table ORDER BY reg_date DESC";
$book_table=mysqli_query($db, $query);
$query = "SELECT * FROM book_event ORDER BY reg_date DESC";
$book_event=mysqli_query($db, $query);


if(isset($_POST['addmenu'])) {
   $menuname = mysqli_real_escape_string($db, $_POST['name']);
    $detail = mysqli_real_escape_string($db, $_POST['detail']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
  
    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $folder = "../assets/img/menu/".$name;
    move_uploaded_file($image, $folder);  

    $query = "INSERT INTO menu(menu_name, menu_detail, price, menu_image, menu_type, category, menu_status) VALUES('$menuname','$detail','$price','$name','$type','$category','$status')";
    mysqli_query($db, $query);    
    header('location: menu.php');
  }
  
  if(isset($_POST['addcategory'])) {
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $folder = "../assets/img/menu/category/".$name;
    move_uploaded_file($image, $folder);  
    
    $query = "INSERT INTO menu_category(menu_cat_name, menu_type_name, menu_cat_image) VALUES('$category','$type', '$name')";
    mysqli_query($db, $query);    
    header('location: menu.php');
  }
  
  
  if(isset($_GET['deletecategory'])) {

    $id = mysqli_real_escape_string($db, $_GET['deletecategory']);    
    $query = "SELECT * FROM menu_category WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['menu_cat_image'];
    unlink('../assets/img/menu/category/'.$img);    
    $query = "DELETE FROM menu_category WHERE id= '$id'"; 
    mysqli_query($db, $query);    
    header('location: menu.php');
  }

  if(isset($_POST['updatemenucat'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatemenucat']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    if($name==null || !$name ) {   
      $query = "UPDATE menu_category SET menu_cat_name = '$category', menu_type_name='$type' WHERE id = $id ";
    }elseif($name) {
      $query = "SELECT * FROM menu_category WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['menu_cat_image'];
    unlink('../assets/img/menu/category/'.$img);
    $folder = "../assets/img/menu/category/".$name;
    move_uploaded_file($image, $folder);  
    $query = "UPDATE menu_category SET menu_cat_name = '$category', menu_type_name='$type', menu_cat_image = '$name' WHERE id = $id ";
    }
    mysqli_query($db, $query);    
    header('location: menu.php');
  }

  if(isset($_GET['editmenucat'])) {
    $id = $_GET['editmenucat'];
    //$category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM menu_category WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Menu Category</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Category Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="post">
                  
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="focusedInput" type="text" name="category" value="<?php echo ucfirst($row["menu_cat_name"]);?>" placeholder="Enter Category..." onkeypress="return /[a-z _]/i.test(event.key);">
                    </div>
                    <label class="col-sm-2 control-label">Menu Type</label>
                    <div class="col-sm-3">
                    <select class="form-control m-bot15" name="type">
                                              <option disabled selected>Select type</option>
                                              <option>Veg</option>
                                              <option>Non-Veg</option>
                                              <option>Special Menu</option>
                                          </select>
                    </div>                    
                  </div>                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Select Image</label>
                    <div class="col-sm-12">
                    <input class="col-sm-6" type="file" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" id="exampleInputFile">
                   </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Image</label>
                    <div class="col-sm-6">
                    <img height="150px" width="150px" id="preview" src="../assets/img/menu/category/<?php echo $row["menu_cat_image"];?>">
                    </div>
                  </div>
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updatemenucat" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>
  <?php  
    }  
  } 

  
  if(isset($_GET['deletemenu'])) {
    $id = mysqli_real_escape_string($db, $_GET['deletemenu']);
    $query = "SELECT * FROM menu WHERE id= '$id'";  
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);  
    $img = $row['menu_image'];
    unlink('../assets/img/menu/'.$img);    
    $query = "DELETE FROM menu WHERE id= '$id'";
    mysqli_query($db, $query);    
    header('location: menu.php');
  }

  if(isset($_POST['updatemenu'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatemenu']);
    $menuname = mysqli_real_escape_string($db, $_POST['menuname']);
    $detail = mysqli_real_escape_string($db, $_POST['menudetail']);
    $price = mysqli_real_escape_string($db, $_POST['menuprice']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $status = mysqli_real_escape_string($db, $_POST['status']);



    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    if($name==null || !$name ) {   
      $query = "UPDATE menu SET menu_name = '$menuname', menu_detail = '$detail', price = '$price', menu_type = '$type', category = '$category', menu_status = '$status'  WHERE id = $id ";
    }elseif($name) {
      $query = "SELECT * FROM menu WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['menu_image'];
    unlink('../assets/img/menu/'.$img);
    $folder = "../assets/img/menu/".$name;
    move_uploaded_file($image, $folder);  
    $query = "UPDATE menu SET menu_name = '$menuname', menu_detail = '$detail', price = '$price', menu_image = '$name', menu_type = '$type', category = '$category', menu_status = '$status'  WHERE id = $id ";
    }
    mysqli_query($db, $query);    
    header('location: menu.php');
  }

if(isset($_GET['editmenu'])) {
    $id = $_GET['editmenu'];
    //$category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM menu WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Menu</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Menu Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Menu Name</label>
                      <div class="col-sm-9">
                        <input class="form-control" id="focusedInput" type="text" name="menuname" value="<?php echo ucfirst($row["menu_name"]);?>" placeholder="Enter Menu Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Menu Detail</label>
                      <div class="col-sm-9">
                        <input class="form-control" id="focusedInput" type="text" name="menudetail" value="<?php echo ucfirst($row["menu_detail"]);?>" placeholder="Enter Menu Detail...">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Price</label>
                      <div class="col-sm-3">
                        <input class="form-control menuprice" id="focusedInput" type="text" name="menuprice" value="<?php echo ($row["price"]);?>" pattern=".{1,3}" max="999"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  title="price not more than 999" required>
                      </div>
                      <label class="col-sm-2 control-label">Category</label>
                      <div class="col-sm-4">
                      <select class="form-control m-bot15" name="category">
                                                <option disabled selected>Select Category</option>
                                                <?php foreach ($menu_cat as $type){ ?>
                                                <option value="<?php echo $type["menu_cat_name"];?>"><?php echo ucfirst($type["menu_cat_name"]);?></option>
                                                <?php } ?>                                              
                                            </select>
                      </div>
                      
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Menu Type</label>
                    <div class="col-sm-3">
                    <select class="form-control m-bot15" name="type">
                                              <option disabled selected>Select type</option>
                                              <option>Veg</option>
                                              <option>Non-Veg</option>
                                              <option>Special Menu</option>
                                          </select>
                    </div>
                    <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-4">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Status</option>
                                                <option>Enable</option>
                                                <option>Disable</option>
                                            </select>
                      </div>                    
                    </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Select Image</label>
                    <div class="col-sm-12">
                    <input class="col-sm-6" type="file" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" id="exampleInputFile">
                   </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Image</label>
                    <div class="col-sm-6">
                    <img height="150px" width="150px" id="preview" src="../assets/img/menu/<?php echo $row["menu_image"];?>">
                    </div>
                  </div>
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updatemenu" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>
  <?php  
    }  
  } 

  if(isset($_POST['addimage'])) {
    $imgname = mysqli_real_escape_string($db, $_POST['image_name']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $folder = "../assets/img/gallery/".$name;
    move_uploaded_file($image, $folder);  
      $query = "INSERT INTO gallery(menuname,img_name,img_status) VALUES('$imgname','$name','$status')";
      mysqli_query($db, $query);    
       
    header('location: gallery.php');
  }

  if(isset($_GET['deleteimage'])) {
    $id = mysqli_real_escape_string($db, $_GET['deleteimage']);
    $query = "SELECT * FROM gallery WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['img_name'];
    unlink('../assets/img/gallery/'.$img);    
    $query = "DELETE FROM gallery WHERE id= '$id'";
    mysqli_query($db, $query);      
    header('location: gallery.php');
  }

  if(isset($_POST['updateimage'])) {
    $id = mysqli_real_escape_string($db, $_POST['updateimage']);
    $imgname = mysqli_real_escape_string($db, $_POST['image_name']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    if($name==null || !$name ) {   
    $query = "UPDATE gallery SET menuname = '$imgname', img_status = '$status'  WHERE id = $id ";
    }elseif(!empty($name)) {
      $query = "SELECT * FROM gallery WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['img_name'];
    unlink('../assets/img/gallery/'.$img);
    $folder = "../assets/img/gallery/".$name;
    move_uploaded_file($image, $folder);  
      $query = "UPDATE gallery SET menuname = '$imgname', img_name = '$name', img_status = '$status'  WHERE id = $id ";
    }

    mysqli_query($db, $query);    
    header('location: gallery.php');
  }

  if(isset($_GET['editimage'])) {
    $id = $_GET['editimage'];
    $query = "SELECT * FROM gallery WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Gallery</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Image Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input class="form-control" id="focusedInput" type="text" name="imagename" value="<?php echo ucfirst($row["menuname"]);?>" placeholder="Enter Image Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Select Image</label>
                    <div class="col-sm-9">
                    
                    <input class="col-sm-9" type="file" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" id="exampleInputFile">
                    </div>
                  </div>
                  <div class="form-group">                    
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                    <select class="form-control m-bot15" name="status">
                                              <option disabled selected>Select Status</option>
                                              <option>Enable</option>
                                              <option>Disable</option>
                                          </select>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <label class="col-sm-3 control-label">image</label>
                    <div class="col-sm-9">
                    <img height="150px" width="150px" id="preview" src="../assets/img/gallery/<?php echo $row["img_name"];?>">
                    </div>
                  </div>
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updateimage" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>
  <?php  
    }  
  } 

  if(isset($_POST['addevent'])) {
    $eventname = mysqli_real_escape_string($db, $_POST['name']);
     $detail = mysqli_real_escape_string($db, $_POST['detail']);
     $price = mysqli_real_escape_string($db, $_POST['price']);
     $eventdate = mysqli_real_escape_string($db, $_POST['eventdate']);
     $eventstatus = mysqli_real_escape_string($db, $_POST['eventstatus']);
     $status = mysqli_real_escape_string($db, $_POST['status']);
   
     $image = $_FILES['image']['tmp_name'];
     $name = $_FILES['image']['name'];
     $folder = "../assets/img/events/".$name;
     move_uploaded_file($image, $folder); 

     if($price==null || !$price ) {   
     $query = "INSERT INTO events(event_name, event_detail, price, event_image, event_date, event_status, display_status) VALUES('$eventname','$detail','Free','$name','$eventdate','$eventstatus','$status')";
     }elseif(!empty($price)) {   
      $query = "INSERT INTO events(event_name, event_detail, price, event_image, event_date, event_status, display_status) VALUES('$eventname','$detail','$price','$name','$eventdate','$eventstatus','$status')";
     }
     mysqli_query($db, $query);    
     header('location: Events.php');
   }

   if(isset($_GET['deleteevent'])) {
    $id = mysqli_real_escape_string($db, $_GET['deleteevent']);
    $query = "SELECT * FROM events WHERE id= '$id'";    
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['event_image'];
    unlink('../assets/img/events/'.$img);    
    $query = "DELETE FROM events WHERE id= '$id'";
    mysqli_query($db, $query);    
    header('location: Events.php');
  }

  if(isset($_POST['updateevent'])) {
    $id = mysqli_real_escape_string($db, $_POST['updateevent']);
    $eventname = mysqli_real_escape_string($db, $_POST['eventname']);
    
    $price = mysqli_real_escape_string($db, $_POST['eventprice']);
    $eventdate = mysqli_real_escape_string($db, $_POST['eventdate']);
     $eventstatus = mysqli_real_escape_string($db, $_POST['eventstatus']);
    $status = mysqli_real_escape_string($db, $_POST['status']);

    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    if($name==null || !$name ) {  
      if($price==null || !$price ) {   
        $query = "UPDATE events SET event_name = '$eventname', price = 'Free', event_date='$eventdate', event_status='$eventstatus', display_status = '$status'  WHERE id = $id ";
      }elseif(!empty($price)){
        $query = "UPDATE events SET event_name = '$eventname', price = '$price',  event_date='$eventdate', event_status='$eventstatus', display_status = '$status'  WHERE id = $id ";
      }  
    }elseif(!empty($name)) {
      $query = "SELECT * FROM events WHERE id= '$id'";
      $result=mysqli_query($db, $query);    
      $row = mysqli_fetch_assoc($result);
      $img = $row['event_image'];
      unlink('../assets/img/events/'.$img);
      $folder = "../assets/img/events/".$name;
      move_uploaded_file($image, $folder);  
      if($price==null || !$price ) {   
        $query = "UPDATE events SET event_name = '$eventname', price = 'Free', event_image = '$name', event_date='$eventdate', event_status='$eventstatus', display_status = '$status'  WHERE id = $id ";
      }elseif(!empty($price)){
        $query = "UPDATE events SET event_name = '$eventname', price = '$price', event_image = '$name', event_date='$eventdate', event_status='$eventstatus', display_status = '$status'  WHERE id = $id ";
      }
    }
    mysqli_query($db, $query);    
    header('location: Events.php');
  }

  if(isset($_GET['editevent'])) {
    $id = $_GET['editevent'];
    //$category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM events WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog" style="width:800;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Event</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Event Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Event Name</label>
                      <div class="col-sm-9">
                        <input class="form-control" id="focusedInput" type="text" name="eventname" value="<?php echo ucfirst($row["event_name"]);?>" placeholder="Enter Event Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Event Detail</label>
                      <div class="col-sm-9">                      
                      <textarea class="form-control ckeditor" name="detail" rows="5" placeholder="Enter Event Detail" disabled><?php echo ucfirst($row["event_detail"]);?></textarea>
                      
                      </div>
                    </div>
                    <div class="form-group">                  
                    <label class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-5">
                    <div class="radios">                        
                          <span><input name="sample-radio" id="radio-01" value="free" type="radio" /> Free </span>
                          <span><input name="sample-radio" id="radio-02" value="paid" type="radio" /> Paid </span>
                    </div>
                  </div>
                    <div class="col-sm-3">
                      <input class="form-control price" id="price" type="number" value="<?php echo ucfirst($row["price"]);?>" name="eventprice" placeholder="Price" pattern=".{1,4}" max="3000"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  title="price not more than 3000">
                    </div>                  
                    </div>                                 
                    <div class="form-group">                  
                    <label class="col-sm-2 control-label">Event Status</label>
                    <div class="col-sm-4">
                    <select class="form-control m-bot15" name="eventstatus">
                                              <option disabled selected>Select Status</option>
                                              <option>Upcoming</option>
                                              <option>Completed</option>
                                          </select>
                    </div>                             
                    <label class="col-sm-1 control-label">Date</label>
                    <div class="col-sm-4">
                    <input id="dp1" type="date" name="eventdate" size="16" class="form-control">
                    </div>                                                                 
                    </div>                                 
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Status</option>
                                                <option>Enable</option>
                                                <option>Disable</option>
                                            </select>
                      </div>       
                      
                    </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Select Image</label>
                    <div class="col-sm-12">
                    <input class="col-sm-6" type="file" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" id="exampleInputFile">
                   </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Image</label>
                    <div class="col-sm-6">
                    <img height="150px" width="150px" id="preview" src="../assets/img/events/<?php echo $row["event_image"];?>">
                    </div>
                  </div>
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updateevent" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>     
                  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <?php  
    }  
  } 

  if(isset($_POST['addslide'])) {
    $slidename = mysqli_real_escape_string($db, $_POST['name']);
     $detail = mysqli_real_escape_string($db, $_POST['detail']);    
     $slideoffer = mysqli_real_escape_string($db, $_POST['offer']);
     $status = mysqli_real_escape_string($db, $_POST['status']);
   
     $image = $_FILES['image']['tmp_name'];
     $name = $_FILES['image']['name'];
     $folder = "../assets/img/slide/".$name;
     move_uploaded_file($image, $folder); 

      $query = "INSERT INTO slide(slide_name, slide_detail, slide_image, slide_offer, display_status) VALUES('$slidename','$detail','$name','$slideoffer','$status')";
     
     mysqli_query($db, $query);    
     header('location: slide.php');
   }

   if(isset($_GET['deleteslide'])) {
    $id = mysqli_real_escape_string($db, $_GET['deleteslide']);
    $query = "SELECT * FROM slide WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);    
    $img = $row['slide_image'];
    unlink('../assets/img/slide/'.$img);    
    $query = "DELETE FROM slide WHERE id= '$id'";
    mysqli_query($db, $query);    
    header('location: slide.php');
  }

   if(isset($_POST['updateslide'])) {
    $id = mysqli_real_escape_string($db, $_POST['updateslide']);
    $slidename = mysqli_real_escape_string($db, $_POST['slidename']);
    $slidedetail = mysqli_real_escape_string($db, $_POST['slidedetail']);
    $sliseoffer = mysqli_real_escape_string($db, $_POST['offer']);    
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    if($name==null || !$name ) {   
    $query = "UPDATE slide SET slide_name = '$slidename', slide_detail = '$slidedetail', slide_offer = '$sliseoffer', display_status = '$status'  WHERE id = $id ";
    }elseif(!empty($name)) {
      $query = "SELECT * FROM slide WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['img_name'];
    unlink('../assets/img/slide/'.$img);
    $folder = "../assets/img/slide/".$name;
    move_uploaded_file($image, $folder);  
    $query = "UPDATE slide SET slide_name = '$slidename', slide_detail = '$slidedetail', slide_image = '$name', slide_offer = '$sliseoffer', display_status = '$status'  WHERE id = $id ";
      
    }

    mysqli_query($db, $query);    
    header('location: slide.php');
  }
  if(isset($_GET['editslide'])) {
    $id = $_GET['editslide'];    
    $query = "SELECT * FROM slide WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update slide</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  slide Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Slide Name</label>
                      <div class="col-sm-9">
                        <input class="form-control" id="focusedInput" type="text" name="slidename" value="<?php echo ucfirst($row["slide_name"]);?>" placeholder="Enter Menu Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Slide Detail</label>
                      <div class="col-sm-9">
                        <input class="form-control" id="focusedInput" type="text" name="slidedetail" value="<?php echo ucfirst($row["slide_detail"]);?>" placeholder="Enter Menu Detail...">
                      </div>
                    </div>
                    <div class="form-group">                  
                  <label class="col-sm-2 control-label">Offer</label>
                    <div class="col-sm-3">
                    <select class="form-control m-bot15" name="offer">
                                              <option disabled selected>Select Option</option>
                                              <option>Yes</option>
                                              <option>No</option>
                                          </select>
                    </div>                                     
                    
                    <div class="form-group">                    
                    <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-4">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Status</option>
                                                <option>Enable</option>
                                                <option>Disable</option>
                                            </select>
                      </div>                    
                    </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Select Image</label>
                    <div class="col-sm-12">
                    <input class="col-sm-6" type="file" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" id="exampleInputFile">
                   </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="margin-top: -7px;">Image</label>
                    <div class="col-sm-6">
                    <img height="150px" width="150px" id="preview" src="../assets/img/slide/<?php echo $row["slide_image"];?>">
                    </div>
                  </div>
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updateslide" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>
  <?php  
    }  
  } 

  //***************************************************************** */
   
   if(isset($_GET['deletefeedback'])) {
 
     $id = mysqli_real_escape_string($db, $_GET['deletefeedback']);    
     $query = "DELETE FROM feedback WHERE id= '$id'";     
     mysqli_query($db, $query);    
     header('location: mail.php');
   }

   if(isset($_GET['deletefranchise'])) {
 
    $id = mysqli_real_escape_string($db, $_GET['deletefranchise']);    
    $query = "DELETE FROM franchise WHERE id= '$id'";     
    mysqli_query($db, $query);    
    header('location: mail.php');
  }
 
   if(isset($_POST['updatefeedback'])) {
    $id = $_POST['updatefeedback'];
     $status = mysqli_real_escape_string($db, $_POST['status']); 
     $query = "UPDATE feedback SET display_status = '$status' WHERE id = $id ";
     mysqli_query($db, $query);    
     header('location: mail.php');
   }
 
 if(isset($_GET['editfeedback'])) {
     $id = $_GET['editfeedback'];
     //$category = mysqli_real_escape_string($db, $_GET['category']);
     $query = "SELECT * FROM feedback WHERE id = $id ";
     $run = mysqli_query($db, $query);
     while($row = $run->fetch_array()){
   ?>
   <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title">Update Feedback</h4>
                         </div>
                         <div class="modal-body">
   
                         <section class="panel">
                 <header class="panel-heading">
                   Feedback Detail
                 </header>
                 <div class="panel-body">
                   <form class="form-horizontal" method="post">
                   <div class="form-group">
                       <label class="col-sm-3 control-label">Name</label>
                       <div class="col-sm-9">
                         <input class="form-control" id="focusedInput" type="text" name="name" value="<?php echo ucfirst($row["test_name"]);?>" disabled>
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-3 control-label">Subject</label>
                       <div class="col-sm-9">
                         <input class="form-control" id="focusedInput" type="text" name="subject" value="<?php echo ucfirst($row["test_subject"]);?>" disabled>
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-3 control-label">Message</label>
                       <div class="col-sm-9">
                         <textarea class="form-control" id="focusedInput" rows="5" type="text" name="message" disabled><?php echo ucfirst($row["test_message"]);?></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-3 control-label">Email</label>
                       <div class="col-sm-9">
                         <input class="form-control" id="focusedInput" type="text" name="email" value="<?php echo $row["test_email"];?>" disabled>
                       </div>
                     </div>
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Status</label>
                       <div class="col-sm-4">
                       <select class="form-control m-bot15" name="status">
                                                 <option disabled selected>Select Status</option>
                                                 <option>Enable</option>
                                                 <option>Disable</option>
                                             </select>
                       </div>                    
                     </div>                 
                     <div class="modal-footer">
                           <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                           <button class="btn btn-success" type="submit" name="updatefeedback" value="<?php echo $id ?>">Save changes</button>
                           
                         </div>
                   </form>
   <?php  
     }  
   }
   
   if(isset($_GET['deletecareerbox'])) {

    $id = mysqli_real_escape_string($db, $_GET['deletecareerbox']);    
    $query = "SELECT * FROM careerappln WHERE id= '$id'";
    $result=mysqli_query($db, $query);    
    $row = mysqli_fetch_assoc($result);
    $img = $row['document'];
    unlink('../resume/'.$img);    

    $query = "DELETE FROM careerappln WHERE id= '$id'"; 
    mysqli_query($db, $query);    
    header('location: career.php');
  }

  if(isset($_GET['deletecareerlist'])) {

    $id = mysqli_real_escape_string($db, $_GET['deletecareerlist']);    
    $query = "DELETE FROM career WHERE id= '$id'"; 
    mysqli_query($db, $query);    
    header('location: career.php');
  }
   
  if(isset($_POST['addjob'])) {
    $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
     $jobdetail = mysqli_real_escape_string($db, $_POST['detail']);
     $city = mysqli_real_escape_string($db, $_POST['city']);
     $experience = mysqli_real_escape_string($db, $_POST['experience']);
     $sallery = mysqli_real_escape_string($db, $_POST['Sallery']);
     $education = mysqli_real_escape_string($db, $_POST['education']);
     $status = mysqli_real_escape_string($db, $_POST['status']);    
 
     $query = "INSERT INTO career(job_name, city, experience, sallery, education, jobdetail, display_status) VALUES('$jobtitle','$city','$experience','$sallery','$education','$jobdetail','$status')";
     mysqli_query($db, $query);    
     header('location: career.php');
   }

   if(isset($_POST['updatejob'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatejob']);

    $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $experience = mysqli_real_escape_string($db, $_POST['experience']);
    $sallery = mysqli_real_escape_string($db, $_POST['sallery']);
    $education = mysqli_real_escape_string($db, $_POST['education']);
    $status = mysqli_real_escape_string($db, $_POST['status']);

    $query = "UPDATE career SET job_name = '$jobtitle', city = '$city', experience = '$experience', sallery = '$sallery', education = '$education', display_status = '$status'  WHERE id = $id ";
   
    mysqli_query($db, $query);    
    header('location: career.php');
  }

  if(isset($_GET['editjob'])) {
    $id = $_GET['editjob'];
    //$category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM career WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog" style="width:800;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Job</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Job Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Job Title</label>
                      <div class="col-sm-9">
                        <input class="form-control" id="focusedInput" type="text" name="jobtitle" value="<?php echo ucfirst($row["job_name"]);?>" placeholder="Enter Event Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Job Detail</label>
                      <div class="col-sm-9">                      
                      <textarea class="form-control ckeditor" name="detail" rows="5" placeholder="Enter Event Detail" disabled><?php echo ucfirst($row["jobdetail"]);?></textarea>
                      
                      </div>
                    </div>                
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">City</label>
                      <div class="col-sm-4">
                        <input class="form-control" id="focusedInput" type="text" name="city" value="<?php echo ucfirst($row["job_name"]);?>" placeholder="Enter Event Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                      </div>
                      <label class="col-sm-2 control-label">Experience</label>
                      <div class="col-sm-2">
                        <input class="form-control" id="focusedInput" type="number" name="experience" value="<?php echo ucfirst($row["job_name"]);?>" placeholder="Enter Event Name..." pattern=".{1,2}" max="50" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                      </div>
                    </div>                                 
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">Sallery</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="text" name="sallery" value="<?php echo ucfirst($row["job_name"]);?>" placeholder="Enter Event Name..." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                      </div>
                      <label class="col-sm-2 control-label">Eucation</label>
                      <div class="col-sm-4">
                        <input class="form-control" id="focusedInput" type="text" name="education" value="<?php echo ucfirst($row["job_name"]);?>" placeholder="Enter Event Name..." onkeypress="return /[a-z _]/i.test(event.key);">
                      </div>
                    </div>                                                     
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Status</option>
                                                <option>Enable</option>
                                                <option>Disable</option>
                                            </select>
                      </div>       
                      
                    </div>
                  
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updatejob" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>     
                  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <?php  
    }  
  } 

  if(isset($_POST['adduser'])) {
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
     $email = mysqli_real_escape_string($db, $_POST['email']);          

     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%&";
     $gen_password = substr( str_shuffle( $chars ), 0, 10 );
     $password = base64_encode($gen_password);
 
     if($email || $email != NULL){
     $query = "INSERT INTO user(f_name, m_name, l_name, username, email, pass, user_type, acc_status) VALUES('$fname','$mname','$lname','$email','$email','$password','Admin', 'Temporary')";
     mysqli_query($db, $query);   
     $header="From: EternalGiG Technology <eternalg@eternalgig.com>";
     
     $subject = 'Engineers chai Partner';
     $message = '<html>
       <head>         
       </head>
       <body>
       <h2>You are now partner of Engineers chai.</h2>
       <h2>Sign in now with below credential.</h2>
         <p>Username:- '.$email.'</p>
         <p>Password:- '.$gen_password.'</p>         
       </body>
       </html>
       ';
       $header = "MIME-Version: 1.0" . "\r\n";
       $header = "Content-type:text/html;charset=UTF-8" . "\r\n";
     mail($email, $subject, $message, $header);
     header('location: users.php');
  }elseif (!$email || $email == NULL){ 
     //header('location: users.php');
     echo "<script>alert('Email must required.');</script>";
      
  }
    }

   if(isset($_GET['deleteuser'])) {
    $id = mysqli_real_escape_string($db, $_GET['deleteuser']);    
    $query = "DELETE FROM user WHERE id= '$id'"; 
    mysqli_query($db, $query);    
    header('location: users.php');
  }

  if(isset($_POST['updateuser'])) {
    $id = mysqli_real_escape_string($db, $_POST['updateuser']);

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);          
    $status = mysqli_real_escape_string($db, $_POST['status']);          

    $query = "UPDATE user SET f_name = '$fname', m_name = '$mname', l_name = '$lname', email = '$email', acc_status='$status'  WHERE id = $id ";
   
    mysqli_query($db, $query);    
    header('location: users.php');
  }

  if(isset($_GET['edituser'])) {
    $id = $_GET['edituser'];
    
    $query = "SELECT * FROM user WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog" style="width:800;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update User Information</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  User Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="post">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="text" name="fname" value="<?php echo ucfirst($row["f_name"]);?>">
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="text" name="mname" value="<?php echo ucfirst($row["m_name"]);?>">
                      </div>
                      <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="text" name="lname" value="<?php echo ucfirst($row["l_name"]);?>">
                      </div>
                    </div>
                    
                    
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-5">
                        <input class="form-control" id="focusedInput" type="text" name="email" value="<?php echo $row["email"];?>">
                      </div>
                      <label class="col-sm-1 control-label">Status</label>
                      <div class="col-sm-3">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Status</option>
                                                <option>Temporary</option>
                                                <option>Permanent</option>
                                            </select>
                      </div>         
                    </div>                                                     
                                    
                    <div class="modal-footer">                    
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updateuser" value="<?php echo $id ?>">Save changes</button>
                          <button class="btn btn-danger" type="submit" name="resetpass" value="<?php echo $id ?>">Reset Password</button>
                          
                        </div>
                  </form>     
                  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <?php  
    }  
  }

  if (isset($_POST['resetpass'])) {  
  $email = $_POST['email'];
  $query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
    $password = base64_decode($user['pass']);
  $to = $email;
    $header="From: EternalGiG Technology <eternalg@eternalgig.com>";
    
       $subject = 'Reset Account';
       $message = '<html>
       <head>
       </head>
       <body>
       <h2>Your Account Credential</h2>
         <p>Username:- '.$email.'</p>
         <p>Password:- '.$password.'</p>
       </body>
       </html>
       ';
  
    $header = "MIME-Version: 1.0" . "\r\n";
    $header = "Content-type:text/html;charset=UTF-8" . "\r\n";
  
       mail($to, $subject, $message, $header);
  
  echo "<script>alert('Reset mail sent.');</script>";
  
  //header('location: users.php');
  }

  if(isset($_POST['updateuserinfo'])) {
    $id = mysqli_real_escape_string($db, $_POST['updateuserinfo']);

    $bday = mysqli_real_escape_string($db, $_POST['bday']);
    $about = mysqli_real_escape_string($db, $_POST['about']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);          
    $website = mysqli_real_escape_string($db, $_POST['website']);          

    $query = "UPDATE user SET birth_date = '$bday', about_user = '$about', address = '$address', mobile = '$mobile', website = '$website', acc_status= 'Permanent' WHERE id = '$id' ";
   
    mysqli_query($db, $query);    
    header('location: profile.php');
  }

  if(isset($_POST['updatepass'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatepass']);
    $oldpass = mysqli_real_escape_string($db, $_POST['old_pass']);
    $newpass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $confirmpass = mysqli_real_escape_string($db, $_POST['confirm_pass']);    

    $query = "SELECT * FROM user WHERE id = $id ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $pass = base64_encode($oldpass);
    $newpass = base64_encode($newpass);

    if($pass==$row['pass']){      
      $query = "UPDATE user SET pass = '$newpass' WHERE id = '$id' ";   
    }    
    mysqli_query($db, $query);    
    if($pass == $row['pass']){
    header('location: profile.php?success=1');}
    else{
      header('location: profile.php?error=1');}
  }

  if(isset($_POST['newuserinfo'])) {
    $id = mysqli_real_escape_string($db, $_POST['newuserinfo']);
    $bday = mysqli_real_escape_string($db, $_POST['bday']);
    $about = mysqli_real_escape_string($db, $_POST['about']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);          
    $website = mysqli_real_escape_string($db, $_POST['website']);               
    $oldpass = mysqli_real_escape_string($db, $_POST['old_pass']);
    $newpass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $confirmpass = mysqli_real_escape_string($db, $_POST['confirm_pass']);    

    $query = "SELECT * FROM user WHERE id = $id ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $pass = base64_encode($oldpass);
    $newpass = base64_encode($newpass);

    if($pass==$row['pass']){      
      $query = "UPDATE user SET birth_date = '$bday', about_user = '$about', address = '$address', mobile = '$mobile', website = '$website', pass = '$newpass', acc_status= 'Permanent' WHERE id = '$id' ";
    }    
    mysqli_query($db, $query);    
    if($pass == $row['pass']){
      $_SESSION['acc_status'] = 'Permanent';
    header('location: index.php');}
    else{
      header('location: userinfo.php?error=1');}
  }
  
  if(isset($_POST['updatebooktable'])) {
    $id = mysqli_real_escape_string($db, $_POST['updatebooktable']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    

    $query = "UPDATE book_table SET cust_status = '$status' WHERE id = '$id' ";
   
    mysqli_query($db, $query);    
    header('location: booking.php');
  }

  if(isset($_GET['editbooktable'])) {
    $id = $_GET['editbooktable'];
    //$category = mysqli_real_escape_string($db, $_GET['category']);
    $query = "SELECT * FROM book_table WHERE id = $id ";
    $run = mysqli_query($db, $query);
    while($row = $run->fetch_array()){
  ?>
  <div class="modal-dialog" style="width:800;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Update Book Table</h4>
                        </div>
                        <div class="modal-body">
  
                        <section class="panel">
                <header class="panel-heading">
                  Table Detail
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="post">                  
                    <div class="form-group">                  
                    <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                      <select class="form-control m-bot15" name="status">
                                                <option disabled selected>Select Option</option>
                                                <option>Accepted</option>
                                                <option>Rejected</option>
                                                <option>Completed</option>
                                            </select>
                      </div>       
                      
                    </div>
                  
                    <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="submit" name="updatebooktable" value="<?php echo $id ?>">Save changes</button>
                          
                        </div>
                  </form>     
                  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <?php  
    }  
  } 
  ?>
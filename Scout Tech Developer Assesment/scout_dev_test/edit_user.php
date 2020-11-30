<?php
require_once 'core/core.php';
require_once 'header.php';
$um = new user_model();

if(isset($_POST['updateBtn'])){
    $update = $um->update_user();
    if($update) {
        Echo '<div class=" updateMessage alert alert-success alert-dismissible fade show" role="alert">
                Congrats! User info updated successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>';
    }else{
        echo '<div class=" updateMessage alert alert-danger alert-dismissible fade show" role="alert">
                Sorry! There was an error, please try again later.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>';
    }
    }
    $user = $um->get_single_user();
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">You are editing <?php echo $user->name.' '.$user->surname; ?> </h1>
  </div>
</div>
<form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Please enter a username"value="<?php echo $user->username; ?>">
  </div>  
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Please enter a name"value="<?php echo $user->name; ?>">
  </div>
  <div class="form-group">
    <label for="surname">Surname</label>
    <input type="text" class="form-control" id="surname" name="surname" placeholder="Please enter a last name" value="<?php echo $user->surname; ?>">
  </div> 
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailInfo" value="<?php echo $user->email; ?>" readonly>
    <small id="emailInfo" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="mobile">Mobile Number</label>
    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="0831234567" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" aria-describedby="mobileInfo" value="<?php echo $user->mobile; ?>" required>
    <small id="mobileInfo" class="form-text text-muted">Please enter a 10-digit phone number. We'll never share your this with anyone else.</small>
  </div> 
  <div class="form-group">
    <label for="jobTitle">Job Title</label>
    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Please enter a job title"value="<?php echo $user->job_title; ?>">
  </div>  
  <div class="form-group">
    <label for="bio">Bio</label>
    <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo $user->bio; ?></textarea>
  </div>
  <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
</form>
<?php require_once 'footer.php';?>

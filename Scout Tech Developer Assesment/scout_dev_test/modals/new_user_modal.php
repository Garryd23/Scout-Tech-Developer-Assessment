<div id="newUserModal" class="modal fade" tabindex="-1" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="errReport"></div>
<form id="newUserForm" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Please enter a username" required>
  </div>  
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Please enter a name" required>
  </div>
  <div class="form-group">
    <label for="surname">Surname</label>
    <input type="text" class="form-control" id="surname" name="surname" placeholder="Please enter a last name" required>
  </div> 
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailInfo" required>
    <small id="emailInfo" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <p id="passwordError" class="hasError form-text "></p>
    <input type="password" class="form-control" id="password" required>
  </div>
  <div class="form-group">
    <label for="mobile">Mobile Number</label>
    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="0831234567"  aria-describedby="mobileInfo" required>
    <small id="mobileInfo" class="form-text text-muted">Please enter a 10-digit phone number. We'll never share your this with anyone else.</small>
  </div> 
  <div class="form-group">
    <label for="jobTitle">Job Title</label>
    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Please enter a job title">
  </div>  
  <div class="form-group">
    <label for="bio">Bio</label>
    <textarea class="form-control" id="bio" name="bio" rows="5" ></textarea>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button id="addUser" type="submit" name="updateBtn" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
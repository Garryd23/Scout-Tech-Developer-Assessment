<?php
    require_once 'core/core.php';
    $additionalScripts = '<script defer type="text/javascript" src="'.$site_url.'assets/js/script.js" ></script>';
    require_once 'header.php';
    
?>  <div id="newStatus"></div>
    <div>
       <div class="usersTable table-responsive-sm">
        <table class='table table-striped table-hover'>
          <thead class='thead-dark'>
            <tr class="rounded">
              <th scope="col">#</th>
              <th scope="col">Full name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col"> <button id="newUserBtn" class="btn btn-outline-success my-2 my-sm-0" type="button">New User</button></th>
            </tr>
          </thead>
          <tbody id="userTableBody"></tbody>
        </table>
       </div>
    </div>

    <?php include 'modals/new_user_modal.php'?>
    <?php require_once 'footer.php' ?>
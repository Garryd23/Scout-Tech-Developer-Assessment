$(document).ready(function() {
    $('#userTableBody').html('Loading...');
    
//Populate the users table
    getUsers();
//Triggers dismissable alerts 
    $('.alert').alert()
//Open newUserModal
     $('#newUserBtn').on('click',()=>{
         $('#newUserModal').modal('toggle')
         $('#newUserForm')[0].reset();
         $('#emailError').hide();
         $('#mobileError').hide();
        });

     $('#newUserForm').on('submit',function(e) {
          e.preventDefault();
          validateData();
          
          
          
      });

    function getUsers() {
        $.ajax({
          url:'ajax/user_ajax.php',
          type:'post',
          dataType:'json',
          data:{action:'getUsers',
        },
                
          success:function(data) {
              $('#userTableBody').empty().html(data.users)
          }
       });
    }

    function validateData() {
        $.ajax({
            url:'ajax/user_ajax.php',
            type:'post',
            dataType:'json',
            data:{action:'validateData',
                  username:$('#username').val(),
                  name:$('#name').val(),
                  surname:$('#surname').val(),
                  email:$('#email').val(), 
                  password:$('#password').val(),
                  mobile:$('#mobile').val(),
                  job_title:$('#jobTitle').val(),
                  bio:$('#bio').val()
                   
            },
            error: function(xhr, status, error) {
             console.log(xhr.responseText);
             console.log(status);
             console.log(error);
             console.log('nothing')
           },
            success:function(data) {
               if(!data.validateData && !data.validateMobile){
                   newUser();
               } else{
                   if(data.validateData && data.validateMobile){
                    $('#emailError').show();
                    $('#mobileError').show();
                    $("#newUserModal").scrollTop('100px');
                   }else{
                       if(data.validateData){
                        $('#emailError').show();

                       }
                       else{
                           if(data.validateMobile){
                            $('#mobileError').show();
                           }
                       }
                   }
                   
                
               }
             
            }
        });
    }

    function newUser() {
        $.ajax({
            url:'ajax/user_ajax.php',
            type:'post',
            dataType:'json',
            data:{action:'newUser',
                  username:$('#username').val(),
                  name:$('#name').val(),
                  surname:$('#surname').val(),
                  email:$('#email').val(), 
                  password:$('#password').val(),
                  mobile:$('#mobile').val(),
                  job_title:$('#jobTitle').val(),
                  bio:$('#bio').val()
                   
            },
            error: function(xhr, status, error) {
              $('#newStatus').empty().html(`
              <div class=" updateMessage alert alert-danger alert-dismissible fade show" role="alert">
              Sorry! There was an error, please try again later.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>`)
             console.log(xhr.responseText);
           },
            success:function(data) {
              $('#newUserModal').modal('toggle');  
              getUsers();
              $('#newStatus').empty().html(`
              <div class=" updateMessage alert alert-success alert-dismissible fade show" role="alert">
                      Congrats! New user was created successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>`)
              console.log(data);
            }
        });
    }
})


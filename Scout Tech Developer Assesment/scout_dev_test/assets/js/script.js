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
                console.log(data);
                if(!data.validateData && !data.validateMobile){
                   newUser();
                } else{
                   
                    $("#newUserModal").scrollTop('100px');
                    $('#errReport').empty().html(`
                        <div class=" updateMessage alert alert-danger alert-dismissible fade show" role="alert">
                        <span id="message">Sorry! There was an error, please fix the following fields:</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>`)

                        if(data.validateData){
                            
                            $('#email').val("");
                            $('#message').append('<br>-The email address is already in use')

                        }

                        if(data.validateMobile){
                            
                            $('#mobile').val("");
                            $('#message').append('<br>-The mobile is already in use.')
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
               
              if(data.hasError){
                $('#errReport').empty().html(`
                <div class=" updateMessage alert alert-danger alert-dismissible fade show" role="alert">
                <span id="message">Sorry! There was an error, please fix the following fields:</span>
                ${data.errors}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>`)
              } else{ 
              $('#newUserModal').modal('toggle');  
              getUsers();
              $('#newStatus').empty().html(`
              <div class=" updateMessage alert alert-success alert-dismissible fade show" role="alert">
                      Congrats! New user was created successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>`)
              
              }
            }
        });
    }
})


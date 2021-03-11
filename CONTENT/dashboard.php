<?php
  include '../components/header.php';
  require_once '../userLogic/userMapper.php';
  
  $mapper = new UserMapper();
  $userList = $mapper->getAllUsers();
?>

<!-- <body style="background-image: url('../PICS/f108.jpg'); background-repeat: no-repeat; width: 100%; height: 50%;"> -->
            <div class="dashboard-container">
            <div class ="firstDash-container">
              <table>
                <tr >
                      <td >
                          <b >Username</b>
                      </td>
                      <td >
                         <b> Email</b>
                      </td>
                      <td >
                         <b>Advance to  Admin</b>
                      </td>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                    $count= 0;
                    foreach($userList as $user){
                      if($user['role'] == 0){
                       echo '<tr>';
                       echo '<td id="colorchange">'.$user['username'].'</td>';
                       echo '<td id="colorchange">'.$user['email'].'</td>';
                       echo '<td id="colorchange"> <a  href = "../userLogic/advancedAdmin.php?id='.$user['userID'].'">Advance to Admin</a> </td>';
                       echo '<td id="colorchange" name="editId"><a onclick="showForm('.$count++.')">Edit</a> </td>';
                       echo '<td id="colorchange"> <a href = "../userLogic/deleteUser.php?id='.$user['userID'].'">Delete User</a></td>';
                       echo '</tr>';

                       echo '<div  class = "formStyle" name = "editForm" style="display:none">';
                       echo '<div id = "editUsers"> EDIT USER </div>';
                       echo '<form   style="display:none" action="../userLogic/editUser.php" method="post">';
                       echo '<input  style = "display: none" type = "number" name = "userId" value = "'.$user['userID'].'">';;
                       echo '<label>Username</label><br>';
                       echo '<input type = "text" name = "username" value = "'.$user['username'].'"> <br>';
                       echo '<label >Email</label><br>';
                       echo '<input type = "text" name = "email" value = "'.$user['email'].'"> <br>';
                       echo '<input type = "submit" id = "saveBtn" value = "Save">';
                       echo '</form>';
                       echo '</div>';
                      }
                    }
                    ?>      
                  </tbody>
              </table>
        </div>
     </div> 

          <script> 
                  function showForm(p){
                    var items = document.getElementsByName("editForm");
                     if(items[p].style.display == "block"){
                      items[p].style.display = "none";
                     } 
                    else {
                      for (let i=0;i<items.length;i++){
                        items[i].style.display = "none";
                      }
                      items[p].style.display = "block";
                    }
                  }
              
                  var items = document.getElementsByName('editId')
                      for (var i = 0; i < items.length; i++) {
                        items[i].addEventListener('click', (event) => {
                          event.preventDefault();
                        })
                    }
        </script>
<?php
  include '../components/footer.php';
?>
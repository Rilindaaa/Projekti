<?php
  include '../components/header.php';
  require_once '../userLogic/userMapper.php';
  require_once '../productLogic/productMapper.php';
  
  $mapper = new UserMapper();
  $userList = $mapper->getAllUsers();

  $mapper1 = new ProductMapper();
  $productList = $mapper1 -> getAllProducts();
?>
            <div class="dashboard-container">
              <div class="selector">
                <ul>
                  <li><a onclick="showDiv(1)">Users</a></li>
                  <li><a onclick="showDiv(2)">Products</a></li> 
                </ul>
              </div>
            <div class ="firstDash-container" id="users">
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
        <div id="products" style="display:none">
          <table>
                 <tr >
                      <td >
                          <b >Product Name</b>
                      </td>
                      <td >
                         <b>Photo</b>
                      </td>
                      <td >
                         <b>Price</b>
                      </td>
                      <td >
                         <b>Sector</b>
                      </td>
                      <td >
                         <b>Type</b>
                      </td>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                   
                    foreach($productList as $product){
                       echo '<tr>';
                       echo '<td id="colorchange">'.$product['emriProduktit'].'</td>';
                       echo '<td id="colorchange"><img  style = "width:40px; height:40px" src = "../PICS/'.$product['fotoProduktit'].'"/></td>';
                       echo '<td id="colorchange">'.$product['cmimiProduktit'].' $</td>';
                       echo '<td id="colorchange">'.$product['sektori'].'</td>';
                       echo '<td id="colorchange">'.$product['llojiProduktit'].'</td>';
                       echo '<td id="colorchange" name="editId"><a onclick="showForm('.$count++.')">Edit</a> </td>';
                       echo '<td id="colorchange"> <a href = "../productLogic/deleteProduct.php?id='.$product['produktID'].'">Delete Product</a></td>';
                       echo '</tr>';

                      echo  '<div  class = "productStyle" name = "editForm" style="display:none">';
                 
                        echo ' <form class = "editProduct" method="post" action="../productLogic/editProduct.php">';
                        echo '<input style = "display:none;" type="number" value ="'.$product['produktID'].'"name="id" /><br>';
                        echo '<label>Name</label> <br> ';
                        echo '<input type="text" value ="'.$product['emriProduktit'].'"name="emriProduktit" /><br>';
                        echo '<label>Photo</label> <br> ';
                        echo '<input id = "photoId"  value = "'.$product['fotoProduktit'].'" type="file" name="fotoja"/><br>';
                        echo '<input  style = "display:none;" id = "photoId"  value = "'.$product['fotoProduktit'].'" type="text" name="fotoja1"/><br>';
                        echo '<label>Price</label><br>';
                        echo '<input type="float" value = "'.$product['cmimiProduktit'].'" name="cmimi"/><br>';
                        echo '<label for="sector" >Sector</label><br>';
                        ?>
                        <input type="radio" <?php echo (($product['sektori'] =="Women")? 'checked = "checked"':''); ?> name="sector" value="Women"/>
                        <label>Women</label>
                        <input type="radio" <?php echo (($product['sektori'] =="Men")? 'checked = "checked"':''); ?> name="sector" value="Men"/>
                        <label>Men</label>
                        <input type="radio" <?php echo (($product['sektori'] =="Kids")? 'checked = "checked"':''); ?> name="sector" value="Kids"/>
                        <label>Kids</label><br>
                        <label>Product Type</label><br>
                        
                        <select name="producttype"> 
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Dresses")? 'selected = "selected"':''); ?> value="Dresses">Dresses</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Shoes")? 'selected = "selected"':''); ?> value="Shoes">Shoes</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Bags")? 'selected = "selected"':''); ?> value="Bags">Bags</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Jeans")? 'selected = "selected"':''); ?> value="Jeans">Jeans</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Jacket")? 'selected = "selected"':''); ?> value="Jacket">Jacket</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="T-shirt")? 'selected = "selected"':''); ?> value="T-Shirt">T-Shirt</option>
                        </select><br>
                        <?php 
                        echo '<input type="submit" name="submit-btn" value="Save"/>';
                      echo'</form>';
                  echo'</div>';
                    }  
                    ?>      
                  </tbody>
                  </table>
                  
    
              
          <form method="post" action="../productLogic/productVerify.php">
            <label>Name</label> <br> 
            <input type="text" name="emriProduktit" /><br>
            <label>Photo</label> <br> 
            <input type="file" name="fotoja"/><br>
            <label>Price</label><br>
            <input type="float" name="cmimi"/><br>

            <label for="sector" >Sector</label><br>
            <input type="radio" name="sector" value="Women"/>
            <label>Women</label>  
            <input type="radio" name="sector" value="Men"/>
            <label>Men</label>  
            <input type="radio" name="sector" value="Kids"/>
            <label>Kids</label><br>
            
            <label>Product Type</label><br>
            <select name="producttype">
              <option name="clothes" value="Dresses">Dresses</option>
              <option name="clothes" value="Shoes">Shoes</option>
              <option name="clothes" value="Bags">Bags</option>
              <option name="clothes" value="Jeans">Jeans</option>
              <option name="clothes" value="Jacket">Jacket</option>
              <option name="clothes" value="T-Shirt">T-Shirt</option>
            </select><br>
            
            <input type="submit" name="submit-btn" value="Register"/>

          </form>
        </div>
     </div> 
     </div> 
     
 
          <script> 
                  function showForm(p){
                    var items = document.getElementsByName("editForm");
                    /*Perkujdeset me hjek*/
                     if(items[p].style.display == "block"){
                      items[p].style.display = "none";
                     } 
                     /*perkujdeset me shfaq*/
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

                  function showDiv(param){
                    var users = document.getElementById('users');
                    var products = document.getElementById('products');

                    if(param=='1'){
                      users.style.display='block';
                      products.style.display='none';
                    }
                    else if(param =='2'){
                      users.style.display='none';
                      products.style.display='block';
                    }
                    
                    var items = document.getElementsByClassName('selector')
                        for (var i = 0; i < items.length; i++) {
                         items[i].addEventListener('click', (event) => {
                            event.preventDefault();
                          })
                    } 

                  }          
          </script>
<?php
  include '../components/footer.php';
?>


<?php
  include '../components/header.php';
  require_once '../userLogic/userMapper.php';
  require_once '../productLogic/productMapper.php';
  require_once '../buyLogic/buyProductMapper.php';
  
  
  $mapper = new UserMapper();
  $userList = $mapper->getAllUsers();
  $mapper2 = new BuyProductMapper();
  $productList2 = $mapper2->getAllOrders();

  $mapper1 = new ProductMapper();
  $productList = $mapper1 -> getAllProducts();
?>
            <div class="dashboard-container">
              <div class="selector">
                <ul>
                  <li><a onclick="showDiv(1)">Users</a></li>
                  <li><a onclick="showDiv(2)">Products</a></li> 
                  <li><a onclick="showDiv(3)">Orders</a></li>
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
                       echo '<td id="colorchange"><img class="photoStyle" style = "width:70px; height:70px" src = "../PICS/'.$product['fotoProduktit'].'"/></td>';
                       echo '<td id="colorchange">'.$product['cmimiProduktit'].' $</td>';
                       echo '<td id="colorchange">'.$product['sektori'].'</td>';
                       echo '<td id="colorchange">'.$product['llojiProduktit'].'</td>';
                       echo '<td id="colorchange" name="editId"><a onclick="showForm('.$count++.')">Edit</a> </td>';
                       echo '<td id="colorchange"> <a href = "../productLogic/deleteProduct.php?id='.$product['produktID'].'">Delete Product</a></td>';
                       
                       echo '<div class="productStyle-Wrapper">';
                        echo  '<div  class = "productStyle" name = "editForm" style="display:none">';
                        echo '<p>EDIT PRODUCTS</p>';
                        echo '<form class = "editProduct" method="post" action="../productLogic/editProduct.php">';
                        echo '<label id = "nameId">Product Name</label> <br> ';
                        echo '<input id type="text" value ="'.$product['emriProduktit'].'"name="emriProduktit" /><br>';
                        echo '<label id >Photo</label> <br> ';
                        echo '<input id="fotoja-Id"  value = "'.$product['fotoProduktit'].'" type="file" name="fotoja"/><br>';
                        echo '<label id = "priceId">Price</label><br>';
                        echo '<input  id = "inputPrice"type="float" value = "'.$product['cmimiProduktit'].'" name="cmimi"/><br>';
                        echo '<label  id = "sectorId"for="sector" >Sector</label><br>';

                        ?>
                        <input type="radio" <?php echo (($product['sektori'] =="Women")? 'checked = "checked"':''); ?> name="sector" value="Women"/>
                        <label class = "radioo">Women</label>
                        <input type="radio" <?php echo (($product['sektori'] =="Men")? 'checked = "checked"':''); ?> name="sector" value="Men"/>
                        <label class = "radioo">Men</label>
                        <input type="radio" <?php echo (($product['sektori'] =="Kids")? 'checked = "checked"':''); ?> name="sector" value="Kids"/>
                        <label class = "radioo">Kids</label><br>
                        <label class = "productType">Product Type</label><br>
                        
                        <select  class = "list" name="producttype"> 
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Dresses")? 'selected = "selected"':''); ?> value="Dresses">Dresses</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Shoes")? 'selected = "selected"':''); ?> value="Shoes">Shoes</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Bags")? 'selected = "selected"':''); ?> value="Bags">Bags</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Jeans")? 'selected = "selected"':''); ?> value="Jeans">Jeans</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="Jacket")? 'selected = "selected"':''); ?> value="Jacket">Jacket</option>
                          <option name="clothes" <?php echo (($product['llojiProduktit'] =="T-shirt")? 'selected = "selected"':''); ?> value="T-Shirt">T-Shirt</option>
                        </select><br>
                        <?php 
                        echo '<input id = "submit" type="submit" name="submit-btn" value="Save"/>';
                        echo '<input style = "display:none;" type="number" value ="'.$product['produktID'].'"name="id" /><br>';
                        echo '<input  style = "display:none;" id = "photoId"  value = "'.$product['fotoProduktit'].'" type="text" name="fotoja1"/><br>';


                      echo'</form>';
                  echo'</div>';
                  
                  echo '</div>';
                  echo '</tr>';
                    }  
                    ?>        
                  </tbody> 
             </table>
                  
          
    
              
          <form class = "registerEdit"  method="post" action="../productLogic/productVerify.php">
          <p>REGISTER PRODUCTS</p>
            <label>Product Name</label> <br> 
            <input type="text" name="emriProduktit" /><br>
            <label>Photo</label> <br> 
            <input type="file" id="fotoja-Id" name="fotoja"/><br>
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
            
            <input id = "regId" type="submit" name="submit-btn" value="Register"/>

          </form>
        </div>
     
            <div id="orders" style="display:none">
            <table>
                 <tr >
                      <td>
                         <b>Username</b>
                      </td>
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
                   
                    foreach($productList2 as $product){
                      $mapper3 = new UserMapper();
                      $user = $mapper3->getUsernameById($product['userId']);

                       echo '<tr>';
                       echo '<td id="colorchange">'.$user.'</td>';
                       echo '<td id="colorchange">'.$product['productName'].'</td>';
                       echo '<td id="colorchange"><img class="photoStyle" style = "width:70px; height:70px" src = "../PICS/'.$product['productPhoto'].'"/></td>';
                       echo '<td id="colorchange">'.$product['productPrice'].' $</td>';
                       echo '<td id="colorchange">'.$product['productSector'].'</td>';
                       echo '<td id="colorchange">'.$product['productType'].'</td>';
                       echo '<td id="colorchange"> <a href = "../buyLogic/deleteBoughtProduct.php?id='.$product['orderId'].' && pageURL='.$_SERVER['PHP_SELF'].'">Delete Order</a></td>';
                       echo '</tr>';
                    }  
                    ?>        
                  </tbody> 
                  </table>
                  
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
                    var orders = document.getElementById('orders');

                    if(param=='1'){
                      users.style.display='block';
                      products.style.display='none';
                      orders.style.display='none';
                    }
                    else if(param=='2'){
                      users.style.display='none';
                      products.style.display='flex';
                      orders.style.display='none';
                    }
                    else if(param=='3'){
                      users.style.display='none';
                      products.style.display='none';
                      orders.style.display='block';
                    }
                    
                
                    
                    var items = document.getElementsByClassName('selector');
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


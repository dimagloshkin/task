<?php
if (isset($_POST['name']) and
    isset($_POST['pass'])) {
   $name = $_POST['name'];
   $pass = $_POST['pass'];
   $errors = Validation::CheckAdmin($name, $pass);
   if (empty($errors)) {
      $_SESSION['admin'] = 1;
      header("Location: /");
   } else {
      ?>
       <div id="wrapper">

           <div class="auth">
               <div id="form">
                   <form action="" method="POST">
                       <h2 class="text-center">Вход в систему</h2>
                       <p><input class="form-control" placeholder="<?php if (isset($errors[0])) {
                             echo $errors[0];
                          } else {
                             echo "Введите логин";
                          } ?>" type="text" name="name"></p>
                       <p><input class="form-control" placeholder="<?php if (isset($errors[1])) {
                             echo $errors[1];
                          } else {
                             echo "Введите пароль";
                          } ?>" type="password" name="pass"></p>
                       <p><input type="submit" class="btn btn-info btn-block" value="Авторизация"></p>
                   </form>
               </div>
           </div>

       </div>
      <?php
   }
} else {
   ?>
    <div id="wrapper">

        <div class="auth">
            <div id="form">
                <form action="" method="POST">
                    <h2 class="text-center">Вход в систему</h2>
                    <p><input class="form-control" placeholder="Введите логин" type="text" name="name"></p>
                    <p><input class="form-control" placeholder="Введите пароль" type="password" name="pass"></p>
                    <p><input type="submit" class="btn btn-info btn-block" value="Авторизация"></p>
                </form>
            </div>
        </div>

    </div>

   <?php
}









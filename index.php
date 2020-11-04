<?php
    session_start();
    include 'User.php';
?>

<html>
<body>
<?php
    if ($_POST) {
        $user = new User($_POST['email']);
        $user->autendificated($_POST['pass']);
    } else {
        $users = User::getUsers(); // вызов статического метода (вызов метода класса без создания объекта)
        $user = new User($users[$_SESSION['id']]['email']);
        $user->autendificated($users[$_SESSION['id']]['password']);
    }

    if (isset($_SESSION['id'])) {
        echo "<span> HELLO " . $user->name . " " . $user->surname . "</span>";
    } else {
        echo "<form method='POST'>
                <label>Email<input type='email' name='email'><br></label>
                <label>Пароль<input type='pass' name='pass'><br></label>" . "<input type='submit' name='submit' value='Вход'><br>
              </form>";
    }


?>

</html>
</body>
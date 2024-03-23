<!DOCTYPE html>
<html>
<head>
    <title>Lwh的登录页面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* 背景图片 */
            background-image: url('iamge/bg.jpg');
            background-size: cover; /* 背景平铺*/
            background-position: center; /* 背景图片居中 */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            
          
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"], 
        input[type="reset"] {  
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover,    
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>
<!-- <script>
        function displayLoginSuccess(username) {
            alert("用户：" + username + " 登录成功！");
        }
    </script> -->
</head>
<body>
    <form method="post" onsubmit="displayLoginSuccess(document.getElementById('username').value)">
        <label for="username">用户名</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">密码</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="登录">
        <input type="reset" value="清空">
    </form>


    <div style="position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 24px; color: white;">Login by Luowenhao@2024</div>  <!--底部作者信息-->
    <br>
    <?php


    include 'SqlConnect.php';// 引入数据库连接文件
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        // 查询数据库
    $sql = "SELECT * FROM t_user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 匹配成功
        $row = $result->fetch_assoc();     // 获取匹配的记录
        $username = $row['username'];      // 用户名存储在username
        $password = $row['password'];       // 密码存储在password
        
        echo "<script>alert('登录成功！用户名：$username， 密码：$password');</script>";
    
    } else {
        // 匹配失败
        echo "<script>alert('登录失败！');</script>";
    }
        

    }
    ?>
</body>
</html>
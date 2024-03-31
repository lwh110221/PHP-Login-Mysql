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
        $row = $result->fetch_assoc();                      // 获取匹配的记录
        $username = $row['username'];                   // 用户名存储在username
        $password = $row['password'];                // 密码存储在password
        
        echo "<script>alert('登录成功！用户名：$username 密码：$password');</script>";
    
    } else {
        // 匹配失败
        echo "<script>alert('登录失败！');</script>";
    }
        

    }
    ?>








<!-- 点击特效 -->
<script type="text/javascript">
         ! function (e, t, a) {
            function r() {
                for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[
                        e].y--, s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x +
                    "px;top:" + s[e].y + "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e]
                    .scale + ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
                requestAnimationFrame(r)
            }
 
            function n() {
                var t = "function" == typeof e.onclick && e.onclick;
                e.onclick = function (e) {
                    t && t(), o(e)
                }
            }
 
            function o(e) {
                var a = t.createElement("div");
                a.className = "heart", s.push({
                    el: a,
                    x: e.clientX - 5,
                    y: e.clientY - 5,
                    scale: 1,
                    alpha: 1,
                    color: c()
                }), t.body.appendChild(a)
            }
 
            function i(e) {
                var a = t.createElement("style");
                a.type = "text/css";
                try {
                    a.appendChild(t.createTextNode(e))
                } catch (t) {
                    a.styleSheet.cssText = e
                }
                t.getElementsByTagName("head")[0].appendChild(a)
            }
 
            function c() {
                return "rgb(" + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + "," + ~~(255 * Math
                    .random()) + ")"
            }
            var s = [];
            e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e
                .mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function (e) {
                    setTimeout(e, 1e3 / 60)
                }, i(
                    ".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"
                ), n(), r()
        }(window, document);
    </script>








<!--跟随特效  -->
<span class="js-cursor-container"></span>
    <script>
        (function fairyDustCursor() {
 
            var possibleColors = ["#D61C59", "#E7D84B", "#1B8798"]
            var width = window.innerWidth;
            var height = window.innerHeight;
            var cursor = { x: width / 2, y: width / 2 };
            var particles = [];
 
            function init() {
                bindEvents();
                loop();
            }
 
            // Bind events that are needed
            function bindEvents() {
                document.addEventListener('mousemove', onMouseMove);
                window.addEventListener('resize', onWindowResize);
            }
 
            function onWindowResize(e) {
                width = window.innerWidth;
                height = window.innerHeight;
            }
 
            function onMouseMove(e) {
                cursor.x = e.clientX;
                cursor.y = e.clientY;
 
                addParticle(cursor.x, cursor.y, possibleColors[Math.floor(Math.random() * possibleColors.length)]);
            }
 
            function addParticle(x, y, color) {
                var particle = new Particle();
                particle.init(x, y, color);
                particles.push(particle);
            }
 
            function updateParticles() {
 
                // Updated
                for (var i = 0; i < particles.length; i++) {
                    particles[i].update();
                }
 
                // Remove dead particles
                for (var i = particles.length - 1; i >= 0; i--) {
                    if (particles[i].lifeSpan < 0) {
                        particles[i].die();
                        particles.splice(i, 1);
                    }
                }
 
            }
 
            function loop() {
                requestAnimationFrame(loop);
                updateParticles();
            }
 
            /**
             * Particles
             */
 
            function Particle() {
 
                this.character = "*";
                this.lifeSpan = 120; //ms
                this.initialStyles = {
                    "position": "fixed",
                    "display": "inline-block",
                    "top": "0px",
                    "left": "0px",
                    "pointerEvents": "none",
                    "touch-action": "none",
                    "z-index": "10000000",
                    "fontSize": "25px",
                    "will-change": "transform"
                };
 
                // Init, and set properties
                this.init = function (x, y, color) {
 
                    this.velocity = {
                        x: (Math.random() < 0.5 ? -1 : 1) * (Math.random() / 2),
                        y: 1
                    };
 
                    this.position = { x: x + 10, y: y + 10 };
                    this.initialStyles.color = color;
 
                    this.element = document.createElement('span');
                    this.element.innerHTML = this.character;
                    applyProperties(this.element, this.initialStyles);
                    this.update();
 
                    document.querySelector('.js-cursor-container').appendChild(this.element);
                };
 
                this.update = function () {
                    this.position.x += this.velocity.x;
                    this.position.y += this.velocity.y;
                    this.lifeSpan--;
 
                    this.element.style.transform = "translate3d(" + this.position.x + "px," + this.position.y + "px, 0) scale(" + (this.lifeSpan / 120) + ")";
                }
 
                this.die = function () {
                    this.element.parentNode.removeChild(this.element);
                }
 
            }
 
            /**
             * Utils
             */
 
            // Applies css `properties` to an element.
            function applyProperties(target, properties) {
                for (var key in properties) {
                    target.style[key] = properties[key];
                }
            }
 
            if (!('ontouchstart' in window || navigator.msMaxTouchPoints)) init();
        })();    
    </script>







</body>
</html>
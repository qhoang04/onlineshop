<?php 
    session_start();
?>
<style>
    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 0;
    }
    .closeBtn {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    #registerModalBtn, #loginModalBtn {
        cursor: pointer;
        color: blue;
        text-decoration: none;
        margin-right: 20px;
        list-style-type: none;
    }
    #links ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex; 
    }
    #links {
      display: flex;
      justify-content: flex-end; /* Đặt nút về phía bên phải */
      align-items: center; /* Canh giữa theo chiều dọc */
      margin: 10px 10px 10px 10px;
    }
</style>
<div class="header">
    <div id="logo">
        <a href="index.php">
            <img src="./img/hdecor.png" alt="Logo">
        </a>
    </div>
    <div id="links">
        <div id="logoutModal" class="modal">
            <span class="closeBtn" onclick="closeModal('logoutModal')">&times;</span>
            <h3>Xác nhận Đăng xuất</h3>
            <p>Bạn có chắc chắn muốn đăng xuất?</p>
            <center>
                <button onclick="logout()">Đăng xuất</button>
                <button onclick="closeModal('logoutModal')">Hủy</button>
            </center>
        </div>
    <?php
        if (isset($_SESSION['user_id'])) {
            echo '<span>Xin chào, ' . $_SESSION['username'] . '</span>';
            echo '<button onclick="openLogoutModal()">Đăng xuất</button>';
        } else {
            echo '<ul>
                    <li id="registerModalBtn">
                        <a>Đăng ký</a>
                    </li>
                    <li id="loginModalBtn">
                        <a>Đăng nhập</a>
                    </li>
                </ul>';
        }
        if (isset($_GET['logout']) && $_GET['logout'] == true) {
            session_destroy();
            header("Location: index.php");
            exit();
        }
        ?>
    </div>
    <div id="registerModal" class="modal">
    <span class="closeBtn" onclick="closeModal('registerModal')">&times;</span>
        <form method="post" enctype="multipart/form-data" autocomplete="off">
            <h3>Đăng ký</h3>
            <table>
                <tr>
                    <td id='text'>Enter Your Name:</td>
                    <td><input type="text" name="u_name" placeholder="Enter your full name" required></td>
                </tr>
                <tr>
                    <td id='text'>Enter Your E-mail:</td>
                    <td><input type="email" name="u_email" placeholder="Enter your e-mail ID" required></td>
                </tr>
                <tr>
                    <td>Enter Your Password:</td>
                    <td><input type="password" name="u_password" placeholder="Enter your password" required></td>
                </tr>
                <tr>
                    <td>Re-enter Your Password:</td>
                    <td><input type="password" name="u_confirm_password" placeholder="Re-enter your password" required></td>
                </tr>
                <tr>
                    <td id='text'>Enter Your City:</td>
                    <td><input type="text" name="u_city" placeholder="Enter your City" required></td>
                </tr>
                <tr>
                    <td id='text'>Enter Your Addres:</td>
                    <td><input type="text" name="u_address" placeholder="Enter your address" required></td>
                </tr>
                <tr>
                    <td id='text'>Select your DOB:</td>
                    <td><input type="date" name="u_dob" placeholder="Enter DOB" required></td>
                </tr>
                <tr>
                    <td id='text'>Enter your Phone No.:</td>
                    <td><input type="text" name="u_phone" placeholder="Enter your phone" required></td>
                </tr>
            </table>
            <center>
                <input type="submit" name="u_signup" value="Đăng ký">
            </center>
            <?php user_signup(); ?>
        </form>
    </div>
    <div id="loginModal" class="modal">
        <div id="bodyloginModal">
            <span class="closeBtn" onclick="closeModal('loginModal')">&times;</span>
            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <h3>Đăng nhập</h3>
                <table>
                    <div class="txt_field">
                        <tr>
                            <td id='logText'>Nhập email của bạn:</td>
                            <td><input type="email" name="email" placeholder="Enter your e-mail ID"></td>
                        </tr>
                    </div>
                    <div class="txt_field">
                        <tr>
                            <td id='logText'>Nhập mật khẩu:</td>
                            <td><input type="password" name="password" placeholder="Enter your Passsword"></td>
                        </tr>
                    </div>
                </table>
                <center>
                    <input type="submit" name="login" value="Đăng nhập">
                    <div class="pass">Forgot Password?</div>
                </center>
            </form>
            <?php user_login(); ?>

        </div>
    </div>
    <div class="overlay"></div>
    <div id="search">
        <form action="search.php" method='GET' enctype='multipart/form-data' autocomplete='off'>
            <input type="text" name='user_search' placeholder="nhập tên sản phẩm cần tìm kiếm.....">
            <button name="btn_search" id="btn-search">Tìm kiếm</button>
            <button type="button" id="btn-Cart" onclick="checkLoginAndOpenCart()">Giỏ hàng <span id='cart_count'><?php echo isset($_SESSION['user_id']) ? cart_count($_SESSION['user_id']) : '0'; ?></span></button>

        </form>
    </div>
</div>
<script>
    function checkLoginAndOpenCart() {
        <?php
        if (!isset($_SESSION['user_id'])) {
            echo "openModal('loginModal');";
        } else {
            echo "window.location.href = 'cart.php';";
        }
        ?>
    }
    function logout() {
        window.location.href = 'index.php?logout=true';
    }
    function openLogoutModal() {
        openModal('logoutModal');
    }
    document.getElementById('registerModalBtn').addEventListener('click', function() {
        openModal('registerModal');
    });

    document.getElementById('loginModalBtn').addEventListener('click', function() {
        openModal('loginModal');
    });

    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
        document.querySelector('.overlay').style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.querySelector('.overlay').style.display = 'none';
    }
</script>
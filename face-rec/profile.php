<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/loading.css">


    <style>
        * {
            box-sizing: border-box;
        }

        .profile-container {
            display: flex;
            justify-content: space-between;
            gap: 40px;
            width: 100%;
            height: 90vh;
            padding-top: 20vh;
            padding-left: 4vw;
            padding-right: 4vw;


        }

        .profile-left {
            width: 30%;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .profile-left-box1 {
            height: 20%;
            display: flex;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

            padding: 10px;

        }

        .profile-left-box1 h3 {
            margin-bottom: 0.7rem;
        }

        .profile-left-box {
            margin-left: 0.7rem;
        }

        .profile-left-box1>i {
            font-size: 1.7rem;
            border-radius: 50%;
            font-weight: 900;
            padding: 0.5rem;
            background-color: #AAFE2A;
        }

        .profile-right {
            width: 70%;
            height: 100%;

            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-left-box2 {
            height: 80%;

            padding: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-left-box2 li {
            list-style: none;
            padding: 0.5rem 0;
            font-size: 1.2rem;
            cursor: pointer;
            border-bottom: 1px solid grey;
        }

        .profile-left-box2 li i {
            margin-right: 0.7rem;
        }

        .profile-left-box2 li:hover {
            color: #5ca306;
            transition: 0.3s;
        }

        .profile-right h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group input {
            width: 50%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .order-box {
            display: flex;
            width: 100%;
            height: 160px;
            padding: 0.5rem;
            justify-content: space-between;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0.4rem 0;
            background-color: white;

        }

        .order-box1 {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;


        }

        .order-box1 .order-box2>h4,
        p {
            margin-bottom: 0.4rem;
        }

        .order-box2>p {
            width: 350px;
            font-size: 0.7rem;
        }

        .par-t {
            width: 100%;
            display: flex;
            gap: 10px;
            justify-content: start;
            align-items: center;
        }

        .order-box4 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
        }

        .order-box4>li {
            margin: 0.2rem 0;
        }

        .order-box4 li>span {
            margin-left: 0.5rem;
            font-size: 0.8rem;
        }

        .order-box3 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .order-box3>h4 {
            font-size: 0.9rem;
            color: gray;
        }

        .order-box3>button {
            background: radial-gradient(circle, #0f5222 30%, #072b13 100%);
            color: white;
            padding: 0.5rem;
            border-radius: 5px;
        }

        /* modile view  */
        .mobile-view-container {
            width: 100%;
            padding-top: 14vh;
            height: auto;
            padding-left: 0.3rem;
            padding-right: 0.3rem;



        }

        .m-profile-container {
            width: 100%;
            height: auto;
            box-shadow: 0 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 1rem;
            display: flex;
            justify-content: start;
            align-items: center;
            margin-bottom: 1rem;
            background-color: white;
        }

        .m-profile-container>i {
            font-size: 20px;
            padding: 0.5rem;
            border-radius: 50%;
            background-color: #AAFE2A;
            margin-right: 1.2rem;
            box-shadow: 0 0px 15px rgba(0, 0, 0, 0.1);

        }

        .m-profile-container .profile-con>h4 {
            font-size: 1rem;
        }

        .m-info-container {
            width: 100%;
            height: auto;


            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .m-info-container>li {
            width: 100%;

        }

        .m-info-container>li>div {
            display: flex;
            align-items: center;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0px 15px rgba(0, 0, 0, 0.1);


        }

        .m-info-container>li>div>i {
            font-size: 20px;
            margin-right: 1.2rem;



        }

        .m-info-container>li>div>h4 {
            font-size: 0.8rem;
        }

        .m-view-list {
            width: 100%;
            height: auto;
            box-shadow: 0 0px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 10px;
            padding: 0.5rem;

        }

        /* order-css */
        .m-order-details {
            box-shadow: 0 0px 15px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            margin-bottom: 2rem;
        }

        .m-order-box {
            display: flex;

        }

        .m-o-info {
            padding: 0.6rem;
        }

        .m-order-box4>li {
            margin: 0.5rem 0rem;
        }

        .m-order-box4>li>span {
            margin-left: 0.5rem;
        }

        .m-profile-view form div input {
            width: 100%;
        }

        .mobile-view-container {
            display: none;
        }
        .address-container{
    width: 100%;
    height: auto;
    border-radius: 10px;
    padding: 0rem 1rem;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);

}
.address-details{
    width: 100%;
    height: auto;
    padding: 1rem 2rem;
    display: flex;
    align-items: start;
    position: relative;
}
.address-details > ol{
    padding-left: 1.4rem;
}
.a-l{
    position: absolute;
    top: 10px;
    right: 15px;
}
.add-address{
    width: 100%;
    height: 40px;
    display: flex;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    margin: 0.5rem 0rem;
    align-items: center;
    padding-left: 1rem;
    border-radius: 10px;
}
.add-address > i{
    font-size: 1.7rem;
    color:black;
    margin-left: 0.4rem;
}.address-form {
    max-width: 600px;
    margin: 2rem auto;
    background: #f8f8f5;
    padding: 1rem;
    border-radius: 8px;
    font-family: Arial, sans-serif;
  }
.address-info{
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);

}
.row {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1rem;
  }
  
  .row.full {
    flex-direction: column;
  }
  
  .row input,
  .row select {
    flex: 1;
    padding: 0.8rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .add-btn {
    background: linear-gradient(to right, #0f5222, #072b13);
    color: white;
    padding: 0.8rem 1.5rem;
    font-size: 1.1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    display: block;
    margin-top: 1rem;
  }
  
        @media(max-width:950px) {
            .mobile-view-container {
                display: block;
            }

            .profile-container {
                display: none;
            }
            .address-header{
        width: 100%;
        height: 40px;
       
    }
    .address-details{
        width: 100%;
        height: auto;
        padding: 1rem 0rem;
        display: flex;
        align-items: start;
        position: relative;
    }
    .row {
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    gap: 1rem;
    margin-bottom: 1rem;
  }
   
        }
    </style>
</head>

<body>
<div class="preloader" id="preloader">
    <div class="spinner"><img src="./images/loader.gif" alt="" width="400px"></div>
</div>
    <div class="menu-bar-d" id="menuBar">
        <div class="top-bar">
            <div class="it">
                <a href="./login.php"><i class="bi bi-person"></i></a>

                <a href="./fav.php"><i class="bi bi-heart"></i></a>
                <a href="./cart.php"><i class="bi bi-cart2"></i></a>
            </div>
            <i class="bi bi-x" id="closeMenu" style="font-size: 1.5rem; cursor: pointer;"></i>
        </div>

        <div class="men-list">
            <li>Home</li>
            <li>Veg Pickles</li>
            <li>Non Pickles</li>
            <li>About Us</li>
            <li>Contact Us</li>
        </div>
    </div>
    <nav id="navb">
        <img src="./images/2.png" alt="logo" width="150px">
        <div class="navbar">
            <a href="">Home</a>
            <a href="">Veg Pickles</a>
            <a href="">Non Veg Pickles</a>
            <a href="">About Us</a>
            <a href="">Contact Us</a>


            <div class="ani">
                <a href="./fav.php"> <i class="bi bi-heart"></i></a>

                <a href="./cart.php"><i class="bi bi-cart2"></i></a>

                <div class="hover-box">
                    <a href="./login.php" class="c-t"><i class="bi bi-person"></i></a>

                    <div class="cust-details">
                        <div class="list-c">
                            <li><a href="#"><i class="bi bi-person"></i><span>My Profile</span> </a></li>
                            <li><a href="#"><i class="bi bi-house"></i><span>My Address</span> </a></li>
                            <li><a href="#"><i class="bi bi-box"></i> <span>My Order</span></a></li>
                            <li><a href="#"><i class="bi bi-cart"></i><span> My Cart</span></a></li>
                            <li><a href="#"><i class="bi bi-heart"></i> <span>Wishlist</span></a></li>
                            <li><a href="#"><i class="bi bi-box-arrow-right"></i><span>Log Out</span> </a></li>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="menu" id="openMenu"><i class="bi bi-list" style="font-size: 1.5rem; cursor: pointer;"></i></div>

    </nav>
    <div class="profile-container">
        <div class="profile-left">
            <div class="profile-left-box1">
                <i class="bi bi-person"></i>
                <div class="profile-left-box">

                    <span>Hello 👋</span><br>
                    <h4>Dilip Kumar</h4>
                </div>
            </div>
            <div class="profile-left-box2">
                <li onclick="showBox('boxxx1')" ><i class="bi bi-person"></i>Account details</li>
                <li onclick="showBox('boxxx3')" ><i class="bi bi-box"></i>Order</li>
                <li onclick="showBox('boxxx2')" ><i class="bi bi-house"></i>Address</li>
                <li><i class="bi bi-box-arrow-right"></i>logout</li>

            </div>

        </div>
        <div class="profile-right" style="overflow: auto;">
            <section id="boxxx1"  style="display: none;">
                <h2>Personal Information</h2>
                <form action="">
    <div class="form-group">
        <input type="text" id="name" name="name" placeholder="Loading name...">
    </div>
    <div class="form-group">
        <input type="tel" id="phone" name="phone" placeholder="8179145022" disabled>
    </div>
    <div class="form-group">
        <input type="email" id="email" name="email" placeholder="Loading email..." disabled>
    </div>
</form>
<script>
    // Fetch data from backend
    fetch('api/info.php')
        .then(response => response.json())
        .then(data => {
            // Update placeholder with fetched data
            document.getElementById('name').placeholder = data.name;
            document.getElementById('email').placeholder = data.email;
        })
        .catch(error => {
            console.error('Error fetching user info:', error);
        });
</script>
                <h2>Change Password</h2>
<form id="password-form" action="javascript:void(0);">
    <div class="form-group">
        <input type="password" id="old-password" name="old-password" placeholder="Old Password" required>
    </div>
    <div class="form-group">
        <input type="password" id="new-password" name="new-password" placeholder="New Password" required>
    </div>
    <div class="form-group">
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
    </div>
    <div class="form-group">
        <button type="submit" style="width: 200px; height: 40px; background: radial-gradient(circle, #0f5222 30%, #072b13 100%); color: white; border-radius: 10px; font-size: 1rem;">Change Password</button>
    </div>
    <p id="message" style="color: red; text-align:center; margin-top: 10px;"></p>
</form>

<script>
    document.getElementById('password-form').addEventListener('submit', async function(event) {
        event.preventDefault(); // Stop page reload

        const oldPassword = document.getElementById('old-password').value.trim();
        const newPassword = document.getElementById('new-password').value.trim();
        const confirmPassword = document.getElementById('confirm-password').value.trim();
        const message = document.getElementById('message');

        message.textContent = "";
        message.style.color = "red";

        if (newPassword !== confirmPassword) {
            message.textContent = "Passwords do not match.";
            return;
        }

        try {
            const formData = new FormData();
            formData.append('oldpassword', oldPassword);
            formData.append('newpassword', newPassword);
            formData.append('id', 'check');

            const response = await fetch('api/info.php', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            if (data.status === "success") {
                message.style.color = "green";
            } else {
                message.style.color = "red";
            }
            message.textContent = data.message;

        } catch (error) {
            console.error('Error:', error);
            message.style.color = "red";
            message.textContent = "Something went wrong.";
        }
    });
</script>

            </section>
            <!-- end- profile -->
            <section id="boxxx2" style="display:none;">
                <h2>Address</h2>
                <div class="address-container" id="address-con"></div>
                <!-- //address-details-page -->
                <script>
                    function loadAddresses() {
                        fetch("api/address.php")
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const container = document.getElementById("address-con");
                                    container.innerHTML = "";

                                    data.data.forEach(item => {
                                        container.innerHTML += `
        <div class="address-details">
          <ol>
              <li style="margin-bottom: 0.7rem;">
                  <span style="margin-right: 1rem; font-weight: bold">${item.name}</span>
                  <span style="margin-right: 1rem; font-weight: bold">${item.mobile}</span>
              </li>
              <li><span>${item.address} </span></li>
              <li><span>${item.city}, ${item.state} - ${item.pincode}</span></li>
          </ol>
          <div class="a-l">
            <i class="bi bi-trash delete-icon" data-id="${item.id}" style="cursor:pointer;" onclick="deleteAddress(event)"></i>
          </div>
        </div>
        <hr>
      `;
                                    });
                                } else {
                                    console.error("Failed to fetch addresses");
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                            });
                    }

                    // Call it once when page loads
                    loadAddresses();
                </script>

                <!-- adding address -->

                <div class="add-address"
                    style="position:relative; padding: 30px 10px; display: flex; align-items: center;">
                    <i class="bi bi-plus" onclick="showAddressInfo()"
                        style="border:1px solid black; margin-right:20px; border-radius:5px; "></i>
                    <h2 style="margin-top: 20px;"> ADD ADDRESS</h2><i class='bx bx-x co' onclick="closeAddressInfo()"
                        style="position:absolute; right:20px; display:none;"></i>
                </div>
                <div class="address-info" style="display:none;">
                    <form class="address-form" onsubmit="submitAddress(event)">
                        <div class="row">
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="text" name="mobile" placeholder="10-digit mobile number" required>
                        </div>
                        <div class="row">
                            <input type="text" name="pincode" placeholder="Pincode" required>
                            <input type="text" name="locality" placeholder="Locality" required>
                        </div>
                        <div class="row full">
                            <input type="text" name="address" placeholder="Address (Area and Street)" required>
                        </div>
                        <div class="row">
                            <input type="text" name="city" placeholder="City/District/Town" required>
                            <input type="text" name="state" placeholder="State" required>
                        </div>
                        <div class="row">
                            <input type="text" name="landmark" placeholder="Landmark (Optional)">
                            <input type="text" name="altPhone" placeholder="Alternate Phone (Optional)">
                        </div>
                        <button class="add-btn" type="submit">Add Address</button>
                    </form>
                </div>
            </section>
            <section id="boxxx3"  style="display: none;">
                <h2>My Order</h2>
                <div class="ordercontiner ordercontineri"id="ordercontineri">
                  
                    

                </div>
            </section>
    

    </div>
    

    </div>


    <!-- ???mobile - view - data -->
    <div class="mobile-view-container">
        <div class="m-profile-container">
            <i class="bi bi-person"></i>
            <div class="profile-con">
                <span>Hello 👋</span><br>
                <h4>Dilip Kumar</h4>
            </div>
        </div>
        <div class="m-info-container">
            <li>
                <div class="m-t-first" onclick="showContainer('container1')">
                    <i class="bi bi-person"></i>
                    <h4>Account Details</h4>
                </div>
                <div class="m-b-first" onclick="showContainer('container2')">
                    <i class="bi bi-box"></i>
                    <h4>Order Details</h4>

                </div>

            </li>
            <li>
                <div class="m-t-second" onclick="showContainer('container3')">
                    <i class="bi bi-house"></i>
                    <h4>Address Details</h4>

                </div>
                <div class="m-b-second" onclick="showContainer('container4')">
                    <i class="bi bi-box-arrow-right"></i>
                    <h4>Logout</h4>

                </div>

            </li>

        </div>
        <div class="m-view-list">
            <div class="m-order-view" style="display: none;" id="container2">
                <h3 style="margin-bottom: 1rem;">Order Details</h3>
                <div class="m-order-container" id="order-containerrr">
                    
                </div>
            </div>
            <div class="m-address-view" style="display: none;" id="container3">
                <h2 style="margin-bottom: 1rem;">Address</h2>
                <div class="address-container" id="address-conn"></div>
                <!-- adding address -->
                <div class="add-address"
                    style="position:relative; padding: 30px 10px; display: flex; align-items: center;">
                    <i class="bi bi-plus" onclick="showAddressInfoo()"
                        style="border:1px solid black; margin-right:20px; border-radius:5px; "></i>
                    <h2 style="margin-top: 20px;"> ADD ADDRESS</h2><i class='bx bx-x co coo' onclick="closeAddressInfoo()"
                        style="position:absolute; right:20px; display:none;"></i>
                </div>
                <div class="address-info address-infoo" style="display:none;">
                    <form class="address-form" onsubmit="submitAddresss(event)">
                        <div class="row">
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="text" name="mobile" placeholder="10-digit mobile number" required>
                        </div>
                        <div class="row">
                            <input type="text" name="pincode" placeholder="Pincode" required>
                            <input type="text" name="locality" placeholder="Locality" required>
                        </div>
                        <div class="row full">
                            <input type="text" name="address" placeholder="Address (Area and Street)" required>
                        </div>
                        <div class="row">
                            <input type="text" name="city" placeholder="City/District/Town" required>
                            <input type="text" name="state" placeholder="State" required>
                        </div>
                        <div class="row">
                            <input type="text" name="landmark" placeholder="Landmark (Optional)">
                            <input type="text" name="altPhone" placeholder="Alternate Phone (Optional)">
                        </div>
                        <button class="add-btn" type="submit">Add Address</button>
                    </form>
                </div>
                  

            </div>
            <div class="m-profile-view" style="display: none;" id="container1">
                <h2>Profile details</h2>
<form action="">

                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Dilip Kumar">

                    </div>
                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" placeholder="8179145022" disabled>
                    </div>
                    <div class="form-group">
                        <input type="email" id="phone" name="email" placeholder="dilipkumar775oct@gmail.com" disabled>
                    </div>

                
                <h2>Change Password</h2>
                <form id="password-formm" action="javascript:void(1);">
    <div class="form-group">
        <input type="password" id="old-passwordd" name="old-passwordd" placeholder="Old Password" required>
    </div>
    <div class="form-group">
        <input type="password" id="new-passwordd" name="new-passwordd" placeholder="New Password" required>
    </div>
    <div class="form-group">
        <input type="password" id="confirm-passwordd" name="confirm-passwordd" placeholder="Confirm Password" required>
    </div>
    <div class="form-group">
        <button type="submit" style="width: 200px; height: 40px; background: radial-gradient(circle, #0f5222 30%, #072b13 100%); color: white; border-radius: 10px; font-size: 1rem;">Change Password</button>
    </div>
    <p id="messages" style="color: red; text-align:center; margin-top: 10px;"></p>
</form>

<script>
    document.getElementById('password-formm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Stop page reload

        const oldPassword = document.getElementById('old-passwordd').value.trim();
        const newPassword = document.getElementById('new-passwordd').value.trim();
        const confirmPassword = document.getElementById('confirm-passwordd').value.trim();
        const message = document.getElementById('messages');

        message.textContent = "";
        message.style.color = "red";

        if (newPassword !== confirmPassword) {
            message.textContent = "Passwords do not match.";
            return;
        }

        try {
            const formData = new FormData();
            formData.append('oldpasswordd', oldPassword);
            formData.append('newpasswordd', newPassword);
            formData.append('id', 'checkk');

            const response = await fetch('api/info.php', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            if (data.status === "success") {
                message.style.color = "green";
            } else {
                message.style.color = "red";
            }
            message.textContent = data.message;

        } catch (error) {
            console.error('Error:', error);
            message.style.color = "red";
            message.textContent = "Something went wrong.";
        }
    });
</script>
            </div>
        </div>
    </div>
    <script>
        function loadAddresses() {
            fetch("api/address.php")
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const container = document.getElementById("address-conn");
                        container.innerHTML = "";

                        data.data.forEach(item => {
                            container.innerHTML += `
                                    <div class="address-details">
                                                        <ol>
                    <li style="margin-bottom: 0.7rem;">
                        <span style="margin-right: 1rem; font-weight: bold">${item.name}</span>
                        <span style="margin-right: 1rem; font-weight: bold">${item.mobile}</span>
                    </li>
                    <li><span>${item.address} </span></li>
                    <li><span>${item.city}, ${item.state} - ${item.pincode}</span></li>
</ol>
<div class="a-l">
<i class="bi bi-trash delete-icon" data-id="${item.id}" style="cursor:pointer;" onclick="deleteAddress(event)"></i>
</div>
</div>
<hr>
`;
                        });
                    } else {
                        console.error("Failed to fetch addresses");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }

        // Call it once when page loads
        loadAddresses();

        function showAddressInfo() {
            const addressForm = document.querySelector('.address-info');
            const closeInfo = document.querySelector('.co');

            if (addressForm) {
                addressForm.style.display = 'block';
            }
            if (closeInfo) {
                closeInfo.style.display = 'block';

            }
        }
        function showAddressInfoo() {
            const addressForm = document.querySelector('.address-infoo');
            const closeInfo = document.querySelector('.coo');

            if (addressForm) {
                addressForm.style.display = 'block';
            }
            if (closeInfo) {
                closeInfo.style.display = 'block';

            }
        }
        function closeAddressInfo() {
            const addressForm = document.querySelector('.address-info');
            const closeInfo = document.querySelector('.co');

            if (addressForm) {
                addressForm.style.display = 'none';
            }
            if (closeInfo) {
                closeInfo.style.display = 'none';

            }
        }
        function closeAddressInfoo() {
            const addressForm = document.querySelector('.address-infoo');
            const closeInfo = document.querySelector('.coo');

            if (addressForm) {
                addressForm.style.display = 'none';
            }
            if (closeInfo) {
                closeInfo.style.display = 'none';

            }
        }
        function submitAddress(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const addressFo = document.querySelector('.address-info');
            const closeInf = document.querySelector('.co');

            fetch("api/address.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Address added successfully!");
                        form.reset();
                        addressFo.style.display = 'none';
                        closeInf.style.display = 'none';

                        loadAddresses(); // 🔥 Refresh the address list
                    } else {
                        alert("Failed to add address.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
        function submitAddresss(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const addressFo = document.querySelector('.address-infoo');
            const closeInf = document.querySelector('.coo');

            fetch("api/address.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Address added successfully!");
                        form.reset();
                        addressFo.style.display = 'none';
                        closeInf.style.display = 'none';

                        loadAddresses(); // 🔥 Refresh the address list
                    } else {
                        alert("Failed to add address.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }

        function deleteAddress(event) {
            const addressId = event.target.getAttribute('data-id');

            if (confirm('Are you sure you want to delete this address?')) {
                fetch(`api/address.php?id=${addressId}`, {
                    method: 'DELETE',
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Address deleted successfully');
                            const card = event.target.closest('.address-details');
                            if (card) card.remove();
                        } else {
                            console.error('Error deleting address:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        function showContainer(containerId) {
            // Hide all containers
            const containers = document.querySelectorAll('div[id^="container"]');
            containers.forEach(container => {
                container.style.display = 'none';
            });

            // Show only the selected container
            const target = document.getElementById(containerId);
            if (target) {
                target.style.display = 'block';
            }
        }
        function showBox(id) {
  // List all box IDs
  const allBoxIds = ['boxxx1', 'boxxx2', 'boxxx3'];

  // Hide all boxes
  allBoxIds.forEach(boxId => {
    document.getElementById(boxId).style.display = 'none';
  });

  // Show the selected box
  document.getElementById(id).style.display = 'block';
}

//order fetcth data

fetch('api/order.php?mobile_id=8179145022')
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById('order-containerrr');
    data.orders.forEach(order => {
      const html = `
      <div class="m-order-details" style="position: relative;">
        <p style="text-align:end ; font-size: 0.7rem;">ID: ${order.order_id}</p>
        <div class="m-order-box">
          <img src="images/${order.product.image}" alt="" width="100px" height="100px">
          <div class="m-o-info">
            <h4 style="margin-bottom: 0.5rem;">${order.product.name}</h4>
            <p>${order.product.description}</p>
            <div class="m-par-t" style="margin-top: 0.4rem; margin-bottom: 0.5rem;">
              <span><strong> Quantity :</strong> ${order.quantity}</span>
              <span><strong> Count :</strong> ${order.count}</span>
            </div>
            <span><strong> Price :</strong> ₹ ${order.amount}</span>

            <div class="m-order-box4" style="margin-top: 1rem;">
              <li style="display: flex; align-items: center;">
                <img src="./images/tick.gif" alt="" width="30px">
                <span>Payment success, ${order.create_date}</span>
              </li>
              <li style="display: flex; align-items: center;">
                <img src="./images/tick.gif" alt="" width="30px">
                <span>Order Confirmed, ${order.create_date}</span>
              </li>
              <li style="display: flex; align-items: center;">
                <img src="./images/${order.status == 1 ? 'tracking.gif' : 'process.gif'}" alt="" width="25px" style="margin-left: 3px;">
                <span>${order.status == 1 ? 'Shipped' : 'Pending for Shipping'}</span>
              </li>
            </div>
          </div>

          <i class="bi bi-download" data-id="${order.order_id}" style="position: absolute; right: 10px; bottom: 10px; font-size: 1.5rem;"></i>
        </div>
      </div>
      `;
      container.innerHTML += html;
    });
  })
  .catch(error => console.error('Error:', error));

///order-second//
fetch('api/order.php?mobile_id=8179145022')
  .then(res => res.json())
  .then(data => {
    const container = document.querySelector('.ordercontineri');
    container.innerHTML = ''; // clear existing

    if (data.orders && Array.isArray(data.orders)) {
      data.orders.forEach(order => {
        const product = order.product || {};
        const statusText = order.status === 1 ? "Shipped" : "Pending for Shipping";
        const statusImg = order.status === 1 ? "tracking.gif" : "process.gif";

        const orderHTML = `
          <div class="order-box">
            <div class="order-box1">
              <img src="images/${product.image || 'default.png'}" alt="logo" width="100px" height="100px">
              <div class="order-box2">
                <h4>${product.name || 'No name'}</h4>
                <p>${product.description || 'No description'}</p>
                <div class="par-t">
                  <span><strong> Quantity :</strong> ${order.quantity} gms</span>
                  <span><strong> Count :</strong> ${order.count}</span>
                  <span><strong> Price :</strong> ₹ ${order.amount}</span>
                </div>
              </div>
            </div>
            <div class="order-box4">
              <li style="display: flex; align-items: center;">
                <img src="./images/tick.gif" alt="" width="30px">
                <span>Payment success, ${formatDate(order.create_date)}</span>
              </li>
              <li style="display: flex; align-items: center;">
                <img src="./images/tick.gif" alt="" width="30px">
                <span>Order Confirmed, ${formatDate(order.create_date)}</span>
              </li>
              <li style="display: flex; align-items: center;">
                <img src="./images/${statusImg}" alt="" width="25px" style="margin-left: 3px;">
                <span>${statusText}</span>
              </li>
            </div>
                          <div class="order-box3">
                <h4>Id: <span>${order.order_id}</span></h4>
                <button onclick="downloadInvoice('${order.order_id}')">INVOICE</button>
              </div>
          </div>
        `;
        container.innerHTML += orderHTML;
      });
    } else {
      container.innerHTML = '<p>No orders found.</p>';
    }
  })
  .catch(err => console.error('Error fetching orders:', err));

function formatDate(dateString) {
  const date = new Date(dateString);
  return `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth()+1).padStart(2, '0')}/${date.getFullYear()}`;
}

    </script>
    <script src="./js/scroll.js"></script>
    <script src="js/ani.js"></script>

</body>

</html>
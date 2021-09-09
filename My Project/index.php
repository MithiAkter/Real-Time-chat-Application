<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>REAL TIME CHAT APPLICATION</header>
            <form action="#" enctype="multipart/form-data"autocomplete="off">
                <div class="error-txt"></div>
                
                 <!-- fname-details -->
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>


                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email"placeholder="Enter your email-address" required>
                    </div>

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password"placeholder="Enter new Password" required>
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                    
             
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>



    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>




</body>
</html>
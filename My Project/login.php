<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>REAL TIME CHAT APPLICATION</header>
            <form action="#">
                <div class="error-txt"></div>
                
                 <!-- fname-details -->
                

                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email-address">
                    </div>

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your Password">
                        <i class="fas fa-eye"></i>
                    </div>

                    

                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                    
             
            </form>
            <div class="link">
                Not yet SignUp? <a href="index.php">SignUp now</a>
            </div>
        </section>
    </div>


    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>





</body>
</html>
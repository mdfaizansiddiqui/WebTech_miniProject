
<?php include($_SERVER['DOCUMENT_ROOT'].'/change_miniProject/includes/header.php') ?>  
<?php include($_SERVER['DOCUMENT_ROOT'].'/change_miniProject/includes/nav.php') ?>  

<style>
    #registration_box {
        width: 600px;
        margin: 0 auto;
        text-align: center;
        border: solid black;
        margin-top: 50px;
    }
    
    #mainWrap, img{
        height: auto;
        
    }
    
 

    .registration_heading {
        min-height: 20px;
        padding: 10px 20px 10px 20px;
        margin-bottom: 10px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }

    form {
        width: 100%;
        display: block;
    
    }

    .form_section {
        display: block;
        margin: 10px 0px;
        width: 100%;
        padding: 10px 10px;
        box-sizing: border-box;

    }

    .form_section label {
        display: block;
        width: 100%;
        text-align: left;
        font-weight: bold;
        padding: 0px 5px;
        margin-bottom: 5px;
    }

    .form_section .form-input {
        display: block;
        width: 100%;
        padding: 10px 10px;
        border-radius: 4px;
        outline: none;
        border: 1px solid #ccc;
    }

    #form_register {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
        outline: none;
        padding: 10px;
        display: block;
        height: 40px;
        width: 100%;
        font-size: 14px;
        font-weight: 400;
        text-align: center;
        border: 1px solid transparent;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .alertError{
       color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
        padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;

    }
    
    .alertSuccess{
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
       padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;

    }
    
    .alertArray{
        color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
        padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;

    }
    }
</style>

<div id="registration_box">
   
   <?php Validation() ?>
    <!--Registration Start-->
    <div class="registration_heading">
        <h1 class="text-center">Register:</h1>
    </div>

    <form action="" class="form" method="post">

        <div class="form_section">
            <label for="f_name">First Name:</label>
            <input type="text" class="form-input" name="firstName" placeholder="Your First Name" required>
        </div>

        <div class="form_section">
            <label for="l_name">Last Name:</label>
            <input type="text" class="form-input" name="lastName" placeholder="Your Last Name" required>
        </div>

        <div class="form_section">
            <label for="u_name">Username:</label>
            <input type="text" class="form-input" name="username" placeholder="Your Username" required>
        </div>

        <div class="form_section">
            <label for="u_email">Email:</label>
            <input type="email" class="form-input" name="email" placeholder="Your Email" required>
        </div>

        <div class="form_section">
            <label for="u_password">Password:</label>
            <input type="password" class="form-input pass_see" name="password" placeholder="Your Password" required>
        </div>

        <div class="form_section">
            <label for="u_confirm_pass">Confirm Pasword</label>
            <input type="password" class="form-input pass_see" name="confirmPassword" placeholder="Confirm Pasword" required>
        </div>

        <div class="form_section">

            <span class="text text-primary small">See Password: </span><input id="see_password" type="checkbox" value="check">

        </div>

        <div class="form_section">
            <input id="form_register" type="submit" class="btn btn-success form-control" name="register" value="Register">
        </div>
    </form>
</div>


<script>
    
    let switchP = document.getElementById("see_password");
    let seePass = document.querySelectorAll('.pass_see');
    
    switchP.onclick = function(){
           
            
            seePass.forEach((el) => { 
            if(switchP.checked){
            el.setAttribute('type', 'text');
        }else{el.setAttribute('type', 'password')}     
            });
        
            
    }


</script>
    <form class="theme-form" method="post" action="<?= base_url() ?>index.php/welcome/cashloginauth">
    
    <div style="
    width: 300px;
    height:400px;
    padding-top: 50px; 
    padding-left: 20px;
    padding-right: 20px; 
    padding-bottom: 5px;
    box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    border-radius: 10px;
    text-align:center;
    border:1px solid #0e8ce4;
    margin:auto;
    margin-top:50px;
    margin-bottom:50px;
    ";>
    
    <h3>Enter Details</h3>
    <div class="form-group">
    	<input type="text" placeholder="Enter Email/Cashon ID" class="form-control" id="username" name="username" required="required" 
        style="    
    width: 100%;
    height: 50px;
    margin-top: 20px;
    padding-left: 25px;
    border: solid 1px #e5e5e5;
    border-radius: 10px;
    outline: none;
    color: #0e8ce4;
    font-size:20px;">
     	</div>
         <div class="form-group">
         <input type="text" placeholder="Password" class="form-control" id="password" name="password" required="required" 
        style="    
    width: 100%;
    height: 50px;
    padding-left: 25px;
    border: solid 1px #e5e5e5;
    border-radius: 10px;
    outline: none;
    color: #0e8ce4;
    font-size:20px;
    margin-top:30px;
    margin-bottom:20px;
    ">
</div>
    <button type="submit" class="button contact_submit_button">Login</button>
    </div>
    </form>
<style>
    div.set{
font-size: 24px;
text-align:center;
padding:100px;
margin:170px 300px;
max-width:500px;
background:#f7f2f2;
border-radius:70px;
    }
    input{
        width:80%;
        padding:12px 20px;
        margin :8px 0;
        display:inline-block;
        border:1px solid black;
        border-radius:4px;
        box-sizing:border-box;
    }
</style>
<div class="set">Reset Password
<div>
    <form action="resetpassword.php" method="POST">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email" size=30px width="100% " required >
		              <p align="center">Remember password, you can <a href="login.php">Login</a> your account</p>
        <button type="submit"  name="Resetpassword">Get Password</button>
    </form>
</div>
</div>

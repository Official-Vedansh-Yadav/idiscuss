<!-- Login Modal -->
<div class='modal fade' id='loginmodal' tabindex='-1' aria-labelledby='loginmodalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
    <div class='modal-content'>
    <div class='modal-header'>
    <h5 class='modal-title' id='loginmodalLabel'>Login to iDiscuss</h5>
    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
    </div>
    <div class='modal-body'>
        <div class=container mt-3'>
        <form action = '<?PHP echo $_SERVER['REQUEST_URI'] ?>' method = 'POST'>
        <div class='mb-3'>
        <label for='login-email' class='form-label'>Email address</label>
        <input type='email' class='form-control' name='logemail' id='login-email'>
        <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
        </div>
        <div class='mb-3'>
        <label for='login-password' class='form-label'>Password</label>
        <input type='password' class='form-control' name='logpassword' id='login-password'>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
        </div>
        </form>
    </div>
    </div>
    </div>
</div>
<!-- Login Modal ends -->
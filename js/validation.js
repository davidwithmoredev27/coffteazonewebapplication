var Validation = function () {
    var submitButton = document.getElementById("submitbutton");
    var addSubmit = document.getElementById("addsubmit");

    // registration form validation form

    var checkforInputsRegister = function (e) {
        var newPassInput = document.getElementById("passwordnew");
        var newUsernameInput = document.getElementById("usernamenew");
        var confirmPassword = document.getElementById("confirmpassword");

        // check for possible empty fields

        if (newPassInput.value === "" && newUsernameInput.value === "" && confirmPassword.value === "" ) {
            alert("Fill up all the fields!");
            return false;
        } else if (newPassInput.value !== undefined && newUsernameInput.value === "" && confirmPassword.value === "") {
            alert("fill up username and confirm password!");
            return false;
        } else if (newPassInput.value=== "" && newUsernameInput.value !== undefined && confirmPassword.value === "") {
           alert('fill up password and confirmpassword!');
            return false;
        } else if (newPassInput.value === "" && newUsernameInput.value === "" && confirmPassword.value !== undefined) {
            alert ("fill up username and password!");
            return false;
        } else if (newPassInput.value !== undefined && newUsernameInput.value !== undefined && confirmPassword.value === "" ) {
            alert("fill up confirm password!");
            return false;
        } else if (newPassInput.value !== undefined && newUsernameInput.value === "" && confirmPassword.value !== undefined) {
            alert("fill up username!");
            return false;
        } else if (newPassInput.value !== undefined && newUsernameInput.value === "" && confirmPassword.value !== undefined) {
            alert("fill up password!");
            return false;
        } else if(newPassInput.value.length < 8) {
            alert("please use a a password with  minimum 8 characters!");
            return false;
        }
    };

    var checkforInputsLogin = function (e) {

        var passwordInput = document.getElementById("password");
        var usernameInput = document.getElementById("username");
        var xsstag = new RegExp("<script></script>");


        // check if all the values in login has been set to ! undefined
        if (passwordInput.value === "" && usernameInput.value === "") {
            alert("please fill up username and password field");
            return false;
        } else if (passwordInput.value === "" && usernameInput.value !== undefined) {
            alert("please fill up the password field");
             return false;
        } else if (passwordInput.value !== undefined && usernameInput.value === "") {
            alert("please fill up the username field");
            return false;
        }
        //e.preventDefault();
        // check for <script></script>
        if (xsstag.test(passwordInput.value) || xsstag.test(usernameInput.value)) {
            alert("theres an xss injection in the webpage");
        }
    };
    if (document.getElementById('submitbutton')) {
        submitButton.addEventListener("click", checkforInputsLogin , false);
    } else if (document.getElementById('addsubmit')) {
        addSubmit.addEventListener("click", checkforInputsRegister , false);
    }
   
};




var NotficationLogin = function () {
    var password = document.getElementById("password");
    var attempnotify = document.getElementById("attempnotify");
    var AttemptNotification = function() {
        attempnotify.style.backgroundColor = "red";
        attempnotify.style.display = "block";
    };


    password.addEventListener("keydown", AttemptNotification , false);

};

// set required validation on window onload
window.onload = function() {
    NotficationLogin();
    Validation();
};
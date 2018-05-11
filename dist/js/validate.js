function validateForm() {
	
    var username = document.forms["Register"]["username"].value;
    if (username == "") {
        alert("Username must be filled out");
        return false;
    }
	var firstname = document.forms["Register"]["first_name"].value;
    if (firstname == "") {
        alert("First Name must be filled out");
        return false;
    }
	var lastname = document.forms["Register"]["last_name"].value;
    if (lastname == "") {
        alert("Last Name must be filled out");
        return false;
    }
	var gender = document.forms["Register"]["gender"].value;
    if (gender == "") {
        alert("Gender must be filled out");
        return false;
    }
	var mail = document.forms["Register"]["email"].value;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!mail.match(mailformat)) {
        alert("Please Enter a Valid Email Address");
        return false;
    }
	var password = document.forms["Register"]["password"].value;
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
	
}
function validate(){
	var password =$('.inputc1').val();

	var checkpass=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
	if(password.match(checkpass))
	{
		return true;
	}
	else
	{
		alert("Length of Password is invalid");
		return false;
	}
}
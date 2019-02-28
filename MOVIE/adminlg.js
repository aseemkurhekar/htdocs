$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('nav').addClass('fixed-header');
    }
    else {
       $('nav').removeClass('fixed-header');
    }
});

var count=2;

function validate( ){
	var un=document.login.username.value;
	var pw=document.login.pwd.value;
	var valid=false;
	var username=["ACEadmin"];
	var password=["nimdaECA"];

	var(i=0;i<username.lenght; i++)
	{
		if((un == username[i]) && (pw == password[i]))
		{
			valid=true;
			break;
		}
	}
	if(valid)
	{
		alert("Login Successful");
		window.location="admin.php";
		return false;
	}
	var again = "tries";
	if(count==1)
	{
		again="try"
	}
	if(count>=1)
	{
		alert("Wrong Username or Password");
		count--;
	}
}
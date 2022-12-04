window.onload=function(){
    
    var save=document.querySelector("#button");

    save.addEventListener("click", process);
    
    function process(e){
        alpha=/^[A-Za-z]+$/ ;
        pass=/^[0-9A-Za-z]/;
        emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let valid = 0;
        e.preventDefault();
        var fname=document.querySelector("#fname").value.trim();
        var lname=document.querySelector("#lname").value.trim();
        var email=document.querySelector('#email').value.trim();
        var password=document.querySelector("#password").value.trim();
        var role=document.querySelector("#role").value;
       
        console.log(fname,lname,email,password,role);

        if (!fname.match(alpha)){
            document.querySelector("#fname").style.borderColor="red";
            return;
        }
        else{
            console.log('First name worked');
            valid = valid + 1;
            document.querySelector("#fname").style.borderColor="black";
        }

        if (!lname.match(alpha)){
            document.querySelector("#lname").style.borderColor="red";
            return;
        }
        else{
            console.log('Last name worked');
            valid = valid + 1;
            document.querySelector("#lname").style.borderColor="black";
        }

        if (!email.match(emailcheck)){
            document.querySelector("#email").style.borderColor="red";
            return;
        }
        else{
            console.log('Email worked');
            valid = valid + 1;
            document.querySelector("#email").style.borderColor="black";
        }
        if (!password.match(pass)){
            document.querySelector("#password").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#password").style.borderColor="black";
        }

        if (valid == 4){
            const xhr = new XMLHttpRequest();
            console.log('Worked! Valid = 4');
            xhr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("show").innerHTML = this.responseText;
                    console.log('Went to php');
                    console.log(this.responseText)
                }
                else{
                    document.getElementById("show").innerHTML="There was a problem with the request";
                }
            }
        
            xhr.open('GET', 'newuser.php?fname='+ fname + "&lname=" + lname + "&email=" + email + "&password=" + password +"&role=" + role, true);
            
            xhr.send();
        }

    }

}

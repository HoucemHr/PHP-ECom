


function getXMLHTTPRequest(){
    var xhr = null;
    try {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (error) {
        xhr = new XMLHttpRequest();
        
    }
    return xhr;
}



//Handling inputs in login form
document.getElementById("testjs").addEventListener("click", function(){
    let user = {
        "email" : document.getElementById("emailInput").value,
        "pass" : document.getElementById("passwordInput").value
    }

    if(user["email"] === ""){
        document.getElementById("message").innerHTML = "<span id = emptymail >Make Sure To Supply An Email</span>";
        setTimeout(function(){document.getElementById("emptymail").remove();}
        , 1200);
    }
    else if(user["pass"] === ""){
        document.getElementById("message").innerHTML = "<span id = emptypass >Make Sure To Supply A Password</span>";
        setTimeout(function(){document.getElementById("emptypass").remove();}
        , 1200);
    }
    else{
        fetch("/Myproject/Conf/processing1.php", {
            "method" : "POST",
            "headers" : {
                "Content-Type" :"application/json; charset =utf-8"
            },
            "body":JSON.stringify(user)}

        ).then(function(response){
            return response.text();
        }).then(function(data){
            if(data.trim() === "0"){
                document.getElementById("message").innerHTML = "<span id = wrongcomb >No Such Email/Password Combination Found !</span>";
                setTimeout(function(){document.getElementById("wrongcomb").remove();}
                , 1200);
            }
            
        })
    }
}) ;





document.getElementById("becomeamember").addEventListener("click", function(){
    let user = {
        "email" : document.getElementById("registeremail").value,
        "pass" : document.getElementById("registerpassword").value,
        "fname" : document.getElementById("registerfname").value,
        "lname" : document.getElementById("registerlname").value
    }
    if(user["email"] == ""){
        console.log("empty mail");
        document.getElementById("registermessage").innerHTML = "<span id =emptyrmail >Make Sure To Supply An Email</span>";
        setTimeout(function(){document.getElementById("emptyrmail").remove();}
        , 1200);


    }else if(user["pass"] == ""){
        document.getElementById("registermessage").innerHTML = "<span id =emptyrpass >Make Sure To Supply A Password</span>";
        setTimeout(function(){document.getElementById("emptyrpass").remove();}
        , 1200);
    
    
    
    }else if(user["fname"] == ""){
        document.getElementById("registermessage").innerHTML = "<span id ='emptyfname'>Make Sure To Supply Your First Name</span>";
        setTimeout(function(){document.getElementById("emptyfname").remove();}
        , 1200);
    
    
    
    }else if(user["lname"] == ""){
        document.getElementById("registermessage").innerHTML = "<span id =emptylname >Make Sure To Supply Your Last Name</span>";
        setTimeout(function(){document.getElementById("emptylname").remove();}
        , 1200);
    }else{
    
        fetch("/Myproject/Conf/processing2.php", {
            "method" : "POST",
            "headers" : {
                "Content-Type" :"application/json; charset =utf-8"
            },
            "body":JSON.stringify(user)}
        ).then(function(response){
            return response.text();
        }).then(function(data){
            //using trim because included files might contain whitespaces wchich will be included in our text response
            if(data.trim() == "Found"){
                document.getElementById("registermessage").innerHTML = "<span id = existant >This Email Is Already Registered</span>";
                setTimeout(function(){document.getElementById("existant").remove();}
                , 1200);
            }
            else if(data.trim() == "Success"){
                window.location.href = "/Myproject/index.php";
            }
            else{
                
                console.log("Something is not right, data =" + data);
            }
            
        })
    }
}) ;
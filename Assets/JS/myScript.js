


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
        fetch("/Myproject/index.php", {
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
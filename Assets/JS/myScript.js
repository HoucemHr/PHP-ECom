


function getXMLHTTPRequest(){
    var xhr = null;
    try {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (error) {
        xhr = new XMLHttpRequest();
        
    }
    return xhr;
}

document.getElementById("testjs").addEventListener("click", function(){
    let user = {
        "email" : document.getElementById("emailInput").value,
        "user" : document.getElementById("passwordInput").value
    }
    fetch("/Myproject/index.php", {
        "method" : "POST",
        "headers" : {
            "Content-Type" :"application/json; charset =utf-8"
        },
        "body":JSON.stringify(user)}

    ).then(function(response){
        return response.text();
    }).then(function(data){
        console.log(data);
    })
}) ;
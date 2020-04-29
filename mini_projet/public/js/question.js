const inputs=document.getElementsByTagName('input');
for(input of inputs){
    input.addEventListener("keyup", function(e){
        if(e.target.hasAttribute("error")){
            var idDivError=e.target.getAttribute("error")
            document.getElementById(idDivError).innerText="";
        }
    })
}

document.getElementById('questionnaire').addEventListener("submit", function(){
    const inputs=document.getElementsByTagName('input');
    var error=false
    for(input of inputs){
        if(input.hasAttribute("error")){
            var idDivError=input.getAttribute("error")
                if(!input.value){
                    document.getElementById(idDivError).innerText="ce champs est obligatoire";
                    error=true  
            }
            
        }
    }
if(error){
    e.preventDefault();
    return false
}

});


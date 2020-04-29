<?php
$message='';
 if(isset($_POST['enregistrer'])){
    if(!empty($_POST) && $_POST['nbrPoint']>=1){
        $tab=[];
        unset($_POST['enregistrer']);
        $tab=$_POST;
        $data=getQuestion();
        $data[]=$tab;
        $data=json_encode($data);
        file_put_contents("./data/question.json", $data);
        echo'<p style="red">donnee enregistre avec succés</p>';
    }else{
        $message='Tous les champs sont obligatoires';
    }
}
?>
<div class="theme">PARAMETRER VOTRE QUESTION</div>
<div class="bordure">
    
    <!-- <p style="color:red" id="error"><?=$message?></p> -->
    <form action="" method="post" id="questionnaire"><br><br>
            <div>
                <label for="" >questions</label>
                <textarea name="question" id="question" cols="50" rows="8" error="error-1" class="txtaera"></textarea><br>
                <div class="error-form" id="error-1"></div>
            </div>
            <div>
                <label for="">Nbre de Points</label>
                <input type="number"  min="1" value="" class="inputNum" id="nbrPoint" error="error-2" name="nbrPoint"><br>
                <div class="error-form" id="error-2"></div>
            </div>
            <div id="inputs">
                 <div class="row" id="row_0">
                    <label for="">Type de reponse</label>
                    <select name="TypeReponse" id="choix" class="champSelect" error="error-3">
                        <option value="" selected>donnez le type votre reponse</option>
                        <option value="simple">choix simple</option>
                        <option value="multiple">choix multiple</option>
                        <option value="texte">type texte</option>
                    </select>
                    <button type="button" style="border:none; background-color:white;" name="" id="" onclick="onAddInput()"><img src="./public/Icônes/ic-ajout-réponse.png" alt="" style="width:30px; height:30px;"></button>
                    <div class="error-form" id="error-3"></div>
                </div>
            </div>
            <input type="submit" value="enregistrer" class="enregistrer" name="enregistrer" id="enregistrer"> 
        
    </form>
</div>
<script src="./public/js/question.js"></script>
<script>

document.getElementById("questionnaire").addEventListener("submit",function(e){
    var textaera = document.getElementById("question");
    var nbrPoint = document.getElementById("nbrPoint");
    if(!textaera.value){
        error='veuiller renseigner une question';
    }
    if(!nbrPoint.value){
        error='veuiller renseigner le nombre de point';
    }
 
if(error){
     e.preventDefault();
     document.getElementById("error").innerHTML= error;
    return false
}

});



    // validation des champs
// document.forms["questionnaire"].addEventListener("submit", function(e){
//     var erreur
//     var inputs = this;
//     for(var i=0; i < inputs.length; i++){
//         if (!inputs[i].value){
//             erreur= "Veuillez remplir toutes les champs";
//         }
//     }
// if(erreur){
//     e.preventDefault();
//     document.getElementById("erreur").innerHTML=erreur;
//     return false;
// }
// // else{
// //     alert("questionnaire enregistree !!");
// // }
// });
// generation des champs
    var nbrRow=0;
         function onAddInput(){
            nbrRow++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            var selectOption= document.getElementById("choix");
            newInput.setAttribute('class','row');
            newInput.setAttribute('id','row_'+nbrRow);
            if(selectOption.value==='simple'){
                newInput.innerHTML = `
                    <label>reponse${nbrRow}</label>
                    <input type="text" name="choixsimple" class="champInput">
                    <input type="radio" name="radio" id="" class="inputChoix">
                    <button type="button" name="" id="" onclick="onDeleteInput(${nbrRow})" style="border:none; background-color:white;">
                        <img src="./public/Icônes/ic-supprimer.png" alt="" style="width:30px; height:30px;">
                    </button>
                    `;
                divInputs.appendChild(newInput); 
            }
            if(selectOption.value==='multiple'){
                newInput.innerHTML = `
                    <label>reponse${nbrRow}</label>
                    <input type="text" name="choixmultiple" id="reponse${nbrRow}" class="champInput">
                    <input type="checkbox" name="checkbox[]" id="" class="inputChoix"> 
                    <button type="button" name="" id="" onclick="onDeleteInput(${nbrRow})" style="border:none; background-color:white;">
                        <img src="./public/Icônes/ic-supprimer.png" alt="" style="width:30px; height:30px;">
                    </button>

                    `;
                divInputs.appendChild(newInput); 
            }
            if(selectOption.value==='texte'){
                newInput.innerHTML = `
                    <label>reponse${nbrRow}</label>
                    <input type="text" name="choixtext" class="champInput"> 
                    <button type="button" name="" id="" onclick="onDeleteInput(${nbrRow})" style="border:none; background-color:white;" >
                    <img src="./public/Icônes/ic-supprimer.png" alt="" style="width:30px; height:30px;">
                    </button>
                    `;
                divInputs.appendChild(newInput); 
            }
        }
function onDeleteInput(n){
    var target = document.getElementById('row_'+n);
    setTimeout(function(){
        target.remove();
    }, 1500);
    fadeOut('row_'+n)
}
function fadeOut(idTarget){
    var target = document.getElementById(idTarget);
    var effect=setInterval(function(){
        if(!target.style.opacity){
            target.style.opacity=1;
        }
        if(target.style.opacity>0){
            target.style.opacity=0.1;
        }else{
            clearInterval(effect);
        }
    }, 200);
}
</script>

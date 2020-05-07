<?php
$message='';
 if(isset($_POST['enregistrer'])){
    if(!empty($_POST) && $_POST['nbrPoint']>=1){      
        $TypeReponse=$_POST['TypeReponse'];
        if($TypeReponse=='multiple'){
            $choix=$_POST['choix'];
        }elseif($TypeReponse=='simple'){
            $choix=$_POST['choix'];
        }else{
            $choix="";
        }
        $tab=[
            'question'=>$_POST['question'],
            'nbrPoint'=>$_POST['nbrPoint'],
            'TypeReponse'=>$_POST['TypeReponse'],
            'reponse'=> $_POST['reponse'],
            'choix'=> $choix
        ];
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
                    <button type="button" style="border:none; background-color:white;" name="" id="ajout" onclick="onAddInput()"><img src="./public/Icônes/ic-ajout-réponse.png" alt="" style="width:30px; height:30px;"></button>
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


// generation des champs
    var nbrRow=0;
         function onAddInput(){
            nbrRow++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            var choix= document.getElementById("choix");
            newInput.setAttribute('class','row');
            newInput.setAttribute('id','row_'+nbrRow);
            if(choix.value==='simple'){
                newInput.innerHTML = `
                    <label>reponse${nbrRow}</label>
                    <input type="text" name="reponse[]" id="choixsimple${nbrRow}" class="champInput">
                    <input type="radio" name="choix[]" value="${nbrRow-1}" class="inputChoix">
                    <button type="button" name="" id="" onclick="onDeleteInput(${nbrRow})" style="border:none; background-color:white;">
                        <img src="./public/Icônes/ic-supprimer.png" alt="" style="width:30px; height:30px;">
                    </button>
                    `;
                divInputs.appendChild(newInput); 
            }
            if(choix.value==='multiple'){
                newInput.innerHTML = `
                    <label>reponse${nbrRow}</label>
                    <input type="text" name="reponse[]" id="reponse${nbrRow}" class="champInput">
                    <input type="checkbox" name="choix[]" value="${nbrRow-1}" class="inputChoix"> 
                    <button type="button" name="" id="" onclick="onDeleteInput(${nbrRow})" style="border:none; background-color:white;">
                        <img src="./public/Icônes/ic-supprimer.png" alt="" style="width:30px; height:30px;">
                    </button>
                    `;
                divInputs.appendChild(newInput); 
            }

                if(choix.value==='texte'){
                    newInput.innerHTML = `
                        <label>reponse${nbrRow}</label>
                        <input type="text[]" name="reponse" id="reponse${nbrRow}" class="champInput"> 
                        <button type="button" onclick="onDeleteInput(${nbrRow})" style="border:none; background-color:white;" >
                        <img src="./public/Icônes/ic-supprimer.png" alt="" style="width:30px; height:30px;">
                        </button>
                        `;
                    document.getElementById("ajout").disabled=true;
                    divInputs.appendChild(newInput); 
                 }           
        }
     
function onDeleteInput(n){
    var target = document.getElementById('row_'+n);
    setTimeout(function(){
        target.remove();
    }, 1500);
    fadeOut('row_'+n);
}
function fadeOut(idTarget){
    var target = document.getElementById(idTarget);
    var effect=setInterval(function(){
        if(!target.style.opacity){
            target.style.opacity=1;
        }
        if(target.style.opacity>0){
            target.style.opacity-=0.1;
        }else{
            clearInterval(effect);
        }
    }, 200);
}
</script>

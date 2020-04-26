<?php
$message='';
if(isset($_POST['enregistrer'])){
    $question=$_POST['question'];
    $nbrPoint=$_POST['nbrPoint'];
    $TypeReponse=$_POST['TypeReponse'];
    $reponse=$_POST['reponse'];
    if(empty($question) && empty($nbrPoint) && empty($TypeReponse) && empty($reponse)){
        $message='tous les champs sont obligatoires';
    }else{
        $data=getQuestion();
        if($nbrPoint<1){
            $message='veuillez saisir un nbre superieur ou egale a 1';
        }else{
            $tabQuestion=[
                'question'=>$question,
                'nbrPoint'=>$nbrPoint,
                'TypeReponse'=>$TypeReponse,
                'reponse'=>$reponse
            ];
            if(!empty($tabQuestion)){
                $data[]=$tabQuestion;
                $data=json_encode($data);
                file_put_contents("./data/question.json", $data);
                echo'<p style="red">donnee enregistre avec succés</p>';
            }
        }
    }
}
?>
<div class="theme">PARAMETRER VOTRE QUESTION</div>
<div class="bordure">
<?=$message?>
    <form action="" method="post" id="questionnaire"><br><br>
    <div id="inputs">
        <label for="" >questions</label>
        <textarea name="question" id="" cols="50" rows="8" class="txtaera"></textarea><br>
        <label for="">Nbre de Points</label>
        <input type="number" class="inputNum" name="nbrPoint"><br>
        <label for="">Type de reponse</label>
        <select name="TypeReponse" id="">
                <option value="">donnez le type votre reponse</option>
                <option value="">choix simple</option>
                <option value="">choix multiple</option>
                <option value="">choix commentaire</option>
        </select>    <img src="./public/Icônes/ic-ajout-réponse.png" alt="" style="width:50px; height:50px;"><br>
        
            <div class="row"> 
                <label for="">Reponse 1</label>
                <input type="text" name="reponse" id="" class="inputQ" >
                <input type="submit" value="ajouter" class="h" onclick="onAddInput()">
            </div>
            <!-- <div class="row"> 
                    <button type="submit" class="h">ajouter</button><input type="radio" class="inputChoix">
            </div> -->
        </div>
        <!-- <input type="radio" class="inputChoix"> -->
        <!-- <input type="checkbox" name="" id="" class="inputChoix"><img src="./public/Icônes/ic-supprimer.png" alt=""><br><br><br><br> -->
      <div class=""> <input type="submit" value="enregistrer" class="enregistrer" name="enregistrer" id="enregistrer"></div> 

    </form>
</div>
<script src="./public/js/question.js"></script>
<!-- <script>
function onAddInput(){
    var divInputs
}
</script> -->
// document.getElementById("questionnaire").addEventListener("submit", function(e){
//     var error=""
//     var inputs= document.getElementsByTagName("input")
//         for ( input of inputs) {
        
//         }
//     e.preventDefault();
// })
















function onAddInput() {
    var divInputs = document.getElementById('inputs');
    var newInput= document.createElement('div');
    // newInput.setAttribute('class','row');
    newInput.innerHTML=`
        <label for="">Reponse 1</label>
        <input type="text" name="reponse" id="" class="inputQ">
        `;
    divInputs.appendChild(newInput);
}
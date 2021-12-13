<script>

idValue = document.querySelectorAll('#send');
let userFrom = '<?= $_SESSION['id'] ?>';
let userTo = '<?= $data['data'] ?>';
let inputMessage = document.getElementById('message');

idValue.forEach((input) => {
    input.addEventListener('click', (e) =>{
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        xhr.open('GET','http://localhost:8002/new-message?user-to='+userTo+'&message='+inputMessage.value,true);    
        xhr.send(xhr);
        
    });
});

let conn = new WebSocket('ws://localhost:8080');
    
conn.onopen = function(e) {
    //console.log("Connection established!");
};

conn.onmessage = function(e) {
//    console.log(e.data);
    showMessages('other', e.data);
};

let form = document.getElementById('form-messages');
let inputMessage = document.getElementById('message');
let inputName = '<?= $_SESSION['id'] ?>';
let inputNameTo = '<?= $data['data'] ?>';
let buttonSend = document.getElementById('send');
let areaContent = document.getElementById('messages');

buttonSend.addEventListener('click', function(e) {
    e.preventDefault();
    if(inputMessage != ''){
        let message = { 'name': inputName, 'message': inputMessage.value, 'user_to': inputNameTo };
        message = JSON.stringify(message);

        let sessionMessage = sessionStorage.setItem('messages', inputMessage.value);

        conn.send(message, sessionMessage);

        showMessages('me', message);

        inputMessage.value = '';

    }
});


function showMessages(how, data){
    data = JSON.parse(data);

    if(how == 'me'){
        var originalElement = document.querySelector('.message-from');
    }
    else if(how == 'other'){
        var originalElement = document.querySelector('.message-to');
    }

    var elementClone = originalElement.cloneNode(true);
    document.getElementById(`messages`).append(elementClone);
    elementClone.querySelector('.box p').innerHTML = data.message;
    afterSending();

}

function afterSending(){
    var messageChat = document.getElementsByClassName("user-message").length;
    document.getElementsByClassName("user-message")[messageChat-1].scrollIntoView();
}

afterSending();

window.onload = afterSending();

</script>


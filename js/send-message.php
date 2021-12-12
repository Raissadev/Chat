<script>

idValue = document.querySelectorAll('#send');
var userFrom = '<?= $_SESSION['id'] ?>';
var userTo = '<?= $data['data'] ?>';
var inputMessage = document.getElementById('message');

idValue.forEach((input) => {
    input.addEventListener('click', (e) =>{
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        xhr.open('GET','http://localhost:8002/new-message?user-to='+userTo+'&message='+inputMessage.value,true);    
        xhr.send(xhr);
        
    });
});

var conn = new WebSocket('ws://localhost:8080');
    
conn.onopen = function(e) {
    //console.log("Connection established!");
};

conn.onmessage = function(e) {
//    console.log(e.data);
    showMessages('other', e.data);
};

var form = document.getElementById('form-messages');
var inputMessage = document.getElementById('message');
var inputName = '<?= $_SESSION['id'] ?>';
var inputNameTo = '<?= $data['data'] ?>';
var buttonSend = document.getElementById('send');
var areaContent = document.getElementById('messages');

buttonSend.addEventListener('click', function(e) {
    e.preventDefault();
    if(inputMessage != ''){
        var message = { 'name': inputName, 'message': inputMessage.value, 'user_to': inputNameTo };
        message = JSON.stringify(message);

        var sessionMessage = sessionStorage.setItem('messages', inputMessage.value);

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


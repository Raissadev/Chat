var aside = document.querySelector('aside.panel');
var body = document.body;

aside.style.minHeight = body + 'px';

//Link active
for(var i = 0; i < document.links.length; i++){
    if(document.links[i].href == document.URL){
        document.links[i].parentElement.classList.add('active');
    }
}

//Session message
setTimeout(function(){ 
    document.querySelector('.alert').remove();   
}, 3000);

//Toggle
var toggle = document.querySelectorAll('.toggle');
var aside = document.querySelector('aside.panel');

for(i = 0; i < toggle.length; i++){
    toggle[i].addEventListener('click', effectToggle);
};

function effectToggle(){
    if(aside.classList.contains('hide-device-small')){
        aside.classList.remove('hide-device-small');
    }else{
        aside.classList.add('hide-device-small');
    }
}
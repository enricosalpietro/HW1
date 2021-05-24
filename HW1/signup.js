function validazione(event){
    //verifica se le password inserite sono uguali
    if(form.password.value!==form.passwordDue.value){
        alert("Le password NON corrispondono");
        event.preventDefault();
    }
/*
    //verifica se tutti icampi sono rimepiti
    if(form.name.value.lenght==0 || 
       form.surname.value.lenght==0 ||
       form.email.value.lenght==0 ||
       form.password.value.lenght==0){
           alert("Compilare tutti i campi")
           event.preventDefault();
       }
    */   
       //check su email
       if(form.email.value.indexOf('@')==-1){
           alert("Errore email");
           event.preventDefault();
       }
}

function onText(result){
    console.log(result);
    if(result==1){
        alert("Username non disponibile, provane un altro");
        console.log(form.try);
        form.try.disable=true;
    }else{
        form.try.disable=false;
    }
}

function onResponse(res){
    return res.text();
}

function check_username_database(event){
	//cerchiamo nel database, tramite php, il dato username inserito.
	console.log(usr.value);
	console.log(fetch('search_username.php?username='+usr.value).then(onResponse).then(onText));
	
}

const form=document.forms['nome_form'];
form.addEventListener('submit',validazione);
const usr=form.username;
usr.addEventListener('blur',check_username_database);
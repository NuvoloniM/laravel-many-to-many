// seleziono tutti gli elementi con la stessa classe
const deleteForm = document.querySelectorAll('.delete-form');
// per ogni elementi dentro all'array creato aggiungo l'evento 
deleteForm.forEach( form => {
    form.addEventListener('submit', (e) => {
        // evito che al click reload la pagina 
        e.preventDefault();
        // creo allert di conferma
        const accept = confirm('Sei sicuro di voler eliminare il post?');
        // se si conferma l'evento e continua 
        if(accept) e.target.submit();
    });
});
$(document).ready( () =>{

    let containerEtapes = $('.container-etapes');

    let addNewEtape = $('<a href="#">Ajouter une nouvelle etape</a>');

    containerEtapes.append(addNewEtape);

    containerEtapes.data('index',containerEtapes.find('.card-photo').lenght);

    function addNewForm(){

        let prototype = containerEtapes.data('prototype');

       // console.log(prototype);
       let index = containerEtapes.data('index');

       //on cree le formulaire grace au prototype
        let newForm = prototype ;


        //on defiinit ici l'index du formulaire qui est cree.
        newform = newForm.replace(/__name__/g, index); //On definit ici l'index du formulaire qui est cree 

        //on fait l'increlentation de l'index
        containerEtapes.data('index',index+1);
        // console.log(newForm);

        //je cree une nouvelle card qui va contenir notre formulaire 
         let card = $('<div class="card-etape"></div>')

        //Ajout du formulaire à la card
         card.append(newForm) ;

        //ici on ajoute chaque card (chaque formulaire un bouton suppression)
         addRemoveButton(card);

         //Enfin,on ajoute la card avec le formulaire au DOM
       addNewEtape.before(card);


    }
   //on capte le click du bouton 'ajouter une Photo'
    addNewEtape.click(function (e) {
        e.preventDefault();

    addNewForm() ;
        
    });
    function addRemoveButton(card){
        //creation du bouton remove 
        let removeButton = $('<a href="#">Supprimer la photo</a>');
        //j'ajoute le bouton de suppresion
        card.append(removeButton);
        //A chaque click de mon bouton de suppression je souhaite supprimer la card qui a pour class '.card-photo'
        removeButton.click(function (e) {
            e.preventDefault();
            //je recupere le parent de mon bouton qui a la class '.card-photo'
            //j'utilise slideUp pour faire un effet de style et je souhaite supprimer la card en question 
            // $(e.target).parents('card-photo').slideUp(500,function () {
                $(this).remove();
            // })

            $(card).slideUp(500, function (){
                $(this).remove(); 
            })

        });
        
    }

    let images = 'https://www.transat.com/getmedia/b8a9b302-82fa-4c69-8555-caf555e3c70d/Paris_shutterstock_42153109.jpg.aspx?width=2048&height=1365&ext=.jpg';

    document.querySelector('laBoite').style.backgroundImage = "url(" + images+ ")";
    console.log(images)

})
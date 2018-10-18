class ConfirmClass {

    constructor() {


        this.initEventListeners();
    }


confirmPublish(){


 console.log('dsds');
    // Alerte canvas vide
    //var canvasSubmit = document.getElementById("sign").toDataURL();
    //var btnPublish = document.getElementById("confirmPublish");

    let response = confirm("Voulez-vous publier cet article? ");

   if ( response ) {
       console.log('ok')
   } else {
       console.log('cancel')
       event.preventDefault();
   }


}

    initEventListeners() {

        $(".publish_button").click(() => {
            this.confirmPublish()
        });
        // $("#confirm_button").click(() => {
        //     this.confirm()
        // });
        // $("#confirm_button").click(() => {
        //     this.emptyCanvas()
        // });
        //
        // this.resaCheck();
    }


}
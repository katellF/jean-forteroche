class ConfirmClass {

    constructor() {


        this.initEventListeners();
    }


    confirmPublish() {


        console.log('dsds');
        // Alerte canvas vide
        //var canvasSubmit = document.getElementById("sign").toDataURL();
        //var btnPublish = document.getElementById("confirmPublish");

        let response = confirm("Voulez-vous publier cet article? ");

        if (response) {
            console.log('ok')
        } else {
            console.log('cancel')
            event.preventDefault();
        }


    }

    confirmTrash() {


        console.log('dsds');
        // Alerte canvas vide
        //var canvasSubmit = document.getElementById("sign").toDataURL();
        //var btnPublish = document.getElementById("confirmPublish");

        let response = confirm("Voulez-vous mettre cet article dans la corbeille? ");

        if (response) {
            console.log('ok')
        } else {
            console.log('cancel')
            event.preventDefault();
        }


    }

    confirmDraft() {


        console.log('dsds');
        // Alerte canvas vide
        //var canvasSubmit = document.getElementById("sign").toDataURL();
        //var btnPublish = document.getElementById("confirmPublish");

        let response = confirm("Voulez-vous sauvegarder cet article dans les brouillons? ");

        if (response) {
            console.log('ok')
        } else {
            console.log('cancel')
            event.preventDefault();
        }


    }

    confirmDelete() {


        console.log('dsds');
        // Alerte canvas vide
        //var canvasSubmit = document.getElementById("sign").toDataURL();
        //var btnPublish = document.getElementById("confirmPublish");

        let response = confirm("Voulez-vous supprimer cet article? ");

        if (response) {
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

        $(".trash_button").click(() => {
            this.confirmTrash()
        });

        $(".draft_button").click(() => {
            this.confirmDraft()
        });

        $(".delete_button").click(() => {
            this.confirmDelete()
        });

    }


}
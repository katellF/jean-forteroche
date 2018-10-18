class ConfirmClass {

    constructor() {


        this.initEventListeners();
    }


    confirmPublish() {


        let response = confirm("Voulez-vous publier cet article? ");

        if (response) {
            console.log('ok')
        } else {
            console.log('cancel')
            event.preventDefault();
        }


    }

    confirmTrash() {


        let response = confirm("Voulez-vous mettre cet article dans la corbeille? ");

        if (response) {
            console.log('ok')
        } else {
            console.log('cancel')
            event.preventDefault();
        }


    }

    confirmDraft() {


        let response = confirm("Voulez-vous sauvegarder cet article dans les brouillons? ");

        if (response) {
            console.log('ok')
        } else {
            console.log('cancel')
            event.preventDefault();
        }


    }

    confirmDelete() {


        let response = confirm("Etes vous sûr de vouloir le supprimer? ");

        if (response) {
            console.log('ok');
        } else {
            console.log('cancel');
            event.preventDefault();
        }


    }

    confirmPending() {


        let response = confirm("Voulez-vous mettre ce commentaire en attente? ");

        if (response) {
            console.log('ok');
        } else {
            console.log('cancel');
            event.preventDefault();
        }

    }


     confirmApprove() {


            let response = confirm("Voulez-vous approuver ce commentaire? ");

         if (response) {
             console.log('ok');
         } else {
             console.log('cancel');
             event.preventDefault();
         }
     }

        confirmArchive() {


        let response = confirm("Voulez-vous archiver ce signalement? ");

        if (response) {
            console.log('ok');
        } else {
            console.log('cancel');
            event.preventDefault();
        }
    }

        confirmUnread() {


        let response = confirm("Voulez-vous remttre ce signalement en 'non lu'? ");

        if (response) {
            console.log('ok');
        } else {
            console.log('cancel');
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

        $(".pending_button").click(() => {
            this.confirmPending()
        });

        $(".approve_button").click(() => {
            this.confirmApprove()
        });

        $(".archive_button").click(() => {
            this.confirmArchive()
        });

        $(".unread_button").click(() => {
            this.confirmUnread()
        });

        $(".delete_button").click(() => {
            this.confirmDelete()
        });

    }


}
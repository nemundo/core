

// UrlManager
export default class UrlRedirect {

    redirect(url) {

        //window.open(url, '_blank').focus();
        //window.open(url, '_blank');
        window.open(url);

    }


    openNewTab(url) {

        //window.open(url, '_blank').focus();
        window.open(url, '_blank');

    }





    downloadFile(url) {
        window.location.assign(url);
    }


    reloadUrl() {

        window.location.reload(true);

    }


}
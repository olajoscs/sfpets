class Helpers {
    initUiComponents() {
        M.AutoInit();
    }

    toast(message) {
        M.Toast.dismissAll();
        M.toast({html: message})
    }
}

export default new Helpers();

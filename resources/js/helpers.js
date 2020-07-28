class Helpers {
    initUiComponents() {
        M.AutoInit();
    }

    toast(message) {
        M.toast({html: message})
    }
}

export default new Helpers();

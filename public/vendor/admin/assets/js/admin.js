class AdminApp {
    constructor() {
        this.init();
    }

    init() {
        this.ajaxSetup();
    }

    ajaxSetup() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    handleResponse(response) {
        switch (response.action) {
            case 'reload':
                location.reload();
                break;
            case 'redirect':
                window.location.href = response.url;
                break;
            default:
                break;
        }
    }
}

$(function () {
    window.admin = new AdminApp();
});

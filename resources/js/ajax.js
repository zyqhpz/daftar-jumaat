function routeToHome() {
    $.ajax({
        url: '/',
        method: 'get',
        success: function(data) {
            $('body').html(data);  
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}
function routeToSemak() {

    $.ajax({
        url: '/semak',
        method: 'get',
        success: function(data) {
            $('body').html(data);  
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}
function routeToDaftar() {

    $.ajax({
        url: '/daftar/giliran',
        method: 'get',
        success: function(data) {
            $('body').html(data);  
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}
function routeToBaru() {

    $.ajax({
        url: '/daftar/baru',
        method: 'get',
        success: function(data) {
            $('body').html(data);  
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
}
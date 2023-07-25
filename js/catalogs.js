import '../scss/catalogs.scss';

document.querySelectorAll(".file-download").forEach(fileCat => {
    fileCat.style.display = 'none';
});

document.addEventListener( 'wpcf7mailsent', function( event ) {
    document.querySelectorAll("form.wpcf7-form > :not(.wpcf7-response-output)").forEach(el => {
        el.style.display = 'none';
        document.querySelectorAll(".file-download").forEach(fileCat => {
            fileCat.style.display = 'block';
        });
    });
}, false );
document.addEventListener('hidden.bs.modal', function (event) {
    document.querySelectorAll("form.wpcf7-form > :not(.wpcf7-response-output)").forEach(el => {
        el.style.display = 'block';
        document.querySelectorAll(".file-download").forEach(fileCat => {
            fileCat.style.display = 'none';
        });
    });
});

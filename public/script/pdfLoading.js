window.onload = function() {
    var fullURL = window.location.href;
    splitedURL = fullURL.split('?')
    splitedURL[0] = splitedURL[0]+'/pdf'
    var newURL = splitedURL.join('?')
    displayPDF(newURL)
    
    function hideLoadingScreen() {
        var loadingScreen = document.getElementById("loading-screen");
        loadingScreen.style.display = "none";
    }

    function displayPDF(url) {
        var pdfContainer = document.getElementById("pdf-container");
        pdfContainer.style.display = "block";

        var pdfEmbed = document.createElement('embed');
        pdfEmbed.type = 'application/pdf';
        pdfEmbed.width = '100%';
        pdfEmbed.height = '100%';
        pdfEmbed.src = url;

        pdfEmbed.addEventListener('load', function() {
            console.log('PDF has finished loading.');
            hideLoadingScreen()
            // You can perform additional actions here once the PDF has loaded.
        });

        pdfContainer.appendChild(pdfEmbed);
        
    }
};

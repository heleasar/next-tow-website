document.addEventListener("DOMContentLoaded", function() {
    var currentIndex = 0;
    var images = [
        "/assets/logo2.png", // Ensure these paths are correct
        "/assets/tow2.png",
        "path/to/your/image3.jpg"
    ];
    var imgElement = document.getElementById('dynamicImage');

    // Function to change images
    function cycleImages() {
        imgElement.style.opacity = 0; // Fade out the current image

        // Delay changing the src to allow fade-out effect
        setTimeout(function() {
            if (imgElement) {
                imgElement.src = images[currentIndex];
                console.log("Changing src to: ", images[currentIndex]); // Log which image is being loaded

                imgElement.onload = function() {
                    console.log("Image loaded successfully"); // Confirm image has loaded
                    imgElement.style.opacity = 1; // Fade in the new image
                };
                imgElement.onerror = function() {
                    console.error("Failed to load image: ", images[currentIndex]); // Log load failure
                };

                currentIndex = (currentIndex + 1) % images.length; // Update index
            } else {
                console.error("imgElement not found in the document.");
            }
        }, 500);

        setTimeout(cycleImages, 4000); // Schedule the next change
    }

    // Initial call to start the cycle
    cycleImages();
});

function cycleImages() {
    console.log("Current Index: ", currentIndex);  // Log current index
    var imgElement = document.getElementById('dynamicImage');
    console.log("Current Src before update: ", imgElement.src);  // Log current source
    imgElement.src = images[currentIndex];
    console.log("Updated Src: ", imgElement.src);  // Log updated source
    currentIndex = (currentIndex + 1) % images.length;
    setTimeout(cycleImages, 4000); // Change image every 4 seconds
}


// Function to preload images
function preloadCarouselImages(imageUrls) {
  for (let i = 0; i < imageUrls.length; i++) {
    const img = new Image();
    img.src = imageUrls[i];
  }
}

// Array of image URLs to preload
const carouselImageUrls = [
  '/images/firstHotelImage.jpg',
  '/images/SecondHotelImage.jpg',
  '/images/ThirdHotelImage.jpg'
];

// Preload images
preloadCarouselImages(carouselImageUrls);


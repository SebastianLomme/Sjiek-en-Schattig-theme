import SwipeListener from "swipe-listener";

// Add your custom JS here.

// understrap-child-main/src/build/terser.config.json
// change drop_console: to true to remove console.console.log

// custom js for search box nav

const searchIconNav = document.getElementById("search-icon-nav");
const searchBoxNav = document.getElementById("search-box");

searchIconNav.addEventListener("click", () => {
    searchBoxNav.classList.toggle("hide");
});

// custom js for categorie carousel_items

const carouselTrack = document.querySelector(".categorie-grid");
let carouselTrackWidth = carouselTrack.scrollWidth;
const carouselWrapper = document.querySelector(".categorie-wrapper");
const listener = SwipeListener(carouselTrack);
listener.lockAxis = true;
const carouselItems = document.querySelectorAll(".categorie-card");
const carouselItemsArray = Array.from(carouselItems);
const dotsSection = document.querySelector(".dots-section");
const dots = Array.from(dotsSection.children);
const prevButton = document.querySelector(".prev-button");
const nextButton = document.querySelector(".next-button");
let scrollMax = carouselTrackWidth - carouselTrack.clientWidth;

// const resetSize = () => {
//     carouselTrackWidth = carouselTrack.scrollWidth;
//     scrollMax = carouselTrackWidth - carouselTrack.clientWidth;
//     console.log(carouselTrackWidth);
//     console.log(scrollMax);
// };

// window.onresize = resetSize;

const setFirstItem = () => {
    if (!carouselTrack.querySelector(".first-item")) {
        carouselItems[0].classList.add("first-item");
        dots[0].classList.add("active");
    }
};

setFirstItem();

const setActiveDot = (current, target) => {
    const indexCurrent = carouselItemsArray.findIndex(
        (item) => item === current
    );
    const indexTarget = carouselItemsArray.findIndex((item) => item === target);
    dots[indexCurrent].classList.remove("active");
    dots[indexTarget].classList.add("active");
};

const moveToSlide = (firstSlide, targetSlide) => {
    let amountToMove;
    if (targetSlide.offsetLeft > scrollMax) {
        amountToMove = scrollMax;
    } else {
        amountToMove = targetSlide.offsetLeft;
    }

    firstSlide.classList.remove("first-item");
    targetSlide.classList.add("first-item");
    carouselItems.forEach(
        (item) => (item.style.transform = `translateX(-${amountToMove}px)`)
    );
};

const moveToNext = () => {
    const firstSlide = carouselTrack.querySelector(".first-item");
    const nextSlide = firstSlide.nextElementSibling;
    const targetSlide = carouselItems[0];
    if (nextSlide) {
        moveToSlide(firstSlide, nextSlide);
        setActiveDot(firstSlide, nextSlide);
    } else {
        moveToSlide(firstSlide, targetSlide);
        setActiveDot(firstSlide, targetSlide);
    }
};

const moveToPrev = () => {
    const firstSlide = carouselTrack.querySelector(".first-item");
    const prevSlide = firstSlide.previousElementSibling;
    const targetSlide = carouselItems[carouselItems.length - 1];
    if (prevSlide) {
        moveToSlide(firstSlide, prevSlide);
        setActiveDot(firstSlide, prevSlide);
    } else {
        moveToSlide(firstSlide, targetSlide);
        setActiveDot(firstSlide, targetSlide);
    }
};

nextButton.addEventListener("click", moveToNext);

prevButton.addEventListener("click", moveToPrev);

carouselTrack.addEventListener("slide", moveToNext);

carouselTrack.addEventListener("swipe", (e) => {
    const directions = e.detail.directions;
    if (directions.left) {
        stopScroll();
        moveToNext();
        myInterval = null;
        startScroll();
    } else if (directions.right) {
        stopScroll();
        moveToPrev();
        myInterval = null;
        startScroll();
    }
});

dotsSection.addEventListener("click", (e) => {
    const targetDot = e.target.closest("div.dot");
    if (!targetDot) return;
    const firstSlide = carouselTrack.querySelector(".first-item");
    const targetIndex = dots.findIndex((dot) => dot === targetDot);
    const targetSlide = carouselItems[targetIndex];
    moveToSlide(firstSlide, targetSlide);
    setActiveDot(firstSlide, targetSlide);
});

// scroll effect for slider
let myInterval;

const moveScroll = () => {
    moveToNext();
};

const startScroll = () => {
    myInterval = setInterval(moveScroll, 3000);
};

const stopScroll = () => {
    clearInterval(myInterval);
    myInterval = null;
};

carouselWrapper.addEventListener("mouseover", () => {
    stopScroll();
});

carouselWrapper.addEventListener("mouseleave", () => {
    startScroll();
});

startScroll();

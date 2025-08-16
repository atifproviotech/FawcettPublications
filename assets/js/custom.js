import {
  animate,
  scroll,
} from "https://cdn.jsdelivr.net/npm/motion@12.23.12/+esm";

// Progress bar representing gallery scroll
scroll(animate(".progress", { scaleX: [0, 1] }, { ease: "linear" }));

document.querySelectorAll(".img-container").forEach((section) => {
  const header = section.querySelector("h2");
  scroll(animate(header, { y: [-400, 400] }, { ease: "linear" }), {
    target: header,
  });
});

//  Swipers

console.log("hello");

if (document.querySelector(".verticalSwiper")) {
  var swiper = new Swiper(".verticalSwiper", {
    slidesPerView: 1,
    spaceBetween: 100,
    direction: "vertical",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
}

if (document.querySelector(".genreSwiper")) {
  var swiper = new Swiper(".genreSwiper", {
    slidesPerView: 1,
    spaceBetween: 100,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
}


if (document.querySelector(".reviewSwiper")) {
  var swiper = new Swiper(".reviewSwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
}




if (document.querySelector(".portfolioSwiper")) {
  let obj = {
    flow: {
      title: "Flow",
      desc: "Immerse yourself in a tale of transformation and resilience. Follow a protagonist's journey through life's ebbs and flows in this deeply moving novel.",
      img: "/assets/images/flow.png",
    },
    superfunfacts: {
      title: "You Gotta Be Kidding Me",
      desc: "Super Fun Facts for Curious Kids: Spark young minds with explosive facts and incredible discoveries. Perfect for curious kids eager to learn and laugh in equal measure.",
      img: "/assets/images/superfunfacts.png",
    },
    palmetto: {
      title: "Palmetto",
      desc: "Unravel the mysteries of Palmetto, where Southern charm meets chilling suspense. Every twist and turn in this thriller is as unpredictable as a swamp's path.",
      img: "/assets/images/palmetto.png",
    },
    blacktides: {
      title: "Black Tides",
      desc: "Dive into a gripping thriller where dark secrets and relentless waves collide. Discover betrayal and redemption in the shadows of a coastal town.",
      img: "/assets/images/blacktides.png",
    },
  };

  let heading = document.querySelector("#portfolio-heading");
  let para = document.querySelector("#portfolio-para");
  let circle = document.querySelector(".portfolio-circle");

  var swiper = new Swiper(".portfolioSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      slideChange: function () {
        const activeSlide = this.slides[this.activeIndex];
        heading.innerHTML = obj[activeSlide.id].title;
        para.innerHTML = obj[activeSlide.id].desc;

        circle.style.animation = "circle-rotate 0.5s linear";
        circle.style.right = "230px";
        circle.style.transform = "rotate(-180deg)";
        circle.style.opacity = "1";
      },
    },
  });
}

//   Counter Animation

const counters = document.querySelectorAll(".counter");
const duration = 2000;

counters &&
  counters.forEach((counter) => {
    const target = +counter.getAttribute("data-target");
    let count = 0;
    const increment = target / (duration / 10);

    const updateCount = () => {
      count += increment;
      if (count < target) {
        counter.innerText = Math.floor(count);
        setTimeout(updateCount, 10);
      } else {
        counter.innerText = target;
      }
    };

    updateCount();
  });

//   3D Card Effect

const target = document.querySelector(".container-3d");
if (target) {
  const targetWidth = target.offsetWidth;
  const targetHeight = target.offsetHeight;
  const img = document.querySelector(".card-3d");

  target.addEventListener("mousemove", _3DEffect);

  target.addEventListener("mouseleave", () => {
    target.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg)`;
    img.style.clipPath = "inset(0 0 0 0)";
  });

  function _3DEffect(e) {
    const percentX = (e.offsetX * 100) / targetWidth;
    const percentY = (e.offsetY * 100) / targetHeight;
    const degX = percentX / 2.5 - 20;
    const degY = percentY / 2.5 - 20;
    const transform = `perspective(1000px) rotateX(${degY}deg) rotateY(${degX}deg)`;
    target.style.transform = transform;
  }

  // ========================
  document.querySelector(".card-3d").addEventListener("change", () => {
    target.removeEventListener("mousemove", splitTwoImg);
    target.addEventListener("mousemove", _3DEffect);
  });
}

// make follower follow

gsap.set(".follower", {
  xPercent: -50,
  yPercent: -50,
  opacity: 1,
});

window.addEventListener("mousemove", (e) => {
  gsap.to(".follower", {
    duration: 1.5,
    overwrite: "auto",
    x: e.clientX,
    y: e.clientY,
    stagger: 0.15,
    ease: "power3.out",
  });

  let TL = gsap.timeline({
    defaults: { duration: 0.5, ease: "none" },
  });

  TL.to(".follower", {
    scale: 1,
    overwrite: "auto",
    stagger: { amount: 0.15, from: "start", ease: "none" },
  });
  TL.to(
    ".follower",
    {
      overwrite: "auto",
      stagger: { amount: 0.15, from: "end", ease: "none" },
    },
    "<+=2.5"
  );
});

//animate follower when it hits a box
var follower = document.querySelector(".follower");
var followerText = document.querySelector(".follower__content");

let followerAnim = gsap.timeline({ paused: true, overwrite: true });
let followerLeave = gsap.timeline({ paused: true, overwrite: true });

followerAnim.to(
  follower,
  {
    width: "80px",
    height: "80px",
    //   backgroundColor: '#fff',
    duration: 0.15,
  },
  0
);
followerAnim.to(
  ".follower__inner",
  {
    //   backgroundColor: '#000',
    width: "80px",
    height: "80px",
    opacity: 1,
    duration: 0.15,
  },
  0.2
);
followerAnim.to(".follower__content", {
  height: "32px",
});

followerLeave.to(".follower__content", {
  height: "0",
  duration: 0.1,
});
followerLeave.to(follower, {
  width: ".5rem",
  height: ".5rem",
  //   backgroundColor: '#000',
  duration: 0.07,
});
followerLeave.to(".follower__inner", {
  //   backgroundColor: '#fff',
  width: 0,
  height: 0,
  opacity: 0,
  duration: 0.07,
});
followerLeave.to(follower, { clearProps: "width,height" });
followerLeave.to(".follower__inner", { clearProps: "width,height" });
followerLeave.to(followerText, { height: "0" });

function animateFollower(direction = "in") {
  // console.log(direction);
  if (direction == "in") {
    followerAnim.play(0);
  } else {
    followerLeave.play(0);
  }
}

document.querySelectorAll(".follow").forEach((item) => {
  item.addEventListener("mouseenter", (event) => {
    animateFollower("in");
  });

  item.addEventListener("mouseleave", (event) => {
    animateFollower("out");
  });
});

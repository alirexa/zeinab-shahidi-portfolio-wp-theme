import Swiper from 'swiper/bundle'
import 'swiper/swiper-bundle.css'

class ProjectSlider {
  constructor() {
    this.initSliders()
  }

  initSliders() {
    const gridItems = document.querySelectorAll('.grid-item')

    gridItems.forEach((item) => {
      const swiperContainer = item.querySelector('.swiper-container')
      const swiper = new Swiper(swiperContainer, {
        // loop: true,
        lazy: true,
        slidesPerView: 1,

        autoplay: {
          delay: 1500,
          reverseDirection: true,
        },
      })
      swiper.autoplay.stop()

      item.addEventListener('mouseenter', () => {
        swiper.autoplay.start()
      })

      item.addEventListener('mouseleave', () => {
        swiper.autoplay.stop()
      })

      item.addEventListener('focusin', () => {
        swiper.autoplay.start()
      })

      item.addEventListener('focusout', () => {
        swiper.autoplay.stop()
      })
    })
  }
}

export default ProjectSlider

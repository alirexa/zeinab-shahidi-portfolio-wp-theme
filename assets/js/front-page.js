import { gsap } from 'gsap'

class FrontPage {
  constructor() {
    if (!document.querySelector('.front-page')) return

    this.markerDotInside = document.querySelectorAll('.marker-dot-inside')
    this.markerDotOutside = document.querySelectorAll('.marker-dot-outside')
    this.info = document.querySelector('.info')
    this.desc = document.querySelector('.desc')
    this.mainHeader = document.querySelector('.site-header')
    this.mainFooter = document.querySelector('.site-footer')
    this.darkLayer = document.querySelector('.dark-layer')
    this.textDetailsDesktop = document.querySelector(
      '.selected-artwork.desktop .text-details',
    )
    this.textDetailsMobile = document.querySelector(
      '.selected-artwork.mobile .text-details',
    )
    this.imageDesktop = document.querySelector('.selected-artwork.desktop img')
    this.imageMobile = document.querySelector('.selected-artwork.mobile img')
    // this.imageDesktop = document.querySelector('.selected-artwork img')

    console.log(this.desc)

    this.init()
  }

  init() {
    console.log(this.desc)
    this.markerDotInside.forEach((dot) => {
      dot.addEventListener('mouseover', this.onMouseOver.bind(this))
      dot.addEventListener('touchstart', this.onMouseOver.bind(this))
    })

    this.markerDotInside.forEach((dot) => {
      addEventListener('mouseout', this.onMouseOut.bind(this))
    })

    this.updateTextDetailsPosition()
    window.addEventListener('resize', this.updateTextDetailsPosition.bind(this))
  }

  updateTextDetailsPosition() {
    const detailsEl =
      window.innerWidth < 768 ? this.textDetailsMobile : this.textDetailsDesktop
    const imageEl =
      window.innerWidth < 768 ? this.imageMobile : this.imageDesktop
    console.log(detailsEl)
    const focusPoint = {
      top: parseFloat(detailsEl.getAttribute('data-top')) / 100,
      left: parseFloat(detailsEl.getAttribute('data-left')) / 100,
    }
    // console.log(focusPointData)
    // const focusPoint = { top: 0.5, left: 0.5 } // Example: 50% from top and left
    // console.log(focusPoint)

    const imageRect = imageEl.getBoundingClientRect()
    console.log(imageRect)
    const imageNaturalWidth = imageEl.naturalWidth
    const imageNaturalHeight = imageEl.naturalHeight

    const containerAspectRatio = imageRect.width / imageRect.height
    const imageAspectRatio = imageNaturalWidth / imageNaturalHeight

    let visibleWidth, visibleHeight, offsetX, offsetY

    if (containerAspectRatio > imageAspectRatio) {
      // Image is cropped vertically
      visibleWidth = imageRect.width
      visibleHeight = imageRect.width / imageAspectRatio
      offsetX = 0
      offsetY = (imageRect.height - visibleHeight) / 2
    } else {
      // Image is cropped horizontally
      visibleWidth = imageRect.height * imageAspectRatio
      visibleHeight = imageRect.height
      offsetX = (imageRect.width - visibleWidth) / 2
      offsetY = 0
    }

    const top = visibleHeight * focusPoint.top + offsetY
    const left = visibleWidth * focusPoint.left + offsetX

    detailsEl.style.setProperty('--focus-point-top', `${top}px`)
    detailsEl.style.setProperty('--focus-point-left', `${left}px`)
  }

  onMouseOver() {
    const tl = gsap.timeline({
      defaults: {
        duration: 0.8,
        ease: 'power3.out',
      },
    })
    tl.to([this.info, this.desc], { autoAlpha: 1 })
      .to(this.mainHeader, { y: '-50px', autoAlpha: 0 }, '<')
      .to(this.mainFooter, { y: '50px', autoAlpha: 0 }, '<')
      .to(this.darkLayer, { autoAlpha: 0 }, '<')
  }

  onMouseOut() {
    const tl = gsap.timeline({
      defaults: {
        duration: 0.8,
        ease: 'power3.out',
      },
    })
    tl.to([this.info, this.desc], { autoAlpha: 0 })
      .to(this.mainHeader, { y: '0', autoAlpha: 1 }, '<')
      .to(this.mainFooter, { y: '0', autoAlpha: 1 }, '<')
      .to(this.darkLayer, { autoAlpha: 0.4 }, '<')
  }
}

export default FrontPage

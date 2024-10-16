import { gsap } from 'gsap'

class FrontPage {
  constructor() {
    if (!document.querySelector('.front-page')) return

    this.markerDotInside = document.querySelector('.marker-dot-inside')
    this.markerDotOutside = document.querySelector('.marker-dot-outside')
    this.info = document.querySelector('.info')
    this.desc = document.querySelector('.desc')
    this.mainHeader = document.querySelector('.site-header')
    this.mainFooter = document.querySelector('.site-footer')
    this.darkLayer = document.querySelector('.dark-layer')
    console.log(this.desc)

    this.init()
  }

  init() {
    console.log(this.desc)
    // this.onMouseOver = this.onMouseOver.bind(this)
    this.markerDotInside.addEventListener(
      'mouseover',
      this.onMouseOver.bind(this),
    )

    this.markerDotInside.addEventListener(
      'mouseout',
      this.onMouseOut.bind(this),
    )
  }
  onMouseOver() {
    const tl = gsap.timeline({
      defaults: {
        duration: 0.8,
        ease: 'power3.out',
      },
    })
    // console.log(this.info)
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
    // console.log(this.info)
    tl.to([this.info, this.desc], { autoAlpha: 0 })
      .to(this.mainHeader, { y: '0', autoAlpha: 1 }, '<')
      .to(this.mainFooter, { y: '0', autoAlpha: 1 }, '<')
      .to(this.darkLayer, { autoAlpha: 0.4 }, '<')

    // this.markerDotInside.classList.remove('active')
    // this.markerDotOutside.classList.remove('active')
  }
}

export default FrontPage

// import { filter } from 'core-js/core/array';
import Isotope from 'isotope-layout'

function isotopeGrid() {
  const gridElem = document.querySelector('.projects-grid')
  const filtersWrapperElem = document.querySelector('.filters')
  const filtersElem = document.querySelectorAll('.filters button')

  if (!gridElem && !filtersElem) return

  const iso = new Isotope(gridElem, {
    // options
    itemSelector: '.grid-item',
    masonry: {
      columnWidth: '.item-sizer',
      gutter: '.gutter-sizer',
      // horizontalOrder: true,
      // verticalOrder: true,
      // fitWidth: true,
      // resize: true,
    },
  })
  filtersElem.forEach(function (filter) {
    filter.addEventListener('click', function () {
      filtersWrapperElem
        .querySelector('.is-checked')
        .classList.remove('is-checked')
      this.classList.add('is-checked')
      const filterValue = this.getAttribute('data-filter')
      iso.arrange({ filter: filterValue })
    })
  })
}

export default isotopeGrid

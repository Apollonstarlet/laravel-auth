'use strict';

let isRtl = window.Helpers.isRtl(),
  isDarkStyle = window.Helpers.isDarkStyle(),
  menu,
  animate,
  isHorizontalLayout = false;

if (document.getElementById('layout-menu')) {
  isHorizontalLayout = document.getElementById('layout-menu').classList.contains('menu-horizontal');
}

(function () {
  // Button & Pagination Waves effect
  if (typeof Waves !== 'undefined') {
    Waves.init();
    Waves.attach(
      ".btn[class*='btn-']:not(.position-relative):not([class*='btn-outline-']):not([class*='btn-label-'])",
      ['waves-light']
    );
    Waves.attach("[class*='btn-outline-']:not(.position-relative)");
    Waves.attach("[class*='btn-label-']:not(.position-relative)");
    Waves.attach('.pagination .page-item .page-link');
    Waves.attach('.dropdown-menu .dropdown-item');
    Waves.attach('.light-style .list-group .list-group-item-action');
    Waves.attach('.dark-style .list-group .list-group-item-action', ['waves-light']);
    Waves.attach('.nav-tabs:not(.nav-tabs-widget) .nav-item .nav-link');
    Waves.attach('.nav-pills .nav-item .nav-link', ['waves-light']);
    Waves.attach('.menu-vertical .menu-item .menu-link.menu-toggle');
  }

  // Window scroll function for navbar
  function onScroll() {
    var layoutPage = document.querySelector('.layout-page');
    if (layoutPage) {
      if (window.pageYOffset > 0) {
        layoutPage.classList.add('window-scrolled');
      } else {
        layoutPage.classList.remove('window-scrolled');
      }
    }
  }
  // On load time out
  setTimeout(() => {
    onScroll();
  }, 200);

  // On window scroll
  window.onscroll = function () {
    onScroll();
  };

  // Initialize menu
  //-----------------

  let layoutMenuEl = document.querySelectorAll('#layout-menu');
  layoutMenuEl.forEach(function (element) {
    menu = new Menu(element, {
      orientation: isHorizontalLayout ? 'horizontal' : 'vertical',
      closeChildren: isHorizontalLayout ? true : false,
      // ? This option only works with Horizontal menu
      showDropdownOnHover: true // Use this if you are not using the config.js and want to set value directly from here
    });
    // Change parameter to true if you want scroll animation
    window.Helpers.scrollToActive((animate = false));
    window.Helpers.mainMenu = menu;
  });

  // Initialize menu togglers and bind click on each
  let menuToggler = document.querySelectorAll('.layout-menu-toggle');
  menuToggler.forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      window.Helpers.toggleCollapsed();
      // Enable menu state with local storage support if enableMenuLocalStorage = true from config.js
      if (config.enableMenuLocalStorage && !window.Helpers.isSmallScreen()) {
        try {
          localStorage.setItem(
            'templateCustomizer-' + templateName + '--LayoutCollapsed',
            String(window.Helpers.isCollapsed())
          );
        } catch (e) {}
      }
    });
  });

  // Menu swipe gesture

  // Detect swipe gesture on the target element and call swipe In
  window.Helpers.swipeIn('.drag-target', function (e) {
    window.Helpers.setCollapsed(false);
  });

  // Detect swipe gesture on the target element and call swipe Out
  window.Helpers.swipeOut('#layout-menu', function (e) {
    if (window.Helpers.isSmallScreen()) window.Helpers.setCollapsed(true);
  });

  // Display in main menu when menu scrolls
  let menuInnerContainer = document.getElementsByClassName('menu-inner'),
    menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0];
  if (menuInnerContainer.length > 0 && menuInnerShadow) {
    menuInnerContainer[0].addEventListener('ps-scroll-y', function () {
      if (this.querySelector('.ps__thumb-y').offsetTop) {
        menuInnerShadow.style.display = 'block';
      } else {
        menuInnerShadow.style.display = 'none';
      }
    });
  }

  // Style Switcher (Light/Dark Mode)
  //---------------------------------

  let styleSwitcherToggleEl = document.querySelector('.style-switcher-toggle');
  if (window.templateCustomizer) {
    // setStyle light/dark on click of styleSwitcherToggleEl
    if (styleSwitcherToggleEl) {
      styleSwitcherToggleEl.addEventListener('click', function () {
        if (window.Helpers.isLightStyle()) {
          window.templateCustomizer.setStyle('dark');
        } else {
          window.templateCustomizer.setStyle('light');
        }
      });
    }
    // Update style switcher icon and tooltip based on current style
    if (window.Helpers.isLightStyle()) {
      if (styleSwitcherToggleEl) {
        styleSwitcherToggleEl.querySelector('i').classList.add('mdi-weather-night');
        new bootstrap.Tooltip(styleSwitcherToggleEl, {
          title: 'Dark mode',
          fallbackPlacements: ['bottom']
        });
      }
      switchImage('light');
    } else {
      if (styleSwitcherToggleEl) {
        styleSwitcherToggleEl.querySelector('i').classList.add('mdi-weather-sunny');
        new bootstrap.Tooltip(styleSwitcherToggleEl, {
          title: 'Light mode',
          fallbackPlacements: ['bottom']
        });
      }
      switchImage('dark');
    }
  } else {
    // Removed style switcher element if not using template customizer
    // styleSwitcherToggleEl.parentElement.remove();
  }

  // Update light/dark image based on current style
  function switchImage(style) {
    const switchImagesList = [].slice.call(document.querySelectorAll('[data-app-' + style + '-img]'));
    switchImagesList.map(function (imageEl) {
      const setImage = imageEl.getAttribute('data-app-' + style + '-img');
      imageEl.src = assetsPath + '/img/' + setImage; // Using window.assetsPath to get the exact relative path
    });
  }

  
  // Manage menu expanded/collapsed with templateCustomizer & local storage
  //------------------------------------------------------------------

  // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
  if (isHorizontalLayout || window.Helpers.isSmallScreen()) {
    return;
  }

  // If current layout is vertical and current window screen is > small

  // Auto update menu collapsed/expanded based on the themeConfig
  if (typeof TemplateCustomizer !== 'undefined') {
    if (window.templateCustomizer.settings.defaultMenuCollapsed) {
      window.Helpers.setCollapsed(true, false);
    }
  }

  // Manage menu expanded/collapsed state with local storage support If enableMenuLocalStorage = true in config.js
  if (typeof config !== 'undefined') {
    if (config.enableMenuLocalStorage) {
      try {
        if (
          localStorage.getItem('templateCustomizer-' + templateName + '--LayoutCollapsed') !== null &&
          localStorage.getItem('templateCustomizer-' + templateName + '--LayoutCollapsed') !== 'false'
        )
          window.Helpers.setCollapsed(
            localStorage.getItem('templateCustomizer-' + templateName + '--LayoutCollapsed') === 'true',
            false
          );
      } catch (e) {}
    }
  }
})();

// ! Removed following code if you do't wish to use jQuery. Remember that navbar search functionality will stop working on removal.
if (typeof $ !== 'undefined') {
  $(function () {
    // ! TODO: Required to load after DOM is ready, did this now with jQuery ready.
    window.Helpers.initSidebarToggle();
    // Toggle Universal Sidebar

    // Navbar Search with autosuggest (typeahead)
    // ? You can remove the following JS if you don't want to use search functionality.
    //----------------------------------------------------------------------------------

    var searchToggler = $('.search-toggler'),
      searchInputWrapper = $('.search-input-wrapper'),
      searchInput = $('.search-input'),
      contentBackdrop = $('.content-backdrop');

    // Open search input on click of search icon
    if (searchToggler.length) {
      searchToggler.on('click', function () {
        if (searchInputWrapper.length) {
          searchInputWrapper.toggleClass('d-none');
          searchInput.focus();
        }
      });
    }
    // Open search on 'CTRL+/'
    $(document).on('keydown', function (event) {
      let ctrlKey = event.ctrlKey,
        slashKey = event.which === 191;

      if (ctrlKey && slashKey) {
        if (searchInputWrapper.length) {
          searchInputWrapper.toggleClass('d-none');
          searchInput.focus();
        }
      }
    });
    // Todo: Add container-xxl to twitter-typeahead
    searchInput.on('focus', function () {
      if (searchInputWrapper.hasClass('container-xxl')) {
        searchInputWrapper.find('.twitter-typeahead').addClass('container-xxl');
      }
    });

    if (searchInput.length) {
      // Filter config
      var filterConfig = function (data) {
        return function findMatches(q, cb) {
          let matches;
          matches = [];
          data.filter(function (i) {
            if (i.name.toLowerCase().startsWith(q.toLowerCase())) {
              matches.push(i);
            } else if (
              !i.name.toLowerCase().startsWith(q.toLowerCase()) &&
              i.name.toLowerCase().includes(q.toLowerCase())
            ) {
              matches.push(i);
              matches.sort(function (a, b) {
                return b.name < a.name ? 1 : -1;
              });
            } else {
              return [];
            }
          });
          cb(matches);
        };
      };

      // Search JSON
      var searchJson = 'search-vertical.json'; // For vertical layout
      if ($('#layout-menu').hasClass('menu-horizontal')) {
        var searchJson = 'search-horizontal.json'; // For vertical layout
      }
      // Search API AJAX call
      var searchData = $.ajax({
        url: assetsPath + '/json/' + searchJson, //? Use your own search api instead
        dataType: 'json',
        async: false
      }).responseJSON;
      // Init typeahead on searchInput
      searchInput.each(function () {
        var $this = $(this);
        searchInput
          .typeahead(
            {
              hint: false,
              classNames: {
                menu: 'tt-menu navbar-search-suggestion',
                cursor: 'active',
                suggestion: 'suggestion d-flex justify-content-between px-3 py-2 w-100'
              }
            },
            // ? Add/Update blocks as per need
            // Pages
            {
              name: 'pages',
              display: 'name',
              limit: 5,
              source: filterConfig(searchData.pages),
              templates: {
                header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h6>',
                suggestion: function ({ url, icon, name }) {
                  return (
                    '<a href="' +
                    url +
                    '">' +
                    '<div>' +
                    '<i class="mdi ' +
                    icon +
                    ' me-2"></i>' +
                    '<span class="align-middle">' +
                    name +
                    '</span>' +
                    '</div>' +
                    '</a>'
                  );
                },
                notFound:
                  '<div class="not-found px-3 py-2">' +
                  '<h6 class="suggestions-header text-primary mb-2">Pages</h6>' +
                  '<p class="py-2 mb-0"><i class="mdi mdi-alert-circle-outline me-2 mdi-14px"></i> No Results Found</p>' +
                  '</div>'
              }
            },
            // Files
            {
              name: 'files',
              display: 'name',
              limit: 4,
              source: filterConfig(searchData.files),
              templates: {
                header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Files</h6>',
                suggestion: function ({ src, name, subtitle, meta }) {
                  return (
                    '<a href="javascript:;">' +
                    '<div class="d-flex w-50">' +
                    '<img class="me-3" src="' +
                    assetsPath +
                    src +
                    '" alt="' +
                    name +
                    '" height="32">' +
                    '<div class="w-75">' +
                    '<h6 class="mb-0">' +
                    name +
                    '</h6>' +
                    '<small class="text-muted">' +
                    subtitle +
                    '</small>' +
                    '</div>' +
                    '</div>' +
                    '<small class="text-muted">' +
                    meta +
                    '</small>' +
                    '</a>'
                  );
                },
                notFound:
                  '<div class="not-found px-3 py-2">' +
                  '<h6 class="suggestions-header text-primary mb-2">Files</h6>' +
                  '<p class="py-2 mb-0"><i class="mdi mdi-alert-circle-outline me-2 mdi-14px"></i> No Results Found</p>' +
                  '</div>'
              }
            },
            // Members
            {
              name: 'members',
              display: 'name',
              limit: 4,
              source: filterConfig(searchData.members),
              templates: {
                header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Members</h6>',
                suggestion: function ({ name, src, subtitle }) {
                  return (
                    '<a href="app-user-view-account.html">' +
                    '<div class="d-flex align-items-center">' +
                    '<img class="rounded-circle me-3" src="' +
                    assetsPath +
                    src +
                    '" alt="' +
                    name +
                    '" height="32">' +
                    '<div class="user-info">' +
                    '<h6 class="mb-0">' +
                    name +
                    '</h6>' +
                    '<small class="text-muted">' +
                    subtitle +
                    '</small>' +
                    '</div>' +
                    '</div>' +
                    '</a>'
                  );
                },
                notFound:
                  '<div class="not-found px-3 py-2">' +
                  '<h6 class="suggestions-header text-primary mb-2">Members</h6>' +
                  '<p class="py-2 mb-0"><i class="mdi mdi-alert-circle-outline me-2 mdi-14px"></i> No Results Found</p>' +
                  '</div>'
              }
            }
          )
          //On typeahead result render.
          .bind('typeahead:render', function () {
            // Show content backdrop,
            contentBackdrop.addClass('show').removeClass('fade');
          })
          // On typeahead select
          .bind('typeahead:select', function (ev, suggestion) {
            // Open selected page
            if (suggestion.url) {
              window.location = suggestion.url;
            }
          })
          // On typeahead close
          .bind('typeahead:close', function () {
            // Clear search
            searchInput.val('');
            $this.typeahead('val', '');
            // Hide search input wrapper
            searchInputWrapper.addClass('d-none');
            // Fade content backdrop
            contentBackdrop.addClass('fade').removeClass('show');
          });

        // On searchInput keyup, Fade content backdrop if search input is blank
        searchInput.on('keyup', function () {
          if (searchInput.val() == '') {
            contentBackdrop.addClass('fade').removeClass('show');
          }
        });
      });

      // Init PerfectScrollbar in search result
      var psSearch;
      $('.navbar-search-suggestion').each(function () {
        psSearch = new PerfectScrollbar($(this)[0], {
          wheelPropagation: false,
          suppressScrollX: true
        });
      });

      searchInput.on('keyup', function () {
        psSearch.update();
      });
    }
  });
}

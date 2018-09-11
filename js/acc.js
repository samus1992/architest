function initAccordion(accordionElem) {

  function handlePanelClick(event) {
    showPanel(event.currentTarget);
  }

  function showPanel(panelHeader) {

    let isActive,
        panel = panelHeader.parentNode,
        panelBody = panelHeader.nextElementSibling,
        expandedPanel = document.querySelector('.panel.active');

    isActive = (expandedPanel && panel.classList.contains('active')) ? true : false;

    if(expandedPanel) {
      expandedPanel.querySelector('.acc-body').style.height = null;
      expandedPanel.classList.remove('active');
    }

    if(panel && !isActive) {
      panelBody.style.height = panelBody.scrollHeight + 'px';
      panel.classList.add('active');
    }

  }

  let allPanelElements = document.querySelectorAll('.panel');

  for(let i = 0; i < allPanelElements.length; i++) {
    allPanelElements[i].querySelector('.acc-header').addEventListener('click', handlePanelClick);
  }

  showPanel(allPanelElements);

}

initAccordion(document.getElementsByClassName('accordion'));

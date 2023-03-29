import {
  createDataBase,
  PRICE_DB,
} from './pricing-db.js';

const MIN_SEARCH_LENGTH = 3;
const SEARCH_DELAY = 2000;
const NO_RESULTS_TEXT = 'Не найдено!';

const searchNode = document.querySelector( '.pricing-search' );
const resultsNode = document.querySelector( '.price-list__results' );

const clearNode = ( node ) => {
  node.innerHTML = '';
};

const clearAlertMessage = () => {
  const alertNode = searchNode.querySelector( '.pricing-search__alert' );
  clearNode( alertNode );
  searchNode.classList.remove( 'pricing-search--on-alert' );
};

const alertMessage = ( message ) => {
  const alertNode = searchNode.querySelector( '.pricing-search__alert' );
  clearNode( alertNode );
  searchNode.classList.add( 'pricing-search--on-alert' );
  alertNode.textContent = message;
};

const setLoadingState = () => {
  searchNode.classList.add( 'pricing-search--loading' );
};

const unsetLoadingState = () => {
  searchNode.classList.remove( 'pricing-search--loading' );
};

const checkSearchResults = ( node ) => {
  return node.childElementCount === 0;
};

const setNoResultsState = () => {
  resultsNode.classList.add( 'price-list__results--no-results' );
  resultsNode.querySelector( '.price-list__no-results-text' ).textContent = NO_RESULTS_TEXT;
};

const unsetNoResultsState = () => {
  resultsNode.classList.remove( 'price-list__results--no-results' );
  resultsNode.querySelector( '.price-list__no-results-text' ).textContent = '';
};

const processSearch = ( evt ) => {
  return new Promise( ( resolve ) => {
    const searchString = evt.target.value.toLowerCase();
    const resultsBodyNode = resultsNode.querySelector( '.price-list__table tbody' );
    const trTemplate = document.querySelector( '#table-row' ).content.querySelector( 'tr' );
    const trFragment = document.createDocumentFragment();
    resultsNode.classList.remove( 'price-list__results--founded' );
    resultsBodyNode.innerHTML = '';
    PRICE_DB.forEach( ( item ) => {
      if ( item.name.toLowerCase().indexOf( searchString ) !== -1 ) {
        const trElement = trTemplate.cloneNode( true );
        trElement.querySelector( 'tr>td:first-of-type' ).textContent = item.name;
        trElement.querySelector( 'tr>td:last-of-type' ).textContent = item.price;
        trFragment.appendChild( trElement );
      }
    } );

    resultsBodyNode.appendChild( trFragment );

    checkSearchResults( resultsBodyNode ) ?
      setNoResultsState() :
      unsetNoResultsState();

    resolve();
  } );
};

const onSearchInput = ( evt ) => {
  if ( evt.target.value.length === 0 ) {
    clearAlertMessage();
    return;
  }

  if ( evt.target.value.length < ( MIN_SEARCH_LENGTH + 1 ) ) {
    alertMessage( `Для поиска введите более ${MIN_SEARCH_LENGTH} символов` );
    return;
  }

  clearAlertMessage();
  setLoadingState();
  setTimeout( () => {
    processSearch( evt )
      .then( () => {
        unsetLoadingState();
        resultsNode.classList.add( 'price-list__results--founded' );
      } );
  }, SEARCH_DELAY );

};

async function initPriceSearching() {
  if ( !searchNode ) return;
  const searchInputNode = searchNode.querySelector( '.pricing-search__input' );

  searchInputNode.setAttribute( 'disabled', 'disabled' );
  try {
    await createDataBase();
    searchInputNode.removeAttribute( 'disabled' );
    searchInputNode.addEventListener( 'input', onSearchInput );
  } catch {
    throw new Error( 'Something went wrong' );
  }
}

export {
  initPriceSearching
};
